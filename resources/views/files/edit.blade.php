@extends('layouts.admin')

@section('contenido')
<style>
    /* Estilos globales */
    body {
        background-color: #f4f4f9; /* Fondo claro */
        font-family: 'Arial', sans-serif;
        padding: 0;
        margin: 0;
    }

    /* Contenedor principal */
    .container {
        max-width: 800px;
        margin: 0 auto;
        background: #d9dadb;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    /* Título */
    h1 {
        text-align: center;
        color: #1c3d5e; /* Azul marino */
        font-size: 2.5em;
        margin-bottom: 30px;
        font-weight: bold;
    }

    /* Estilo del formulario */
    form {
        display: flex;
        flex-direction: column;
    }

    /* Campo de entrada de archivo */
    input[type="file"] {
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 1.1em;
        transition: border-color 0.3s;
    }

    input[type="file"]:focus {
        border-color: #237d23; /* Verde cuando está enfocado */
        outline: none;
    }

    /* Botón de acción */
    button {
        padding: 12px;
        background-color: #1c3d5e; /* Verde */
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 1.2em;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #1c6f1f; /* Verde oscuro */
    }

    /* Estilo para el botón de volver */
    .btn-back {
        text-decoration: none;
        color: #fff;
        background-color: #237d23; /* Azul marino */
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1.1em;
        text-align: center;
        margin-top: 20px;
        display: block;
        width: 100%;
        text-align: center;
        transition: background-color 0.3s;
    }

    .btn-back:hover {
        background-color: #155a7b; /* Azul marino oscuro */
    }
</style>

<div class="container">
    <h1>Editar archivo: {{ $file->name }}</h1>

    <form action="{{ route('files.update', $file) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Campo para seleccionar un archivo -->
        <input type="file" name="file" required>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Actualizar</button>
    </form>

    <!-- Botón para volver a la lista de archivos -->
    <a href="{{ route('files.index') }}" class="btn-back">Volver a la lista de archivos</a>
</div>
@endsection
