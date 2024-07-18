<?php

namespace App\Http\Controllers;

use App\Models\MarcaVehiculo;
use Illuminate\Http\Request;

class MarcaVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $marcas = MarcaVehiculo::query();

        if (!empty($search)) {
            $marcas->where('nombre', 'like', '%' . $search . '%');
        }

        $marcas = $marcas->get();

        return view('marcavehiculo.index', [
            'marcas' => $marcas,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca_vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        MarcaVehiculo::create($request->all());

        return redirect()->route('marcavehiculo.index')->with('success', 'Marca de vehículo creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarcaVehiculo  $marcaVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(MarcaVehiculo $marcaVehiculo)
    {
        return view('marcavehiculo.show', compact('marcaVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarcaVehiculo  $marcaVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(MarcaVehiculo $marcaVehiculo)
    {
        return view('marcavehiculo.edit', compact('marcaVehiculo'));
    }

    public function update(Request $request, $id)
    {
        $marca = Marcavehiculo::find($id);
        if ($marca) {
            $marca->nombre = $request->input('nombre');
            $marca->save();
            return redirect()->route('marcavehiculo.index')->with('success', 'Marca de vehículo actualizada correctamente');
        } else {
            return redirect()->route('marcavehiculo.index')->with('error', 'No se encontró la marca de vehículo');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarcaVehiculo  $marcaVehiculo
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $marcaVehiculo = MarcaVehiculo::find($id); // Buscar el grupo por ID

        if (!$marcaVehiculo) {
            return redirect()->route('marcavehiculo.index')->with('error', 'Marca no encontrado.');
        }

        $marcaVehiculo->delete();
        return redirect()->route('marcavehiculo.index')->with('success', 'Marca eliminado exitosamente.');
    }
}
