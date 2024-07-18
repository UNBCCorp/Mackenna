<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
{
    // Muestra la lista de tipos de vehículo
    public function index(Request $request)
    {
        $search = $request->input('search');

        $tipos = Tipovehiculo::query();

        if (!empty($search)) {
            $tipos->where('nombre', 'like', '%' . $search . '%');
        }

        $tipos = $tipos->get();

        return view('tipovehiculo.index', [
            'tipos' => $tipos,
            'search' => $search,
        ]);
    }


    // Muestra el formulario para crear un nuevo tipo de vehículo
    public function create()
    {
        return view('tipovehiculo.create');
    }

    // Almacena un nuevo tipo de vehículo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        TipoVehiculo::create($request->all());
        return redirect()->route('tipovehiculo.index')->with('success', 'Tipo de vehículo creado con éxito.');
    }

    // Muestra el tipo de vehículo específico
    public function show(TipoVehiculo $tipovehiculo)
    {
        return view('tipovehiculo.show', compact('tipovehiculo'));
    }

    // Muestra el formulario para editar el tipo de vehículo
    public function edit(TipoVehiculo $tipovehiculo)
    {
        return view('tipovehiculo.edit', compact('tipovehiculo'));
    }

    // Actualiza el tipo de vehículo
    public function update(Request $request, TipoVehiculo $tipovehiculo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipovehiculo->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('tipovehiculo.index')->with('success', 'Tipo de vehículo actualizado con éxito.');
    }


    // Elimina el tipo de vehículo

    public function destroy($id)
    {
        $tipovehiculo = TipoVehiculo::find($id); // Buscar el grupo por ID

        if (!$tipovehiculo) {
            return redirect()->route('tipovehiculo.index')->with('error', 'Grupo no encontrado.');
        }

        $tipovehiculo->delete();
        return redirect()->route('tipovehiculo.index')->with('success', 'Grupo eliminado exitosamente.');
    }
}
