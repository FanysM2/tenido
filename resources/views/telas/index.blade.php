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
            background-color: #e0a800; /* Azul marino */
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #e0a800; /* Azul más oscuro */
            transform: scale(1.05);
        }

        /* Tabla con bordes redondeados */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #1c3d5e; /* Azul marino */
            color: #fff;
            font-weight: bold;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .table td {
            color: #02060a;
        }

        /* Acciones de la tabla */
        .table-actions {
            display: flex;
            gap: 10px; /* Espacio entre los botones de acción */
        }

        .table-actions button {
            padding: 5px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            background-color: #dc3545;
            transition: background-color 0.3s ease;
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
        <h1>Inventario de Telas</h1>
        <a href="{{ route('telas.create') }}" class="btn btn-primary">Agregar Tela</a>
        <a href="{{ route('telas.dashboard') }}" class="btn btn-secondary">Ver Dashboard</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad (m)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <div class="text-center mb-4">
                    <a href="{{ route('reporte.telas') }}" class="btn btn-primary">Generar Reporte PDF</a>
                </div>

                @foreach ($telas as $tela)
                <tr>
                    <td>{{ $tela->nombre }}</td>
                    <td>{{ $tela->cantidad }}</td>
                    <td>
                        <!-- Acciones como editar y eliminar -->
                        <div class="table-actions">
                            <a href="{{ route('telas.edit', $tela->id) }}" class="btn btn-secondary">Editar</a>
                            
                            <!-- Formulario de eliminación con validación -->
                            <form action="{{ route('telas.destroy', $tela->id) }}" method="POST" 
                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta tela?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
