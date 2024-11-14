<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Archivos</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Contenedor principal */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Cabecera: logo de Skytex alineado a la derecha */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header img {
            max-width: 180px; /* Ajuste del tamaño del logo */
            height: auto;
        }

        .header h1 {
            font-size: 26px;
            color: #1c3d5e;
            text-align: left;
            margin: 0;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            color: #1c3d5e;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Estilo de la tabla */
        .file-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .file-table th, .file-table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .file-table th {
            background-color: #237d23; /* Color de encabezado */
            color: #fff;
            font-size: 16px;
        }

        .file-table td {
            color: #333;
            font-size: 14px;
        }

        .file-table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        .file-table tr:hover {
            background-color: #e1e1e1;
        }

        /* Estilo para etiquetas de archivo tomado */
        .tag-taken {
            background-color: black;
            color: white;
            padding: 2px 5px;
            border-radius: 3px;
            font-weight: bold;
        }

        /* Pie de página */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container">

        <!-- Cabecera con logo y título -->
        <div class="header">
            <h1>Skytex S.A. de C.V.</h1>
            <img src="https://www.skytexmexico.com/wp-content/uploads/2023/05/skytex-logo-8.png" alt="Logo de Skytex">
        </div>

        <!-- Título del reporte -->
        <h2>Reporte de Archivos</h2>

        <!-- Tabla de archivos -->
        <table class="file-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de modificación</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pie de página -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Skytex. Todos los derechos reservados.</p>
        </div>

    </div>

</body>
</html>
