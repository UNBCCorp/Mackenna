@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Clientes Aprobados</h1>

        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(9, $permisosUsuario))
            <div class="d-flex justify-content-end mb-3">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClientModal">+ Crear
                    Cliente</a>
            </div>
        @endif

        <form action="{{ route('clientes.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre..."
                    value="{{ $search }}">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </div>
        </form>

        <h2>Clientes Particulares</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <!-- Otros campos que quieras mostrar -->
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientesParticulares as $cliente)
                        <tr>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <!-- Otros campos que quieras mostrar -->
                            @if (in_array(10, $permisosUsuario))
                                <td>
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#verClienteModal" data-id="{{ $cliente->id }}">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                </td>
                            @endif
                            @if (in_array(11, $permisosUsuario))
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editClienteModal" data-id="{{ $cliente->id }}"
                                        data-name="{{ $cliente->name }}">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </td>
                            @endif
                            @if (in_array(12, $permisosUsuario))
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('clientes.destroy', $cliente->id) }}">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2>Clientes Empresas</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <!-- Otros campos que quieras mostrar -->
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientesEmpresas as $cliente)
                        <tr>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <!-- Otros campos que quieras mostrar -->
                            @if (in_array(10, $permisosUsuario))
                                <td>
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#verClienteModal" data-id="{{ $cliente->id }}">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                </td>
                            @endif
                            @if (in_array(11, $permisosUsuario))
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editClienteModal" data-id="{{ $cliente->id }}"
                                        data-name="{{ $cliente->name }}">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </td>
                            @endif
                            @if (in_array(12, $permisosUsuario))
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('clientes.destroy', $cliente->id) }}">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('clientes.create')
    @include('clientes.edit')
    @include('clientes.ver')

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var confirmDeleteModal = document.getElementById('confirmDeleteModal');
            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var actionUrl = button.getAttribute('data-action');
                var form = document.getElementById('deleteForm');
                form.action = actionUrl;
            });

            var createClientModal = document.getElementById('createClientModal');
            if (createClientModal) {
                createClientModal.addEventListener('hidden.bs.modal', function() {
                    window.location.reload();
                });
            }

            var verClienteModal = document.getElementById('verClienteModal');
            if (verClienteModal) {
                verClienteModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var clienteId = button.getAttribute('data-id');

                    fetch(`/clientes/data/${clienteId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                            } else {
                                document.getElementById('viewClienteId').textContent = data.id;
                                document.getElementById('viewClienteName').textContent = data.name;
                                document.getElementById('viewClienteEmail').textContent = data.email;
                                // Actualiza con otros datos necesarios
                            }
                        })
                        .catch(error => console.error('Error al obtener los datos del cliente:', error));
                });
            }
        });
    </script>
@endsection
