@extends('layouts.admin')

@section('contenido')

<style>
    /* Estilos Globales */
    body {
        background-color: #3719bd; /* Fondo morado oscuro */
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

    button:hover {
        background-color: #153a54; /* Azul más oscuro */
    }

    h1 {
        text-align: center;
        color: #1c3d5e; /* Azul marino */
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 40px;
    }

    /* Botón de crear nuevo paso */
    .create-btn {
        display: inline-block;
        padding: 12px 35px;
        background-color: #2b9e2a; /* Verde fuerte */
        color: white;
        font-size: 1.1em;
        border-radius: 8px;
        text-decoration: none;
        text-align: center;
        transition: background-color 0.3s, transform 0.3s;
        margin-bottom: 30px;
    }

    .create-btn:hover {
        background-color: #237d23; /* Verde más oscuro */
        transform: translateY(-5px);
    }

    /* Contenedor de elementos (tarjetas) */
    .menu-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        padding: 0 20px;
    }

    .menu-item {
        position: relative;
        padding: 20px;
        border-radius: 12px;
        background-color: #d9dadb;
        box-shadow: 0 6px 15px rgba(12, 5, 5, 0.952);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .menu-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .menu-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        transition: opacity 0.3s ease;
    }

    .menu-item:hover img {
        opacity: 0.7;
    }

    .menu-item h2 {
        color: #132333; /* Azul marino */
        font-size: 1.7em;
        margin: 20px 0 10px;
        font-weight: bold;
    }

    .menu-item p {
        color: #0c0101;
        font-size: 1em;
        line-height: 1.6;
    }

    /* Acciones (editar y eliminar) */
    .actions {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
    }

    .actions a, .actions button {
        padding: 10px 20px;
        font-size: 1.1em;
        color: rgb(14, 0, 0);
        border-radius: 6px;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    /* Botón de editar */
    .actions a {
        background-color: #dfff4f; /* Azul marino */
    }

    

    /* Botón de eliminar */
    .actions button {
        background-color: #e41126; /* Rojo */
    }

    .actions button:hover {
        background-color: #c82333; /* Rojo más oscuro */
        transform: translateY(-3px);
    }

</style>

<div class="container">
    <h1>Pasos para fabricar tela</h1>
    
    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'supervisor')
        <a href="{{ route('menus.create') }}" class="btn btn-primary create-btn">Crear nuevo Paso</a>
    @endif

    <div class="menu-container">
        @foreach ($menus as $menu)
            <div class="menu-item">
                <img src="{{ asset('storage/' . $menu->imagen) }}" alt="{{ $menu->titulo }}">
                <h2>{{ $menu->titulo }}</h2>
                <p>{{ $menu->descripcion }}</p>
                <div class="actions">
                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'supervisor')
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este menú?');">Eliminar</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
