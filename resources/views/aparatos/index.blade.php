@extends('layouts.admin')

@section('contenido')

<style>
    body {
        background-color: #f4f4f9; /* Fondo suave para la página */
        font-family: 'Arial', sans-serif; /* Fuente clara y moderna */
    }

    .container {
        margin-top: 30px;
        padding: 40px;
        background-color: #d9dadb; /* Fondo blanco para el contenedor */
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    }

    button {
            width: 100%;
            padding: 10px;
            background-color: #1c3d5e;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }


    /* Título principal */
    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #1c3d5e; /* Azul marino */
        font-weight: bold;
        font-size: 2.5em;
    }

    .alert {
        margin-bottom: 20px;
    }

    /* Botón Agregar Máquina */
    .btn-primary {
        width: 100%;
        padding: 12px;
        background-color: #237d23; /* Verde */
        color: white;
        font-size: 1.1em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1c3d5e; /* Azul marino */
    }

    /* Estilo para las tarjetas de máquinas */
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px); /* Efecto de elevación */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        height: 200px; /* Controlar la altura de la imagen */
        object-fit: cover; /* Asegura que la imagen se recorte correctamente */
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-title {
        color: #1c3d5e; /* Azul marino para el título */
        font-weight: bold;
        font-size: 1.2em;
    }

    .card-footer {
        padding: 10px;
        background-color: #f8f9fa;
        text-align: center;
    }

    .row {
        margin-top: 20px;
    }
</style>

<div class="container">
    <h1>Catálogo de Máquinas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Verificamos si el usuario es administrador o supervisor --}}
    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'supervisor')
        <a href="{{ route('aparatos.create') }}" class="btn btn-primary">Agregar Máquina</a>
    @endif

    <div class="row mt-4">
        @foreach ($aparatos as $aparato)
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="{{ route('aparatos.show', $aparato) }}">
                        <img src="{{ asset('storage/' . $aparato->ruta_imagen) }}" class="card-img-top" alt="{{ $aparato->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aparato->titulo }}</h5>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
