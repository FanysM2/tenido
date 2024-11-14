@extends('layouts.admin')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Título de la página */
        h1 {
            color: #1c3d5e; /* Azul marino */
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            padding-top: 30px;
        }

        /* Contenedor principal */
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #d9dadb;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Estilos del formulario */
        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 16px;
            color: #495057;
            background-color: #f8f9fa;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #2b9e2a; /* Verde */
            outline: none;
            box-shadow: 0 0 5px rgba(43, 158, 42, 0.5); /* Verde suave */
        }

        /* Botón de creación */
        button {
            padding: 12px;
            font-size: 16px;
            color: white;
            background-color: #1c3d5e; /* Azul marino */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #237d23; /* Verde más oscuro */
        }

        /* Botón de regresar */
        .btn-regresar {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #2b9e2a; /* Verde */
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-regresar:hover {
            background-color: #237d23; /* Verde más oscuro */
        }
    </style>
</head>
<body>

    <h1>Crear Usuario</h1>

    <div class="container">
        <a href="{{ route('users.index') }}" class="btn-regresar">Regresar a Usuarios</a>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="form-group">
                <label class="form-label" for="name">Nombre</label>
                <input type="text" name="name" id="name" placeholder="Nombre" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>

            <!-- Rol -->
            <div class="form-group">
                <label class="form-label" for="role">Rol</label>
                <select name="role" id="role" required>
                    <option value="admin">Administrador</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="trabajador">Trabajador</option>
                </select>
            </div>

            <!-- Botón de creación -->
            <button type="submit">Crear</button>
        </form>
    </div>

</body>
</html>

@endsection
