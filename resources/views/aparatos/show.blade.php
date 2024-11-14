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
        box-shadow: 0 0 20px rgba(10, 3, 3, 0.1); /* Sombra suave */
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

    h3 {
        color: #237d23; /* Verde */
        font-weight: bold;
        margin-top: 20px;
        font-size: 1.8em;
    }

    .img-fluid {
        display: block;
        margin: 20px auto;
        max-width: 100%;
        height: auto;
        border-radius: 8px; /* Bordes redondeados para la imagen */
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

    /* Estilo para las características con texto negro */
    .caracteristicas {
        color: black; /* Cambié el color de las características a negro */
        font-size: 1.2em; /* Ajusté el tamaño de la fuente de las características */
        line-height: 1.5; /* Mejoré el espaciado entre líneas */
    }

</style>

<div class="container">
    <h1>{{ $aparato->titulo }}</h1>
    <img src="{{ asset('storage/' . $aparato->ruta_imagen) }}" class="img-fluid" alt="{{ $aparato->titulo }}">
    
    <h3>Características</h3>
    <p class="caracteristicas">{{ $aparato->caracteristicas }}</p>
    
    <a href="{{ route('aparatos.index') }}" class="btn btn-secondary">Volver</a>
</div>

@endsection
