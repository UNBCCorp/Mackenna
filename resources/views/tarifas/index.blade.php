@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Tarifas</h1>
        <br />
        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(13, $permisosUsuario))
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTarifaModal">+Crear
                Tarifa</a>
        @endif
        <br />
        <form action="{{ route('tarifas.index') }}" method="GET" class="mb-3">
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
                                        <i class="fas fa-edit"></i> <!-- Ícono de lápiz -->
                                    </a>

                                </td>
                            @endif
                            @if (in_array(16, $permisosUsuario))
                                <td class="action-buttons">
                                    <!-- Habilita el botón de eliminar solo si el usuario tiene el permiso correspondiente -->

                                    <form action="{{ route('tarifas.destroy', $tarifa->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> <!-- Ícono de basura -->
                                        </button>
                                    </form>

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
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var createTarifaModal = document.getElementById('createTarifaModal');
            createTarifaModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
