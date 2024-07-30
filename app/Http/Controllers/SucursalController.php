<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\UserGroup;
use App\Models\Ciudad;

class SucursalController extends Controller
{
    // Mostrar la lista de sucursales

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

        // Consulta las marcas de vehículos con el filtro de búsqueda
        $sucursal = Sucursal::query();
        $Ciudad = Ciudad::all()->keyBy('id');

        if (!empty($search)) {
            $sucursal->where('nombre', 'like', '%' . $search . '%');
        }

        $sucursales = $sucursal->get();

        return view('sucursales.index', [
            'sucursales' => $sucursales,
            'search' => $search,
            'permisosUsuario' => $permisosUsuario,
            'ciudad' => $Ciudad, // Pasa los permisos a la vista
        ]);
    }

    // Mostrar el formulario para crear una nueva sucursal
    public function create()
    {
        return view('sucursales.create');
    }

    // Almacenar una nueva sucursal en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'tipo_sucursal' => 'required|string|max:255',
        ]);


        Sucursal::create($request->all());

        return redirect()->route('surcursales.index')
            ->with('success', 'Sucursal creada con éxito.');
    }

    // Mostrar el formulario para editar una sucursal existente
    public function edit($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursales.edit', compact('sucursal'));
    }

    // Actualizar una sucursal existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|exists:ciudades,id', // Verifica que el ID exista en la tabla 'ciudades'
            'direccion' => 'required|string|max:255',
            'tipo_sucursal' => 'required|in:Taller,Bodega,Sucursal,Estacionamiento', // Verifica que el tipo esté en las opciones permitidas
        ]);


        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($request->all());

        return redirect()->route('surcursales.index')
            ->with('success', 'Sucursal actualizada con éxito.');
    }

    // Eliminar una sucursal de la base de datos
    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->delete();

        return redirect()->route('surcursales.index')
            ->with('success', 'Sucursal eliminada con éxito.');
    }
}
