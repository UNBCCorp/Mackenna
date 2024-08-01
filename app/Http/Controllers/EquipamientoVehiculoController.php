<?php

namespace App\Http\Controllers;

use App\Models\EquipamientoVehiculo;
use Illuminate\Http\Request;

class EquipamientoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipamientos = EquipamientoVehiculo::all();
        return view('equipamiento_vehiculo.index', compact('equipamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipamiento_vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        EquipamientoVehiculo::create($request->all());

        return redirect()->route('equipamiento_vehiculo.index')
            ->with('success', 'Equipamiento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipamientoVehiculo $equipamientoVehiculo)
    {
        return view('equipamiento_vehiculo.show', compact('equipamientoVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipamientoVehiculo $equipamientoVehiculo)
    {
        return view('equipamiento_vehiculo.edit', compact('equipamientoVehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EquipamientoVehiculo $equipamientoVehiculo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $equipamientoVehiculo->update($request->all());

        return redirect()->route('equipamiento_vehiculo.index')
            ->with('success', 'Equipamiento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipamientoVehiculo $equipamientoVehiculo)
    {
        $equipamientoVehiculo->delete();

        return redirect()->route('equipamiento_vehiculo.index')
            ->with('success', 'Equipamiento eliminado exitosamente.');
    }
}
