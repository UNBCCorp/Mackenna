@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Usuarios</h1>
        <br />
        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(9, $permisosUsuario))
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUsersModal">+Crear
                    Usuarios</a>
            </div>
        @endif
        <br />
        <form action="{{ route('users.index') }}" method="GET" class="mb-3">
            <br />
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..."
                    value="{{ $search }}">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Numero Documento</th>
                        <th>Numero Telefónico</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $userGroup)
                        <tr>
                            @if (in_array(10, $permisosUsuario))
                                <td>{{ $userGroup->id }}</td>
                                <td>{{ $userGroup->name }}</td>
                                <td>{{ $userGroup->numero_documento }}</td>
                                <td>{{ $userGroup->numero_telefonico }}</td>
                                <td>{{ $userGroup->email }}</td>
                                <td>

                                </td>
                            @endif
                            @if (in_array(10, $permisosUsuario))
                                <td class="action-buttons">
                                    <!-- Habilita el botón de editar solo si el usuario tiene el permiso correspondiente -->
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#verUsersModal" data-id="{{ $userGroup->id }}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                </td>
                            @endif
                            @if (in_array(11, $permisosUsuario))
                                <td class="action-buttons">
                                    <!-- Habilita el botón de editar solo si el usuario tiene el permiso correspondiente -->
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editUsersModal" data-id="{{ $userGroup->id }}"
                                        data-name="{{ $userGroup->name }}">
                                        <i class="fas fa-edit"></i> <!-- Ícono de lápiz -->
                                    </a>
                                </td>
                            @endif
                            @if (in_array(12, $permisosUsuario))
                                <td class="action-buttons">
                                    <!-- Habilita el botón de eliminar solo si el usuario tiene el permiso correspondiente -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('usergroups.destroy', $userGroup->id) }}">
                                        <i class="fas fa-trash"></i> <!-- Ícono de basura -->
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('users.create')
    @include('users.edit')
    @include('users.ver')

    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var confirmDeleteModal = document.getElementById('confirmDeleteModal');
            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Botón que abrió el modal
                var actionUrl = button.getAttribute('data-action'); // URL de la acción de eliminación

                var form = document.getElementById('deleteForm');
                form.action = actionUrl; // Actualiza la acción del formulario
            });

            var createUsersModal = document.getElementById('createUsersModal');
            createUsersModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
            var verUsersModal = document.getElementById('verUsersModal');
            if (verUsersModal) {
                verUsersModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var userId = button.getAttribute('data-id');

                    // Realiza una solicitud para obtener los datos del usuario
                    fetch(`/users/data/${userId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                            } else {
                                // Actualiza los elementos del modal con los datos del usuario
                                document.getElementById('viewUserId').textContent = data.id;
                                document.getElementById('viewUserName').textContent = data.name;
                                document.getElementById('viewUserLastname').textContent = data.apellido;
                                document.getElementById('viewUserTipoDocumento').textContent = data
                                    .tipo_documento;
                                document.getElementById('viewUserNumeroDocumento').textContent = data
                                    .numero_documento;
                                document.getElementById('viewUserNumeroTelefonico').textContent = data
                                    .numero_telefonico;
                                document.getElementById('viewUserEmail').textContent = data.email;
                                document.getElementById('viewUserTipoUsuario').textContent = data
                                    .tipo_usuario;
                                document.getElementById('viewUserEstado').textContent = data.estado;
                            }
                        })
                        .catch(error => console.error('Error al obtener los datos del usuario:', error));
                });
            }
        });
    </script>
@endsection
