@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pregunta</title>
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f9; /* Fondo claro */
            font-family: 'Arial', sans-serif;
            padding: 0;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #1c3d5e; /* Azul marino */
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .container {
            background-color: #d9dadb;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1.1em;
            margin-bottom: 20px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #1c3d5e; /* Azul marino */
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1c3d5e; /* Verde */
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1c3d5e; /* Azul marino */
        }

        .btn-back {
            margin-top: 20px;
            display: inline-block;
            font-size: 1.1em;
            text-decoration: none;
            color: white;
            background-color: #237d23; /* Verde */
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #1c3d5e; /* Azul marino */
        }

        .form-container {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>

    <div class="container mt-5 form-container">
        <h1>Editar Pregunta</h1>

        <form action="{{ route('questions.update', $question) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <input type="text" name="text" value="{{ $question->text }}" required>
            </div>

            <button type="submit">Actualizar</button>
        </form>

        <a href="{{ route('questions.index') }}" class="btn-back">Volver</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

@endsection
