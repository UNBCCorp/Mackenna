@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="flex-grow-1 text-center mb-0">Validador de Clientes</h1>
        <br />
        <!-- Formulario de búsqueda -->
        <form action="{{ route('clientes2.validados') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o email..."
                    value="{{ $search }}">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
            </div>
        </form>

        <!-- Tabla de clientes validados -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo de Cliente</th>
                    <th>Email</th>
                    <th>Estado Cliente</th>
                    <!-- Añadir más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->name }}</td>
                        <td>{{ $cliente->tipo_cliente }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->estado_cliente }}</td>
                        <!-- Añadir más columnas según tus necesidades -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
