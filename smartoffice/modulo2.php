<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento IoT - Smart Office 4.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Smart Office 4.0</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../index.php">Voltar ao Site Principal</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span data-feather="home"></span>
                                Visão Geral
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modulo1.php">
                                <span data-feather="file"></span>
                                Gerenciamento de Projetos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="modulo2.php">
                                <span data-feather="bar-chart-2"></span>
                                Monitoramento IoT
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modulo3.php">
                                <span data-feather="layers"></span>
                                Análise e Insights
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="modulo4.php">
                                <span data-feather="file-text"></span>
                                Relatórios Inteligentes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard de Monitoramento IoT</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="refreshData">Atualizar Dados</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            Esta semana
                        </button>
                    </div>
                </div>

                <!-- Indicadores em tempo real -->
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Consumo de Energia</h5>
                                <h2 class="card-text" id="energyConsumption">4.2 kWh</h2>
                                <p>↓ 12% em relação à média</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Temperatura Média</h5>
                                <h2 class="card-text" id="avgTemperature">23.5°C</h2>
                                <p>Dentro do intervalo ideal</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Ocupação</h5>
                                <h2 class="card-text" id="occupancyRate">68%</h2>
                                <p>↑ 5% em relação à semana anterior</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">Qualidade do Ar</h5>
                                <h2 class="card-text" id="airQuality">Boa</h2>
                                <p>CO2: 650 ppm</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gráficos de monitoramento -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Consumo de Energia (24h)</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="energyChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Temperatura por Sala</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="temperatureChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Ocupação por Hora</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="occupancyChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Qualidade do Ar (CO2 em ppm)</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="airQualityChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mapa de calor da ocupação -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Mapa de Ocupação do Escritório</h5>
                    </div>
                    <div class="card-body">
                        <div class="office-map">
                            <img src="assets/images/office-map.svg" alt="Mapa do Escritório" class="img-fluid">
                            <div class="map-overlay">
                                <!-- Overlay com dados de ocupação seria renderizado via JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alertas e Notificações -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Alertas Recentes</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Tipo</th>
                                    <th>Localização</th>
                                    <th>Mensagem</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2023-09-30 08:45</td>
                                    <td><span class="badge bg-warning">Temperatura</span></td>
                                    <td>Sala de Reuniões 2</td>
                                    <td>Temperatura acima do limite (26.8°C)</td>
                                    <td><span class="badge bg-success">Resolvido</span></td>
                                </tr>
                                <tr>
                                    <td>2023-09-30 10:15</td>
                                    <td><span class="badge bg-danger">Energia</span></td>
                                    <td>Área de TI</td>
                                    <td>Pico de consumo detectado</td>
                                    <td><span class="badge bg-primary">Em análise</span></td>
                                </tr>
                                <tr>
                                    <td>2023-09-29 16:30</td>
                                    <td><span class="badge bg-info">Ocupação</span></td>
                                    <td>Escritório Aberto</td>
                                    <td>Capacidade máxima atingida</td>
                                    <td><span class="badge bg-success">Resolvido</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        // Inicializar ícones Feather
        feather.replace();

        // Dados simulados para os gráficos
        const hours = ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
        
        // Gráfico de Consumo de Energia
        const energyCtx = document.getElementById('energyChart').getContext('2d');
        const energyChart = new Chart(energyCtx, {
            type: 'line',
            data: {
                labels: hours,
                datasets: [{
                    label: 'kWh',
                    data: [2.1, 1.8, 1.5, 1.3, 1.2, 1.4, 2.0, 3.5, 4.8, 5.2, 5.5, 5.3, 5.0, 5.2, 5.4, 5.3, 5.0, 4.5, 3.8, 3.2, 2.8, 2.5, 2.3, 2.0],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.1)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Consumo (kWh)'
                        }
                    }
                }
            }
        });

        // Gráfico de Temperatura por Sala
        const tempCtx = document.getElementById('temperatureChart').getContext('2d');
        const tempChart = new Chart(tempCtx, {
            type: 'bar',
            data: {
                labels: ['Recepção', 'Escritório Aberto', 'Sala 1', 'Sala 2', 'Sala 3', 'Área de TI', 'Cafeteria'],
                datasets: [{
                    label: 'Temperatura (°C)',
                    data: [22.5, 23.1, 22.8, 24.2, 23.5, 21.8, 23.9],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 20,
                        max: 26,
                        title: {
                            display: true,
                            text: 'Temperatura (°C)'
                        }
                    }
                }
            }
        });

        // Gráfico de Ocupação por Hora
        const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
        const occupancyChart = new Chart(occupancyCtx, {
            type: 'line',
            data: {
                labels: hours,
                datasets: [{
                    label: 'Taxa de Ocupação (%)',
                    data: [5, 3, 2, 1, 1, 2, 10, 25, 45, 65, 80, 85, 75, 80, 85, 80, 75, 60, 40, 25, 15, 10, 8, 5],
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.1)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Ocupação (%)'
                        }
                    }
                }
            }
        });

        // Gráfico de Qualidade do Ar
        const airQualityCtx = document.getElementById('airQualityChart').getContext('2d');
        const airQualityChart = new Chart(airQualityCtx, {
            type: 'line',
            data: {
                labels: hours,
                datasets: [{
                    label: 'CO2 (ppm)',
                    data: [450, 430, 420, 410, 400, 410, 450, 500, 600, 700, 750, 780, 750, 780, 800, 780, 750, 700, 650, 600, 550, 500, 480, 460],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.1)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 300,
                        max: 1000,
                        title: {
                            display: true,
                            text: 'CO2 (ppm)'
                        }
                    }
                }
            }
        });

        // Simulação de atualização de dados em tempo real
        document.getElementById('refreshData').addEventListener('click', function() {
            // Atualizar valores dos cards
            document.getElementById('energyConsumption').textContent = (4 + Math.random() * 0.5).toFixed(1) + ' kWh';
            document.getElementById('avgTemperature').textContent = (23 + Math.random()).toFixed(1) + '°C';
            document.getElementById('occupancyRate').textContent = Math.floor(65 + Math.random() * 10) + '%';
            
            // Atualizar dados dos gráficos
            energyChart.data.datasets[0].data = energyChart.data.datasets[0].data.map(value => 
                value * (0.95 + Math.random() * 0.1)
            );
            energyChart.update();
            
            tempChart.data.datasets[0].data = tempChart.data.datasets[0].data.map(value => 
                value * (0.98 + Math.random() * 0.04)
            );
            tempChart.update();
            
            occupancyChart.data.datasets[0].data = occupancyChart.data.datasets[0].data.map(value => 
                Math.min(100, value * (0.95 + Math.random() * 0.1))
            );
            occupancyChart.update();
            
            airQualityChart.data.datasets[0].data = airQualityChart.data.datasets[0].data.map(value => 
                value * (0.98 + Math.random() * 0.04)
            );
            airQualityChart.update();
        });
    </script>
</body>
</html>