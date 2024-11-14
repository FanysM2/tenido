@extends('layouts.admin')

@section('contenido')
<style>
    /* Estilos globales */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        padding: 0;
        margin: 0;
    }

    /* Contenedor principal */
    .container {
        max-width: 600px;
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
        font-size: 2em;
        margin-bottom: 20px;
        font-weight: bold;
    }

    /* Estilo del formulario */
    form {
        display: flex;
        flex-direction: column;
    }

    /* Campo de entrada del archivo */
    input[type="file"] {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 1em;
        transition: border-color 0.3s;
    }

    input[type="file"]:hover {
        border-color: #237d23; /* Verde */
    }

    /* Botón de subir */
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
        color: #d5e3f1; /* Azul marino */
        background-color: #237d23;
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
        background-color: #237d23; /* Verde */
        color: #fff;
    }
</style>

<div class="container">
    <h1>Subir nuevo archivo</h1>

    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Subir</button>
    </form>

    <a href="{{ route('files.index') }}" class="btn-back">Volver a la lista de archivos</a>
</div>
@endsection
