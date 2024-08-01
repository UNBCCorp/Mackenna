@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Graficos Vehículos</h1>
        <br />

        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(34, $permisosUsuario))
            <!-- Cambia 8 por el ID del permiso necesario -->
            <div class="d-flex justify-content-end">
                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createGraficovehiculoModal">+Crear Grafico</a>
            </div>
        @endif
        <form id="search-form" action="{{ route('graficovehiculo.index') }}" method="GET" class="mb-3">
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
                    <th>Grafico</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($graficos as $grafico)
                    <tr>
                        @if (in_array(33, $permisosUsuario))
                            <td>{{ $grafico->id }}</td>
                            <td>{{ $grafico->nombre }}</td>
                            <td>
                                @if ($grafico->ruta_archivo)
                                    <img src="{{ asset('storage/graficos/' . $grafico->ruta_archivo) }}"
                                        alt="{{ $grafico->nombre }}" style="max-width: 100px; height: auto;">
                                @else
                                    <span>No disponible</span>
                                @endif
                            </td>
                        @endif

                        <td>
                            <!-- Habilita el botón de editar solo si el usuario tiene el permiso correspondiente -->
                            @if (in_array(35, $permisosUsuario))
                                <!-- Cambia 9 por el ID del permiso necesario -->
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editGraficovehiculoModal" data-id="{{ $grafico->id }}"
                                    data-name="{{ $grafico->nombre }}" data-ruta="{{ $grafico->ruta_archivo }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif

                            <!-- Habilita el botón de eliminar solo si el usuario tiene el permiso correspondiente -->
                            @if (in_array(36, $permisosUsuario))
                                <!-- Cambia 10 por el ID del permiso necesario -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-action="{{ route('graficovehiculo.destroy', $grafico->id) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('graficovehiculo.create')
    @include('graficovehiculo.edit')

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
                    url: '{{ route('graficovehiculo.index') }}',
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

            var createGraficovehiculoModal = document.getElementById('createGraficovehiculoModal');
            createGraficovehiculoModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
