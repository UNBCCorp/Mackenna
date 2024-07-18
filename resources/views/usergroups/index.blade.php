@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Roles</h1>
        <br />
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserGroupModal">+Crear
            Rol</a>
        <br />
        <form action="{{ route('usergroups.index') }}" method="GET" class="mb-3">
            <br />
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..."
                    value="{{ $search }}">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userGroups as $userGroup)
                    <tr>
                        <td>{{ $userGroup->id }}</td>
                        <td>{{ $userGroup->nombre }}</td>
                        <td>
                            @foreach ($userGroup->permisos as $permisoId)
                                @if (isset($permisos[$permisoId]))
                                    <span class="badge bg-secondary">{{ $permisos[$permisoId]->nombre }}</span>
                                @else
                                    <span class="badge bg-danger">Permiso no encontrado</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editUserGroupModal" data-id="{{ $userGroup->id }}"
                                data-name="{{ $userGroup->nombre }}"
                                data-permissions="{{ json_encode($userGroup->permisos) }}">
                                Editar
                            </a>
                            <form action="{{ route('usergroups.destroy', $userGroup->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('userGroups.create')
    @include('userGroups.edit')
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var createUserGroupModal = document.getElementById('createUserGroupModal');
            createUserGroupModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
