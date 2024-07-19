@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Marcas Vehículos</h1>
        <br />

        <!-- Habilita el botón de crear solo si el usuario tiene el permiso correspondiente -->
        @if (in_array(1, $permisosUsuario))
            <!-- Cambia 8 por el ID del permiso necesario -->
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMarcavehiculoModal">+Crear
                Marca</a>
        @endif

        <a href="{{ route('tipovehiculo.index') }}" class="btn btn-outline-secondary">Grupo Vehículos</a>

        <form action="{{ route('marcavehiculo.index') }}" method="GET" class="mb-3">
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        @if (in_array(2, $permisosUsuario))
                            <td>{{ $marca->id }}</td>
                            <td>{{ $marca->nombre }}</td>
                        @endif

                        <td>
                            <!-- Habilita el botón de editar solo si el usuario tiene el permiso correspondiente -->
                            @if (in_array(3, $permisosUsuario))
                                <!-- Cambia 9 por el ID del permiso necesario -->
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editMarcavehiculoModal" data-id="{{ $marca->id }}"
                                    data-name="{{ $marca->nombre }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif

                            <!-- Habilita el botón de eliminar solo si el usuario tiene el permiso correspondiente -->
                            @if (in_array(4, $permisosUsuario))
                                <!-- Cambia 10 por el ID del permiso necesario -->
                                <form action="{{ route('marcavehiculo.destroy', $marca->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('marcavehiculo.create')
    @include('marcavehiculo.edit')
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var createMarcavehiculoModal = document.getElementById('createMarcavehiculoModal');
            createMarcavehiculoModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
