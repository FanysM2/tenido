@extends('layouts.admin')

@section('contenido')

<style>
    /* Estilo global de la página */
    body {
        background-color: #3719bd;
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
        max-width: 900px;
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

    /* Botones con transición */
    .btn {
        margin: 10px 5px;
        padding: 12px 18px;
        border-radius: 5px;
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

    /* Botón amarillo para editar (más pequeño) */
    .btn-warning {
        background-color: #ffc107; /* Amarillo para editar */
        color: #fcf7f7;
        width: auto; /* Tamaño automático */
        padding: 6px 12px; /* Botón más pequeño */
        text-align: center; /* Centra el texto */
        font-size: 14px; /* Fuente más pequeña */
    }

    .btn-warning:hover {
        background-color: #e0a800; /* Amarillo más oscuro */
    }

    /* Botón rojo para eliminar (más pequeño) */
    .btn-danger {
        background-color: #dc3545; /* Rojo para eliminar */
        color: white;
        width: auto; /* Tamaño automático */
        padding: 6px 12px; /* Botón más pequeño */
        text-align: center; /* Centra el texto */
        font-size: 14px; /* Fuente más pequeña */
    }

    .btn-danger:hover {
        background-color: #c82333; /* Rojo más oscuro */
    }

    /* Tabla con bordes redondeados y márgenes */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0; /* Márgenes para separar la tabla del resto del contenido */
        background-color: #fff; /* Fondo blanco para la tabla */
        border-radius: 8px; /* Bordes redondeados */
        overflow: hidden; /* Asegura que los bordes redondeados se mantengan bien */
    }

    .table th, .table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #1c3d5e; /* Azul marino */
        color: #ffffff;
        font-weight: bold;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .table td {
        color: #343a40;
    }

    /* Acciones de la tabla */
    .table-actions {
        display: flex;
        gap: 10px; /* Espacio entre los botones de acción */
    }

    .table-actions button {
        padding: 6px 12px; /* Botones más pequeños */
        width: auto; /* Tamaño automático */
        text-align: center; /* Centra el texto */
        font-size: 14px; /* Fuente más pequeña */
    }

    .table-actions button:hover {
        background-color: #d3d3d3;
    }

    /* Botón para generar reporte con animación */
    .text-center.mb-4 .btn {
        background-color: #2b9e2a; /* Verde fuerte */
        color: #fff;
        padding: 12px 20px;
        font-size: 18px;
        border-radius: 8px;
    }

    .text-center.mb-4 .btn:hover {
        background-color: #237d23; /* Verde más oscuro */
        transform: scale(1.1); /* Ampliación al pasar el ratón */
    }
</style>

<div class="container">
    @if (auth()->user()->role === 'admin')
        <h1>Usuarios</h1>

        <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td class="table-actions">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No tienes permisos para ver esta sección.</div>
    @endif
</div>

@endsection
