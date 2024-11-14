@extends('layouts.admin')

@section('contenido')

<style>
    /* Estilo global de la página */
    body {
        background-color: #f4f7fa; /* Fondo gris claro */
        font-family: 'Arial', sans-serif;
        color: #333;
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


    /* Estilo del contenedor principal */
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: #d9dadb;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Titulo principal */
    h1 {
        text-align: center;
        color: #1c3d5e; /* Azul marino */
        margin-bottom: 30px;
        font-size: 36px;
        font-weight: bold;
    }

    /* Estilo del formulario */
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        color: #333;
        margin-bottom: 8px;
        font-weight: bold;
    }

    /* Estilo de los inputs */
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #2b9e2a; /* Verde fuerte */
        box-shadow: 0 0 8px rgba(43, 158, 42, 0.5); /* Resplandor verde */
    }

    /* Estilo de los botones */
    .btn {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    /* Botón primario con verde fuerte */
    .btn-primary {
        background-color: #2b9e2a; /* Verde fuerte */
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #237d23; /* Verde más oscuro */
        transform: scale(1.05); /* Efecto de ampliación al pasar el ratón */
    }

    /* Botón secundario con azul marino */
    .btn-secondary {
        background-color: #1c3d5e; /* Azul marino */
        color: #fff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #153a54; /* Azul más oscuro */
        transform: scale(1.05);
    }

    /* Mensajes de error */
    .text-danger {
        color: #dc3545; /* Rojo para mensajes de error */
        font-size: 14px;
    }
</style>

<div class="container">
    <h1>Agregar Tela</h1>
    <form action="{{ route('telas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad (m):</label>
            <input type="number" name="cantidad" class="form-control" required>
            @error('cantidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="{{ route('telas.index') }}" class="btn btn-secondary">Volver al Inventario</a>
    </form>
</div>

@endsection
