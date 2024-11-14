@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Tipos de Tela</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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

        h1 {
            color: #1c3d5e; /* Negro */
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            padding-top: 30px;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #d9dadb;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #1c3d5e; /* Azul marino */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .actions {
            display: flex;
            justify-content: space-around;
        }

        .btn-primary {
            background-color: #1c3d5e;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #237d23; /* Verde más oscuro */
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Botón para generar el reporte */
        .generate-report {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .generate-report a {
            background-color: #2b9e2a; /* Verde */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .generate-report a:hover {
            background-color: #237d23; /* Verde más oscuro */
        }

        /* Alerta de éxito */
        .alert-success {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Descripción de las filas de la tabla */
        td {
            color: #000000; /* Negro para la descripción */
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Catálogo de Tipos de Tela</h1>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (auth()->user()->role === 'admin')
            <div class="text-right mb-3">
                <a href="{{ route('muestras.create') }}" class="btn-primary">Subir Nueva Tela</a>
            </div>
        @endif

        <div class="generate-report">
            <a href="{{ route('reporte.muestras') }}" class="btn-primary">Generar Reporte PDF</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo de Tela</th>
                    @if (auth()->user()->role === 'admin')
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($muestras as $muestra)
                    <tr>
                        <td>{{ $muestra->titulo }}</td>
                        <td>{{ $muestra->descripcion }}</td>
                        <td><img src="{{ asset('storage/' . $muestra->ruta_muestra) }}" width="100"></td>
                        @if (auth()->user()->role === 'admin')
                            <td class="actions">
                                <a href="{{ route('muestras.edit', $muestra->id) }}" class="btn-warning">Editar</a>
                                <form action="{{ route('muestras.destroy', $muestra->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Eliminar</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

@endsection
