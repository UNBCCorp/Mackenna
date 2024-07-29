<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserGroup;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Obtén el usuario autenticado y su grupo de usuarios
        $user = auth()->user();
        $userGroup = UserGroup::find($user->tipo_usuario);

        // Si no hay grupo de usuarios asignado, redirige o muestra un mensaje de error
        if (!$userGroup) {
            return redirect()->route('dashboard')->with('error', 'No se ha asignado un grupo de usuario.');
        }

        // Decodifica los permisos del grupo de usuarios
        $permisosUsuario = !empty($userGroup->permisos) ? json_decode($userGroup->permisos, true) : [];

        // Consulta los usuarios con el filtro de búsqueda
        $usersQuery = User::with('tipoDocumento', 'userGroup'); // Incluye relaciones

        if (!empty($search)) {
            $usersQuery->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $users = $usersQuery->get();

        return view('users.index', [
            'users' => $users,
            'search' => $search,
            'permisosUsuario' => $permisosUsuario, // Pasa los permisos a la vista
        ]);
    }



    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tipo_documento' => 'required|integer|exists:tipo_documento,id',
            'tipo_usuario' => 'required|integer|exists:user_groups,id', // Aquí verifica que 'user_groups' sea correcto
            'numero_documento' => 'required|string|max:255',
            'numero_telefonico' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'numero_telefonico' => $request->numero_telefonico,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario, // Aquí verifica que 'tipo_usuario' sea un campo válido en la tabla 'users'
            'estado' => $request->get('estado', 'Activo'),
        ]);

        if ($user->save()) {
            return redirect('/users')->with('success', 'User has been added');
        } else {
            return redirect()->back()->with('error', 'Failed to create user');
        }
    }


    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function getUserData($id)
    {
        $user = User::with('tipoDocumento', 'userGroup')->find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'apellido' => $user->apellido,
            'tipo_documento' => $user->tipoDocumento ? $user->tipoDocumento->nombre : 'No definido',
            'numero_documento' => $user->numero_documento,
            'numero_telefonico' => $user->numero_telefonico,
            'email' => $user->email,
            'tipo_usuario' => $user->userGroup ? $user->userGroup->nombre : 'No definido',
            'estado' => $user->estado,
        ]);
    }




    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->apellido = $request->get('apellido');
        $user->tipo_documento = $request->get('tipo_documento');
        $user->numero_documento = $request->get('numero_documento');
        $user->numero_telefonico = $request->get('numero_telefonico');
        $user->tipo_usuario = $request->get('tipo_usuario');
        $user->estado = $request->get('estado');

        $user->save();

        return redirect('/users')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User has been deleted');
    }
}
