<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área de Teñido</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Estilo general del body */
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #1c3d5e;
            color: #333;
            overflow: hidden;
            height: 100vh;
            position: relative;
        }

        /* Estilo del video de fondo */
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Asegura que el video esté detrás del contenido */
        }

        /* Contenedor principal */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.075); /* Fondo blanco semi-transparente */
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        /* Título principal */
        h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: #bbcff1; /* Azul marino */
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Subtítulo */
        p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #f7f9fd; /* Gris suave */
            font-weight: 400;
        }

        /* Estilo de los botones */
        a {
            display: inline-block;
            margin: 0.75rem;
            padding: 0.75rem 2rem;
            font-weight: bold;
            color: white;
            background-color: #09f831; /* Verde suave */
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #1b4d1f; /* Verde más oscuro al pasar el ratón */
            transform: translateY(-3px);
        }

        /* Estilo del pie de página */
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #e8ebf3; /* Gris claro */
        }

        /* Media queries para hacer la página responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            p {
                font-size: 1rem;
            }
            a {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Video de fondo -->
    <video class="video-background" autoplay loop muted>
        <source src="{{ asset('libs/img/Sin título (2).mp4') }}" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>

    <div class="container">
        <h1>Bienvenido al Área de Teñido</h1>
        <p>Explora el arte del teñido y crea obras maestras con colores vibrantes.</p>

        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/home') }}">Ir al Inicio</a>
                @else
                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="footer">
            &copy; {{ date('Y') }} Área de Teñido. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
