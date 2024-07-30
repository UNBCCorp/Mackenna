@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Sucursales</h1>
        <br />

        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(22, $permisosUsuario))
            <!-- Cambia 8 por el ID del permiso necesario -->
            <div class="d-flex justify-content-end">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSurcursalModal">+Crear
                    Sucursal</a>
            </div>
        @endif
        <form id="search-form" action="{{ route('surcursales.index') }}" method="GET" class="mb-3">
            <br />
            <div class="input-group">
                <input type="text" id="search-input" name="search" class="form-control"
                    placeholder="Buscar por nombre..." value="{{ $search }}">
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sucursales as $sucursal)
                    <tr>
                        @if (in_array(21, $permisosUsuario))
                            <td>{{ $sucursal->id }}</td>
                            <td>{{ $sucursal->nombre }}</td>
                            <td>{{ $sucursal->direccion }}</td>
                            <td>{{ $ciudad[$sucursal->ciudad]->nombre ?? 'No disponible' }}</td>
                        @endif

                        <td>
                            <!-- Habilita el botón de editar solo si el usuario tiene el permiso correspondiente -->
                            @if (in_array(23, $permisosUsuario))
                                <!-- Cambia 9 por el ID del permiso necesario -->
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editsucursalModal" data-id="{{ $sucursal->id }}"
                                    data-name="{{ $sucursal->nombre }}" data-direccion="{{ $sucursal->direccion }}"
                                    data-ciudad="{{ $sucursal->ciudad }}" data-tipo="{{ $sucursal->tipo_sucursal }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif

                            <!-- Habilita el botón de eliminar solo si el usuario tiene el permiso correspondiente -->
                            @if (in_array(24, $permisosUsuario))
                                <!-- Cambia 10 por el ID del permiso necesario -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-action="{{ route('surcursales.destroy', $sucursal->id) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('sucursales.create')
    @include('sucursales.edit')

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
            $('#search-input').on('input', function() {
                var search = $(this).val();
                $.ajax({
                    url: '{{ route('surcursales.index') }}',
                    method: 'GET',
                    data: {
                        search: search
                    },
                    success: function(response) {
                        // Actualiza el contenido de la tabla con los nuevos resultados
                        $('tbody').html($(response).find('tbody').html());
                    }
                });
            });
            var confirmDeleteModal = document.getElementById('confirmDeleteModal');
            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Botón que abrió el modal
                var actionUrl = button.getAttribute('data-action'); // URL de la acción de eliminación

                var form = document.getElementById('deleteForm');
                form.action = actionUrl; // Actualiza la acción del formulario
            });

            var createSurcursalModal = document.getElementById('createSurcursalModal');
            createSurcursalModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
