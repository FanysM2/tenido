@extends('layouts.admin')

@section('contenido')

<style>
    body {
        background-color: #f4f4f9; /* Fondo suave */
        font-family: 'Arial', sans-serif; /* Fuente limpia y moderna */
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


    .container {
        margin-top: 20px;
        padding: 40px; /* Espacio extra para mayor comodidad */
        background-color: #d9dadb; /* Fondo blanco para el contenedor */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra profunda */
    }

    /* Estilo para el título de la página */
    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #1c3d5e; /* Azul marino */
        font-weight: bold;
        font-size: 2.5em; /* Tamaño grande */
    }

    .form-group {
        margin-bottom: 25px; /* Espaciado entre los campos */
    }

    label {
        font-size: 1.1em;
        font-weight: bold;
        color: #1c3d5e; /* Azul marino */
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 1em;
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
        border-color: #1c3d5e; /* Resaltar en azul marino */
        outline: none;
    }

    small {
        display: block;
        margin-top: 5px;
        font-size: 0.9em;
        color: #888;
    }

    button[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #237d23; /* Verde */
        color: #f8fcff;
        font-size: 1.1em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #1c3d5e; /* Azul marino */
    }

    .alert {
        margin-bottom: 20px;
    }
    .volver {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1c3d5e; /* Azul marino */
            color: white;
            font-size: 1.1em;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }


</style>

<div class="container">
    <h1>Editar Marca</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('marcas.update', $marca->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $marca->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
            <small>Dejar en blanco si no deseas cambiar la imagen.</small>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Marca</button>
        <a href="{{ route('marcas.index') }}" class="volver">Volver</a>
    </form>
</div>

@endsection

