@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Tarifas</h1>
        <br />

        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(13, $permisosUsuario))
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTarifaModal">+Crear
                    Tarifa</a>
            </div>
        @endif
        <br />

        <form id="search-form" action="{{ route('tarifas.index') }}" method="GET" class="mb-3">
            <br />
            <div class="input-group">
                <input type="text" id="search-input" name="search" class="form-control"
                    placeholder="Buscar por nombre..." value="{{ $search }}">
            </div>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Porcentaje</th>
                        <th>Grupos Vehiculos</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarifas as $tarifa)
                        <tr>
                            @if (in_array(14, $permisosUsuario))
                                <td>{{ $tarifa->id }}</td>
                                <td>{{ $tarifa->nombre }}</td>
                                <td>{{ $tarifa->porcentaje }}</td>
                                @php
                                    $tipoVehiculoArray = is_array($tarifa->tipo_vehiculo)
                                        ? $tarifa->tipo_vehiculo
                                        : json_decode($tarifa->tipo_vehiculo, true);
                                @endphp
                                <td>
                                    @foreach ($tipoVehiculoArray as $tipovehiculoId)
                                        @if (isset($tipovehiculos[$tipovehiculoId]))
                                            <span
                                                class="badge bg-secondary">{{ $tipovehiculos[$tipovehiculoId]->nombre }}</span>
                                        @else
                                            <span class="badge bg-danger">Grupo no encontrado</span>
                                        @endif
                                    @endforeach
                                </td>
                            @endif
                            @if (in_array(15, $permisosUsuario))
                                <td class="action-buttons">
                                    <!-- Habilita el botón de editar solo si el usuario tiene el permiso correspondiente -->
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editTarifaModal" data-id="{{ $tarifa->id }}"
                                        data-name="{{ $tarifa->nombre }}" data-porcentaje="{{ $tarifa->porcentaje }}"
                                        data-tipo_vehiculo="{{ json_encode($tarifa->tipo_vehiculo) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            @endif
                            @if (in_array(16, $permisosUsuario))
                                <td class="action-buttons">
                                    <!-- Habilita el botón de eliminar solo si el usuario tiene el permiso correspondiente -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('tarifas.destroy', $tarifa->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('tarifas.create')
    @include('tarifas.edit')

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
                    url: '{{ route('tarifas.index') }}',
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

            var createTarifaModal = document.getElementById('createTarifaModal');
            createTarifaModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
