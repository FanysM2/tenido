@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos Generales */
        body {
            background-color: #f4f4f9; /* Fondo claro y suave */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #1c3d5e; /* Azul marino */
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #d9dadb;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1.1em;
            color: #1c3d5e;
            font-weight: bold;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #237d23; /* Verde */
            box-shadow: 0 0 5px rgba(35, 125, 35, 0.5);
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1c3d5e; /* Verde */
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1c3d5e; /* Azul marino */
        }

        .volver {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #237d23; /* Azul marino */
            color: white;
            font-size: 1.1em;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .volver:hover {
            background-color: #155a7b; /* Azul más oscuro */
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Editar Paso</h1>
        
        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" value="{{ $menu->titulo }}" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" required>{{ $menu->descripcion }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="imagen">Imagen de fondo:</label>
                <input type="file" name="imagen">
            </div>
            
            <button type="submit">Actualizar Paso</button>
        </form>
        
        <a href="{{ route('menus.index') }}" class="volver">Volver</a>
    </div>

</body>
</html>

@endsection
