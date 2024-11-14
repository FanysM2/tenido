<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inventario de Telas</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
            color: #333;
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

        /* Título del reporte */
        h2 {
            text-align: center;
            font-size: 24px;
            color: #1c3d5e;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Estilo de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #237d23;
            color: #fff;
            font-size: 16px;
        }

        td {
            color: #333;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #e1e1e1;
        }

        /* Estilos adicionales de pie de página */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }

        /* Estilo de líneas de separación en la tabla */
        table, th, td {
            border: 1px solid #ddd;
        }

        /* Espaciado en el documento */
        .content {
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <!-- Cabecera con logo a la derecha -->
    <div class="header">
        <h1>Skytex S.A. de C.V.</h1>
        <!-- Ruta correcta de la imagen -->
        <img src="" alt="Skytex S.A. de C.V.">

    </div>
    

    <!-- Título del reporte -->
    <h2>Reporte de Inventario de Telas</h2>

    <!-- Contenido principal: Tabla de inventario -->
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad (m)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($telas as $tela)
                    <tr>
                        <td>{{ $tela->nombre }}</td>
                        <td>{{ $tela->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pie de página -->
    <div class="footer">
        <p>© 2024 Skytex S.A. de C.V. | Todos los derechos reservados</p>
    </div>

</body>
</html>
