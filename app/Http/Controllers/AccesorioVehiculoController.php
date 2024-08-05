<?php

namespace App\Http\Controllers;

use App\Models\AccesorioVehiculo;
use Illuminate\Http\Request;
use App\Models\UserGroup;

class AccesorioVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
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

        // Consulta las marcas de vehículos con el filtro de búsqueda

        $accesorio = AccesorioVehiculo::query();

        if (!empty($search)) {
            $accesorio->where('nombre', 'like', '%' . $search . '%');
        }

        $accesorios = $accesorio->get();

        return view('accesoriovehiculo.index', [
            'accesorios' => $accesorios,
            'search' => $search,
            'permisosUsuario' => $permisosUsuario, // Pasa los permisos a la vista
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accesoriovehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
        ]);

        AccesorioVehiculo::create($request->all());

        return redirect()->route('accesoriovehiculo.index')
            ->with('success', 'Accesorio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccesorioVehiculo $accesorioVehiculo)
    {
        return view('accesoriovehiculo.show', compact('accesorioVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccesorioVehiculo $accesorioVehiculo)
    {
        return view('accesoriovehiculo.edit', compact('accesorioVehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $accesorio = AccesorioVehiculo::find($id);
        if ($accesorio) {
            $accesorio->nombre = $request->input('nombre');
            $accesorio->save();
            return redirect()->route('accesoriovehiculo.index')->with('success', 'Marca de vehículo actualizada correctamente');
        } else {
            return redirect()->route('accesoriovehiculo.index')->with('error', 'No se encontró la marca de vehículo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $accesorio = AccesorioVehiculo::find($id); // Buscar el grupo por ID

        if (!$accesorio) {
            return redirect()->route('accesoriovehiculo.index')->with('error', 'Marca no encontrado.');
        }

        $accesorio->delete();
        return redirect()->route('accesoriovehiculo.index')->with('success', 'Marca eliminado exitosamente.');
    }
}
