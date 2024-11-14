@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas</title>
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

        button {
            background-color: #1c3d5e;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container {
            background-color: #d9dadb;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .question-item {
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question-item .d-flex {
            justify-content: space-between;
            padding: 15px;
            align-items: center;
        }

        .question-item .d-flex div {
            flex: 1;
        }

        .badge-info {
            background-color: #237d23; /* Verde */
            color: white;
            font-size: 0.9em;
        }

        .actions {
            margin-top: 10px;
            text-align: right;
        }

        .actions a,
        .actions button {
            font-size: 0.9em;
            padding: 6px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .actions a {
            background-color: #ffc107; /* Azul marino */
            color: white;
        }

        .actions a:hover {
            background-color: #e0a800;
        }

        .actions button {
            background-color: #dc3545; /* Rojo */
            color: white;
        }

        .actions button:hover {
            background-color: #c82333;
        }

        .answer-form input {
            border-radius: 5px;
            padding: 10px;
            font-size: 1em;
            width: 100%;
            margin-bottom: 10px;
        }

        .answer-form button {
            background-color: #237d23; /* Verde */
            color: white;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        .answer-form button:hover {
            background-color: #1c3d5e; /* Azul marino */
        }

        .text-center {
            margin-top: 20px;
        }

        .answer-item {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .answer-user {
            font-style: italic;
            color: #6c757d;
        }

        /* Botón para generar reporte */
        .btn-report {
            background-color: #1c3d5e; /* Azul marino */
            color: white;
            font-size: 1.1em;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-report:hover {
            background-color: #155a7b;
        }

        /* Estilo para el botón Agregar Pregunta */
        .btn-primary {
            background-color: #237d23; /* Verde */
            border-color: #237d23;
        }

        .btn-primary:hover {
            background-color: #1c3d5e; /* Azul marino */
            border-color: #1c3d5e;
        }

        /* Contenedor de botones */
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Preguntas</h1>

        @if(auth()->user()->role === 'admin')
            <div class="button-container">
                <a href="{{ route('questions.create') }}" class="btn btn-primary">Agregar Pregunta</a>
                <a href="{{ route('reporte.questions') }}" class="btn btn-report">Generar Reporte PDF</a>
            </div>
        @endif

        <ul class="list-group">
            @foreach ($questions as $index => $question)
                <li class="list-group-item question-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Pregunta {{ $index + 1 }}:</strong> {{ $question->text }}
                            <span class="badge badge-info">{{ $question->is_answered ? 'Respondida' : '' }}</span>
                        </div>
                        <div>
                            @if(auth()->user()->role === 'admin')
                                <div class="actions">
                                    <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('questions.destroy', $question) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pregunta?');">Eliminar</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if (auth()->user()->role === 'trabajador')
                        @if (!$question->is_answered)
                            <form action="{{ route('questions.answer', $question) }}" method="POST" class="answer-form">
                                @csrf
                                <input type="text" name="answer" class="form-control" placeholder="Escribe tu respuesta..." required>
                                <button type="submit">Responder</button>
                            </form>
                        @endif
                    @endif

                    @if (auth()->user()->role !== 'trabajador')
                        <ul class="mt-3">
                            @foreach ($question->answers as $answer)
                                <li class="answer-item">
                                    {{ $answer->answer }} 
                                    <div class="answer-user">- Respondido por {{ $answer->user->name }}</div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

@endsection
