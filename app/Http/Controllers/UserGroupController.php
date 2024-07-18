<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use App\Models\Permiso;

use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $userGroupsQuery = UserGroup::query();

        if (!empty($search)) {
            $userGroupsQuery->where('nombre', 'like', '%' . $search . '%');
        }

        $userGroups = $userGroupsQuery->get()->map(function ($group) {
            // Decodifica el JSON a un array si no está vacío
            $group->permisos = !empty($group->permisos) ? json_decode($group->permisos, true) : [];
            return $group;
        });

        // Obtener todos los permisos de la base de datos
        $permisos = Permiso::all()->keyBy('id'); // Usar keyBy para un acceso más fácil

        return view('usergroups.index', compact('userGroups', 'search', 'permisos'));
    }


    public function create()
    {
        $tipospermisos = Permiso::all(); // Obtener todos los permisos
        return view('usergroups.create', compact('tipospermisos')); // Pasar a la vista
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'exists:permisos,id'
        ]);

        $userGroup = UserGroup::create([
            'nombre' => $request->name,
            'permisos' => json_encode($request->permissions ?? [])
        ]);

        return redirect()->route('usergroups.index')->with('success', 'Grupo creado exitosamente.');
    }




    public function show(UserGroup $userGroup)
    {
        return view('usergroups.show', compact('userGroup'));
    }

    public function edit(UserGroup $userGroup)
    {
        $tipospermisos = Permiso::all();
        $selectedPermissions = is_array($userGroup->permisos) ? $userGroup->permisos : json_decode($userGroup->permisos, true);
        return view('usergroups.edit', compact('userGroup', 'tipospermisos', 'selectedPermissions'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array',
            'permissions.*' => 'exists:permisos,id',
        ]);

        $userGroup = UserGroup::findOrFail($id);
        $userGroup->update([
            'nombre' => $request->name,
            'permisos' => json_encode($request->permissions ?? [])
        ]);

        return redirect()->route('usergroups.index')->with('success', 'Grupo actualizado exitosamente.');
    }


    public function destroy($id)
    {
        $userGroup = UserGroup::find($id); // Buscar el grupo por ID

        if (!$userGroup) {
            return redirect()->route('usergroups.index')->with('error', 'Grupo no encontrado.');
        }

        $userGroup->delete();
        return redirect()->route('usergroups.index')->with('success', 'Grupo eliminado exitosamente.');
    }
}
