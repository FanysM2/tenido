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
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra suave */
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

    .form-group {
        margin-bottom: 20px; /* Espaciado entre los campos */
    }

    .form-group label {
        font-size: 1.1em;
        color: #1c3d5e; /* Azul marino para las etiquetas */
        font-weight: bold;
    }

    .form-control {
        border-radius: 5px;
        padding: 10px;
        font-size: 1em;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #1c3d5e; /* Azul marino cuando el campo está enfocado */
        box-shadow: 0 0 5px rgba(28, 61, 94, 0.5); /* Efecto de sombra al enfocar */
    }

    .btn-primary {
        width: 100%;
        padding: 12px;
        background-color: #237d23; /* Verde */
        color: white;
        font-size: 1.2em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1c3d5e; /* Azul marino al pasar el cursor */
    }

    .btn-secondary {
        width: 100%;
        padding: 12px;
        background-color: #1c3d5e; /* Azul marino */
        color: white;
        font-size: 1.2em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #155a7b; /* Azul marino más oscuro al pasar el cursor */
    }
</style>

<div class="container">
    <h1>Agregar Máquina</h1>

    <form action="{{ route('aparatos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="form-group">
            <label for="caracteristicas">Características</label>
            <textarea class="form-control" id="caracteristicas" name="caracteristicas"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="{{ route('aparatos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection
