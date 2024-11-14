@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-white text-center" style="background-color: #1c3d5e;">
                    <h3>{{ __('Iniciar Sesión') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campo de correo -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo de contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Checkbox para recordar usuario -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Acuerdate de mí') }}
                            </label>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn" style="background-color: #237d23; color: white; width: 48%; border: none; border-radius: 5px;">
                                {{ __('Iniciar Sesión') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}" style="color: #1c3d5e;">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Estilos generales */
    body {
        background-color: #f1f1f1;
        background-image: linear-gradient(to top right, #1c3d5e, #237d23);
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Contenedor de la tarjeta */
    .container {
        width: 100%;
        max-width: 450px;
    }

    /* Estilo de la tarjeta */
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9);
        padding: 2rem;
    }

    /* Estilo de la cabecera de la tarjeta */
    .card-header {
        background-color: #1c3d5e; /* Azul marino */
        color: white;
        font-size: 1.5rem;
        padding: 1.5rem;
        border-radius: 8px 8px 0 0;
    }

    /* Estilo de los campos de texto */
    .form-control {
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-bottom: 1.5rem;
    }

    .form-control:focus {
        border-color: #237d23; /* Verde cuando se enfoque */
        box-shadow: 0 0 5px rgba(35, 125, 35, 0.5);
    }

    .form-check-label {
        font-size: 0.9rem;
    }

    /* Estilo de los botones */
    .btn {
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn-link {
        color: #1c3d5e;
        font-weight: 600;
    }

    .btn-link:hover {
        color: #237d23; /* Verde más oscuro */
        text-decoration: underline;
    }

    /* Resaltar campos con error */
    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: red;
    }

    /* Ajustes para pantallas pequeñas */
    @media (max-width: 768px) {
        .card {
            margin: 0 15px;
        }
    }
</style>
@endsection
