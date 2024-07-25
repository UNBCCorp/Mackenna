<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteEmpresa;
use App\Models\UserGroup;

class ClienteController extends Controller
{
    /**
     * Display a listing of approved clients.
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

        // Consulta los clientes particulares y empresas con el filtro de búsqueda
        $clientesParticularesQuery = Cliente::where('estado_cliente', 'aprobado');
        $clientesEmpresasQuery = ClienteEmpresa::where('estado_cliente', 'aprobado');

        if (!empty($search)) {
            $clientesParticularesQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });

            $clientesEmpresasQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $clientesParticulares = $clientesParticularesQuery->get();
        $clientesEmpresas = $clientesEmpresasQuery->get();

        return view('clientes.index', [
            'clientesParticulares' => $clientesParticulares,
            'clientesEmpresas' => $clientesEmpresas,
            'search' => $search,
            'permisosUsuario' => $permisosUsuario, // Pasa los permisos a la vista
        ]);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_cliente' => 'required|string|in:particular,empresa',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        if ($request->tipo_cliente === 'particular') {
            $this->storeParticular($request);
        } elseif ($request->tipo_cliente === 'empresa') {
            $this->storeEmpresa($request);
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Store a newly created particular client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function storeParticular(Request $request)
    {
        $request->validate([
            'tipo_identificacion' => 'required|string|max:255',
            'identificacion' => 'required|string|max:255|unique:clientes,identificacion',
            'numero_telefonico' => 'required|string|max:255',
            // Añadir más validaciones específicas para clientes particulares
        ]);

        Cliente::create([
            'name' => $request->name,
            'tipo_cliente' => $request->tipo_cliente,
            'tipo_identificacion' => $request->tipo_identificacion,
            'identificacion' => $request->identificacion,
            'ciudad_expedicion_identificacion' => $request->ciudad_expedicion_identificacion,
            'identificacion_pais' => $request->identificacion_pais,
            'fecha_expedicion_identificacion' => $request->fecha_expedicion_identificacion,
            'fecha_caducidad_identificacion' => $request->fecha_caducidad_identificacion,
            'carnet' => $request->carnet,
            'ciudad_expedicion_carnet' => $request->ciudad_expedicion_carnet,
            'carnet_pais' => $request->carnet_pais,
            'carnet_fecha_expedicion' => $request->carnet_fecha_expedicion,
            'carnet_fecha_caducidad' => $request->carnet_fecha_caducidad,
            'tipo_carnet' => $request->tipo_carnet,
            'ciudad_nacido' => $request->ciudad_nacido,
            'pais_nacido' => $request->pais_nacido,
            'fecha_nacido' => $request->fecha_nacido,
            'indicendias' => $request->indicendias,
            'numero_telefonico' => $request->numero_telefonico,
            'email' => $request->email,
            'foto_identificacion' => $request->foto_identificacion,
            'foto_licencia' => $request->foto_licencia,
            'foto_cliente' => $request->foto_cliente,
            'direccion_habitual' => $request->direccion_habitual,
            'codigo_postal_habitual' => $request->codigo_postal_habitual,
            'municipio_habitual' => $request->municipio_habitual,
            'provincia_habitual' => $request->provincia_habitual,
            'pais_habitual' => $request->pais_habitual,
            'direccion_local' => $request->direccion_local,
            'codigo_postal_local' => $request->codigo_postal_local,
            'municipio_local' => $request->municipio_local,
            'provincia_local' => $request->provincia_local,
            'pais_local' => $request->pais_local,
            'conductor_empresa' => $request->conductor_empresa,
            'mailing' => $request->mailing,
            'estado' => $request->estado,
            'medio_pago' => $request->medio_pago,
            'observaciones' => $request->observaciones,
            'avisos' => $request->avisos,
            'canles_restringidos' => $request->canles_restringidos,
            'consentimiento' => $request->consentimiento,
            'inhabilidades' => $request->inhabilidades,
        ]);
    }

    /**
     * Store a newly created enterprise client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function storeEmpresa(Request $request)
    {
        $request->validate([
            'cuenta_contable' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
            'numero_contacto' => 'required|string|max:255',
            // Añadir más validaciones específicas para clientes empresa
        ]);

        ClienteEmpresa::create([
            'name' => $request->name,
            'tipo_cliente' => $request->tipo_cliente,
            'cuenta_contable' => $request->cuenta_contable,
            'razon_social' => $request->razon_social,
            'sector_economico' => $request->sector_economico,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'municipio' => $request->municipio,
            'pais' => $request->pais,
            'provincia' => $request->provincia,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'pais_documento' => $request->pais_documento,
            'persona_contacto' => $request->persona_contacto,
            'numero_contacto' => $request->numero_contacto,
            'email' => $request->email,
            'web' => $request->web,
            'sucursal' => $request->sucursal,
            'idiomas' => $request->idiomas,
            'observaciones' => $request->observaciones,
            'medio_pago' => $request->medio_pago,
            'dias_credito' => $request->dias_credito,
            'canal' => $request->canal,
            'vent_dia' => $request->vent_dia,
            'vehiculo_propio' => $request->vehiculo_propio,
            'acuerdos' => $request->acuerdos,
            'opciones' => $request->opciones,
            'tarifas' => $request->tarifas,
            'documento' => $request->documento,
            'documento2' => $request->documento2,
            'documento3' => $request->documento3,
        ]);
    }
}
