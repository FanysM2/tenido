@extends('layouts.admin')

@section('contenido')

<style>
    /* Estilo global de la página */
    body {
        background-color: #f4f7fa; /* Fondo gris claro */
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    /* Contenedor principal */
    .container {
        max-width: 900px;
        margin: 50px auto;
        background: #d9dadb;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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

    /* Titulo principal */
    h1 {
        text-align: center;
        color: #1c3d5e; /* Verde fuerte */
        margin-bottom: 40px;
        font-size: 36px;
        font-weight: bold;
    }

    /* Titulo de los gráficos */
    .chart-title {
        text-align: center;
        font-size: 20px;
        margin-top: 20px;
        color: #1c3d5e; /* Azul marino */
    }

    /* Botones */
    .btn {
        padding: 12px 18px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        margin: 15px 5px;
        transition: all 0.3s ease;
    }

    /* Botón primario (Generar reporte) */
    .btn-primary {
        background-color: #2b9e2a; /* Verde fuerte */
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #237d23; /* Verde más oscuro */
        transform: scale(1.05); /* Efecto de ampliación */
    }

    /* Botón secundario (Volver al índice) */
    .btn-secondary {
        background-color: #1c3d5e; /* Azul marino */
        color: #fff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #153a54; /* Azul más oscuro */
        transform: scale(1.05);
    }

    /* Estilo de los gráficos */
    canvas {
        border: 1px solid #1f1d94;
        border-radius: 8px;
        background-color: #ffffff; /* Fondo blanco para las gráficas */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

</style>

<div class="container">

    <!-- Título principal -->
    <h1>Dashboard de Inventario de Telas</h1>

    <!-- Mostrar el botón solo si el usuario es admin -->
    @if(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('telas.create') }}" class="btn btn-secondary">Agregar Nueva Tela al Inventario</a>
        <a href="{{ route('telas.index') }}" class="btn btn-secondary">Regresar</a>
    @endif

    <!-- Botón para generar reporte -->
    <div class="text-center mb-4">
        <a href="{{ route('reporte.telas') }}" class="btn btn-primary">Generar Reporte PDF</a>
    </div>

    <!-- Gráfico de Barras -->
    <canvas id="telaChart" width="400" height="200"></canvas>
    <div class="chart-title">Cantidad de Tela (m)</div>

    <!-- Gráfico de Pastel -->
    <canvas id="telaPieChart" width="400" height="200" style="margin-top: 30px;"></canvas>
    <div class="chart-title">Distribución de Tela por Tipo</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de Barras
        var ctxBar = document.getElementById('telaChart').getContext('2d');
        var telaChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Cantidad de Tela (m)',
                    data: @json($cantidades),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',  // Mantener los colores originales de los gráficos
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Pastel
        var ctxPie = document.getElementById('telaPieChart').getContext('2d');
        var telaPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Distribución de Tela',
                    data: @json($cantidades),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',  // Rojo claro
                        'rgba(54, 162, 235, 0.5)',  // Azul claro
                        'rgba(255, 206, 86, 0.5)',  // Amarillo claro
                        'rgba(75, 192, 192, 0.5)',  // Verde claro
                        'rgba(153, 102, 255, 0.5)', // Púrpura
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',  // Rojo
                        'rgba(54, 162, 235, 1)',  // Azul
                        'rgba(255, 206, 86, 1)',  // Amarillo
                        'rgba(75, 192, 192, 1)',  // Verde
                        'rgba(153, 102, 255, 1)', // Púrpura
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribución de Tela por Tipo'
                    }
                }
            }
        });
    </script>
</div>

@endsection
