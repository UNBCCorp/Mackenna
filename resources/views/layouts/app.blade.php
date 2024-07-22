<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('assets/logo.jpg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/estilos.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="sidebar">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/logo.jpg') }}" style="width: 250px; height: auto;" alt="logo">
        </a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i>Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fas fa-store"></i>Rental</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="configLink2">
                    <i class="fas fa-car"></i> Vehículos
                    <i class="fas fa-chevron-down toggle-icon" id="toggleIcon2"></i>
                </a>
                <ul class="nav hidden" id="configMenu2" style="flex-direction: column;">
                    @if (in_array('7', $permisosUsuario))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tipovehiculo.index') }}">
                                <i class="fas fa-car-rear"></i> Grupos
                            </a>
                        </li>
                    @endif
                    @if (in_array('2', $permisosUsuario))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('marcavehiculo.index') }}">
                                <i class="fas fa-car"></i> Marcas
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usergroups.index') }}">
                            <i class="fas fa-car-side"></i> Modelos
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" id="configLink">
                    <i class="fas fa-cogs"></i> Configuración
                    <i class="fas fa-chevron-down toggle-icon" id="toggleIcon"></i>
                </a>
                <ul class="nav hidden" id="configMenu" style="flex-direction: column;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i> Usuarios
                        </a>
                    </li>
                    @if (in_array('10', $permisosUsuario))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usergroups.index') }}">
                                <i class="fas fa-user-tag"></i> Roles
                            </a>
                        </li>
                    @endif
                    @if (in_array('14', $permisosUsuario))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tarifas.index') }}">
                                <i class="fas fa-money-bill-wave"></i> Tarifas
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
    <!-- User Profile Dropdown -->
    <!-- User Profile Dropdown -->
    <div class="dropdown profile-dropdown">
        @if (Auth::check())
            <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
            </button>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-danger">Ingresar</a>
        @endif
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-menu2">
            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container mt-4">
            @yield('content') <!-- Aquí se renderizará el contenido de la sección -->
        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var configLink = document.getElementById('configLink');
        var configLink2 = document.getElementById('configLink2');
        var configMenu = document.getElementById('configMenu');
        var configMenu2 = document.getElementById('configMenu2');
        var toggleIcon = document.getElementById('toggleIcon');
        var toggleIcon2 = document.getElementById('toggleIcon2');

        configLink.addEventListener('click', function(event) {
            event.preventDefault();
            configMenu.classList.toggle('hidden');
            toggleIcon.classList.toggle('rotate');
        });
        configLink2.addEventListener('click', function(event) {
            event.preventDefault();
            configMenu2.classList.toggle('hidden');
            toggleIcon2.classList.toggle('rotate');
        });
        // Ensure that dropdowns are initialized
        var dropdowns = document.querySelectorAll('.dropdown-toggle');
        dropdowns.forEach(function(dropdown) {
            new bootstrap.Dropdown(dropdown);
        });
    });
</script>

@yield('scripts')

</html>
