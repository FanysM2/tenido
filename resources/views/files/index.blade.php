@extends('layouts.admin')

@section('contenido')
<style>
    /* Contenedor principal */
    .container {
        max-width: 800px;
        margin: 0 auto;
        background: #d9dadb;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
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

    /* Título */
    .title {
        text-align: center;
        color: #1c3d5e; /* Azul marino */
        font-size: 2em;
        margin-bottom: 20px;
        font-weight: bold;
    }

    /* Estilo común para botones */
    .btn {
        text-decoration: none;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
        margin-right: 5px;
        transition: background-color 0.3s;
        border: none;
        cursor: pointer;
    }

    /* Botón principal (subir archivo) */
    .btn-primary {
        background-color: #1c3d5e; /* Azul marino */
    }

    .btn-primary:hover {
        background-color: #155a7b; /* Azul oscuro */
    }

    /* Tabla de archivos */
    .file-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #ffffff; /* Fondo blanco para la tabla */
    }

    .file-table th, .file-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .file-table th {
        background-color: #f2f2f2; /* Fondo claro para el encabezado */
        color: #1c3d5e; /* Azul marino */
    }

    .file-table tr:hover {
        background-color: #f1f1f1;
    }

    /* Botón para cambiar estado (Tomar/Liberar) */
    .btn-toggle {
        background-color: #237d23; /* Verde */
    }

    .btn-toggle:hover {
        background-color: #1c6f1f; /* Verde oscuro */
    }

    /* Botón de editar */
    .btn-edit {
        background-color: #ffc107; /* Amarillo */
    }

    .btn-edit:hover {
        background-color: #e0a800; /* Amarillo oscuro */
    }

    /* Botón de eliminar */
    .btn-delete {
        background-color: #dc3545; /* Rojo */
    }

    .btn-delete:hover {
        background-color: #c82333; /* Rojo oscuro */
    }

    /* Etiqueta de "tomado" */
    .tag-taken {
        background-color: #000; /* Negro */
        color: white;
        padding: 2px 5px;
        border-radius: 3px;
        font-weight: bold;
    }

    /* Botón para generar reporte */
    .btn-report {
        background-color: #237d23; /* Verde */
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
        background-color: #1c6f1f; /* Verde oscuro */
    }
</style>

<div class="container">
    <h1 class="title">Archivos</h1>

    <div class="text-center mb-4">
        <a class="btn btn-primary" href="{{ route('files.create') }}">Subir nuevo archivo</a>
        <a href="{{ route('reporte.files') }}" class="btn btn-report">Generar Reporte PDF</a>
    </div>

    <table class="file-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Fecha de modificación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr>
                <td>
                    {{ $file->name }}
                    @if($file->is_taken)
                        <span class="tag-taken">(Tomado por: {{ $file->taken_by }})</span>
                    @endif
                </td>
                <td>{{ $file->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $file->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('files.toggle', $file) }}" method="POST" style="display:inline;">
                        @csrf
                        @if(!$file->is_taken)
                            <input type="text" name="taken_by" placeholder="Tu nombre" required style="margin-right: 5px;">
                        @endif
                        <button type="submit" class="btn btn-toggle">{{ $file->is_taken ? 'Liberar' : 'Tomar' }}</button>
                    </form>
                    <a class="btn btn-edit" href="{{ route('files.edit', $file) }}">Editar</a>
                    <form action="{{ route('files.destroy', $file) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
