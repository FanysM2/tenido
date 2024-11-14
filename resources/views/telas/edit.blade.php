@extends('layouts.admin')

@section('contenido')

<style>
    /* Se usan los mismos estilos de la vista anterior */
    body {
        background-color: #3719bd;
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    .container {
        max-width: 900px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #1c3d5e;
        margin-bottom: 30px;
        font-size: 36px;
        font-weight: bold;
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

    .btn-primary {
        background-color: #2b9e2a;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #237d23;
    }

    /* Estilos para el formulario */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        color: #1c3d5e;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .form-group input:focus {
        border-color: #2b9e2a;
        outline: none;
    }

    .form-group button {
        padding: 12px 20px;
        background-color: #2b9e2a;
        color: white;
        border-radius: 5px;
        border: none;
        font-size: 18px;
        width: 100%;
    }

    .form-group button:hover {
        background-color: #237d23;
    }
</style>

<div class="container">
    <h1>Editar Tela</h1>

    <!-- Formulario para editar la tela -->
    <form action="{{ route('telas.update', $tela->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre de la Tela</label>
            <input type="text" name="nombre" id="nombre" value="{{ $tela->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad (m)</label>
            <input type="number" name="cantidad" id="cantidad" value="{{ $tela->cantidad }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Tela</button>
        </div>
    </form>

    <a href="{{ route('telas.index') }}" class="btn btn-secondary">Volver al Inventario</a>
</div>

@endsection
