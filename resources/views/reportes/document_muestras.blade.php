<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Tipos de Tela</title>
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
            background-color: #237d23; /* Color de encabezado */
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

    </style>
</head>
<body>

    <!-- Contenedor principal -->
    <div class="container">

        <!-- Cabecera con logo a la derecha -->
        <div class="header">
            <h1>Skytex S.A. de C.V.</h1>
            <img src="https://www.skytexmexico.com/wp-content/uploads/2023/05/skytex-logo-8.png" alt="Logo de Skytex">
        </div>

        <!-- Título del reporte -->
        <h2>Reporte de Tipos de Tela</h2>

        <!-- Tabla de tipos de tela -->
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($muestras as $muestra)
                    <tr>
                        <td>{{ $muestra->titulo }}</td>
                        <td>{{ $muestra->descripcion }}</td>
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
