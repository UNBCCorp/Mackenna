@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="flex-grow-1 text-center mb-0">Grupo Vehiculos</h1>
        <br />
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTipovehiculoModal">+Crear
            Grupo</a>
        <a href="{{ route('marcavehiculo.index') }}" class="btn btn-outline-secondary">Marcas</a>
        <form action="{{ route('tipovehiculo.index') }}" method="GET" class="mb-3">
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
                @foreach ($tipos as $tipos)
                    <tr>
                        <td>{{ $tipos->id }}</td>
                        <td>{{ $tipos->nombre }}</td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editTipovehiculoModal" data-id="{{ $tipos->id }}"
                                data-name="{{ $tipos->nombre }}">
                                <i class="fas fa-edit"></i>
                            </a>


                            <form action="{{ route('tipovehiculo.destroy', $tipos->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @include('tipovehiculo.create')
    @include('tipovehiculo.edit')
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var createPermissionModal = document.getElementById('createPermissionModal');
            createPermissionModal.addEventListener('hidden.bs.modal', function() {
                window.location.reload();
            });
        });
    </script>
@endsection
