@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Tela</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 40px;
            background-color: #d9dadb;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 30px;
            text-align: center;
            color: #1c3d5e; /* Azul Marino */
            font-size: 2.5rem; /* Tamaño de letra consistente con otros títulos */
            font-weight: bold; /* Letra gruesa */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #343a40; /* Gris oscuro */
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #1c3d5e; /* Azul Marino */
            box-shadow: 0 0 5px rgba(28, 61, 94, 0.5); /* Azul */
            outline: none;
        }

        .btn-primary {
            background-color: #1c3d5e; /* Azul Marino */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #237d23; /* Verde más oscuro */
        }

        .btn-secondary {
            background-color: #237d23; /* Verde */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #1e6e1e; /* Verde más oscuro */
        }

        .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Tipo de Tela</h1>

        <form action="{{ route('muestras.update', $muestra->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $muestra->titulo }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $muestra->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="muestra">Tela:</label>
                <input type="file" name="muestra" id="muestra" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Tipo de Tela</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('muestras.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</body>
</html>

@endsection
