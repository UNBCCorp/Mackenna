<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use App\Models\UserGroup;
use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

        // Consulta las tarifas con el filtro de búsqueda
        $tarifasQuery = Tarifa::query();

        if (!empty($search)) {
            $tarifasQuery->where('nombre', 'like', '%' . $search . '%');
        }

        $tarifas = $tarifasQuery->get();

        // Recupera todos los tipos de vehículos
        $tipovehiculos = TipoVehiculo::all()->keyBy('id');
        // Asegúrate de tener un modelo Permiso o ajustar esta línea según tu implementación
        $permisos = []; // Cambia esto según cómo obtienes los permisos

        return view('tarifas.index', compact('tarifas', 'search', 'permisos', 'permisosUsuario', 'tipovehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'porcentaje' => 'required|numeric|between:0,999.99',
            'tipo_vehiculo' => 'array',
            'tipo_vehiculo.*' => 'exists:tipo_vehiculos,id',
        ]);

        $porcentaje = str_replace(',', '.', $request->input('porcentaje'));

        // Crea el registro de tarifa
        Tarifa::create([
            'nombre' => $request->input('nombre'),
            'porcentaje' => $porcentaje,
            'tipo_vehiculo' => $request->input('tipo_vehiculo') ?? [],  // Deja que Laravel maneje la conversión a JSON
            'users' => $request->input('users', ''),
        ]);

        return redirect()->route('tarifas.index')
            ->with('success', 'Tarifa creada exitosamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarifa $tarifa)
    {
        return view('tarifas.show', compact('tarifa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarifa $tarifa)
    {
        return view('tarifas.edit', compact('tarifa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarifa $tarifa)
    {
        // Validación de los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'porcentaje' => 'required|numeric|between:0,999.99',
            'tipo_vehiculo' => 'array',
            'tipo_vehiculo.*' => 'exists:tipo_vehiculos,id',
            'users' => 'nullable|string', // Ajustado para permitir que el campo 'users' sea opcional
        ]);

        $porcentaje = str_replace(',', '.', $request->input('porcentaje'));

        // Actualización del registro de tarifa
        $tarifa->update([
            'nombre' => $request->input('nombre'),
            'porcentaje' => $porcentaje,
            'tipo_vehiculo' => $request->input('tipo_vehiculo') ?? [],  // Deja que Laravel maneje la conversión a JSON
            'users' => $request->input('users', ''), // 'users' es opcional en el update
        ]);

        return redirect()->route('tarifas.index')
            ->with('success', 'Tarifa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarifa $tarifa)
    {
        $tarifa->delete();

        return redirect()->route('tarifas.index')
            ->with('success', 'Tarifa eliminada exitosamente.');
    }
}
