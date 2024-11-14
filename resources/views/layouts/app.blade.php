<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        /* Estilos Generales */
        body {
            background-color: #f1f1f1;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Para evitar el desplazamiento de la página por el video */
        }

        /* Video de fondo */
        .video-background {
            position: fixed; /* Fijo para que se quede estático al hacer scroll */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Hace que el video cubra toda la pantalla */
            z-index: -1; /* Asegura que el video quede detrás del contenido */
        }

        /* Barra de navegación */
        .navbar {
            background-color: #1c3d5e; /* Azul marino */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #237d23 !important; /* Verde claro */
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .dropdown-menu {
            background-color: #f1f1f1;
        }

        .dropdown-item:hover {
            background-color: #237d23;
            color: white;
        }

        .dropdown-item {
            font-size: 1rem;
        }

        /* Contenedor principal */
        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            background-color: rgba(255, 255, 255, 0.075); /* Fondo semi-transparente sobre el video */
        }

        .container {
            margin-top: 30px;
        }

        /* Ajuste de la tipografía */
        .py-4 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* Fondo del body */
        body {
            background-color: #f7fafc;
        }
    </style>
</head>
<body>
    <!-- Video de fondo -->
    <video class="video-background" autoplay loop muted>
        <source src="{{ asset('libs/img/Sin título (2).mp4') }}" type="video/mp4">

    </video>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
