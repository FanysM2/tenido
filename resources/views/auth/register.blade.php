@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-white text-center" style="background-color: #1c3d5e;">
                    <h3>{{ __('Registrar') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- Rol -->
                        <div class="mb-3">
                            <label for="role" class="form-label">{{ __('Rol') }}</label>
                            <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                                <option value="supervisor">Supervisor</option>
                                <option value="trabajador">Trabajador</option>
                            </select>

                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botón de Registro -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn" style="background-color: #237d23; color: white; width: 100%; border-radius: 5px; border: none;">
                                {{ __('Registrar') }}
                            </button>
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

    /* Estilo de los botones */
    .btn {
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .btn:hover {
        opacity: 0.9;
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
