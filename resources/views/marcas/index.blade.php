@extends('layouts.admin')

@section('contenido')

<style>
    body {
        background-color: #f4f4f9; /* Fondo suave */
    }

    .container {
        margin-top: 20px;
        padding: 30px; /* Aumentar padding para un aspecto más espacioso */
        background-color: #d9dadb; /* Fondo blanco para el contenedor */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra más profunda */
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

    /* Estilo del título principal */
    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #1c3d5e; /* Azul Marino */
        font-weight: bold; /* Negrita para el título */
        font-size: 2.5em; /* Tamaño de fuente mayor */
    }

    .form-group {
        margin-bottom: 20px; /* Espacio entre los campos */
    }

    /* Estilo para el botón Agregar Marca */
    .btn-primary {
        width: 100%; /* Botón ocupa todo el ancho */
        padding: 10px; /* Aumentar el padding del botón */
        font-size: 1.1em; /* Tamaño de fuente más grande */
        background-color: #237d23; /* Azul Marino */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #1c3d5e; /* Verde más oscuro */
    }

    /* Estilo de las tarjetas de marca */
    .brand-card {
        border: 1px solid #dee2e6; /* Borde de las tarjetas */
        border-radius: 5px; /* Bordes redondeados */
        padding: 15px;
        text-align: center; /* Centrar texto en la tarjeta */
        margin-bottom: 20px; /* Espacio entre tarjetas */
        transition: transform 0.2s; /* Efecto de transición */
        background-color: #ffffff; /* Fondo blanco para la tarjeta */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para las tarjetas */
    }

    .brand-card:hover {
        transform: translateY(-5px); /* Efecto de levantamiento al pasar el mouse */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); /* Sombra más pronunciada al hover */
    }

    .brand-card h5 {
        background: linear-gradient(90deg, #1c3d5e, #00c6ff); /* Fondo degradado para el título de la tarjeta */
        color: white; /* Color de texto blanco */
        padding: 10px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        font-size: 1.2em; /* Tamaño de fuente del título */
    }

    .brand-card img {
        border-radius: 5px; /* Bordes redondeados para las imágenes */
        width: 100px; /* Ajustar el ancho de las imágenes */
        height: auto; /* Mantener proporción de la imagen */
        margin-top: 10px; /* Espacio superior para la imagen */
    }

    .btn-danger {
        margin-top: 5px; /* Espacio superior para el botón de eliminar */
    }

    .alert {
        margin-bottom: 20px; /* Espacio inferior para alertas */
    }

    .text-center {
        margin-top: 20px;
    }
</style>

<div class="container">
    <h1>Marcas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($esAdmin) <!-- Solo muestra el formulario si el usuario es admin -->
        <form action="{{ route('marcas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Marca</button>
        </form>
    @endif

    <div class="row">
        @foreach ($marcas as $marca)
        <div class="col-md-4">
            <div class="brand-card">
                <h5>{{ $marca->titulo }}</h5>
                <img src="{{ asset('storage/' . $marca->ruta_imagen) }}" alt="{{ $marca->titulo }}">
                @if ($esAdmin) <!-- Solo muestra el botón de editar si el usuario es admin -->
                    <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-warning btn-sm">Editar</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
