<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise e Insights - Smart Office 4.0</title>
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
                            <a class="nav-link" href="modulo2.php">
                                <span data-feather="bar-chart-2"></span>
                                Monitoramento IoT
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="modulo3.php">
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
                    <h1 class="h2">Análise e Insights</h1>
                </div>

                <!-- Correlação entre Entregas e Métricas IoT -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Correlação entre Entregas de Projeto e Métricas IoT</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="correlationChart" height="300"></canvas>
                        <div class="mt-4">
                            <h6>Insights Principais:</h6>
                            <ul>
                                <li>A instalação de sensores de luz automáticos (Sprint 2) resultou em uma redução de 18% no consumo de energia.</li>
                                <li>A implementação do sistema de controle de temperatura (Sprint 3) melhorou o conforto térmico em 22%.</li>
                                <li>O sistema de monitoramento de ocupação (Sprint 4) otimizou o uso do espaço em 15%.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- ROI por Funcionalidade -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>ROI por Funcionalidade</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="roiChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Tendências de Uso -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Tendências de Uso</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="usageTrendsChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Análise Preditiva -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Análise Preditiva</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="predictiveChart" height="250"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h6>Previsões para os Próximos 3 Meses:</h6>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Métrica</th>
                                            <th>Atual</th>
                                            <th>Previsão</th>
                                            <th>Variação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Consumo de Energia</td>
                                            <td>4.2 kWh</td>
                                            <td>3.5 kWh</td>
                                            <td class="text-success">-16.7%</td>
                                        </tr>
                                        <tr>
                                            <td>Eficiência Operacional</td>
                                            <td>72%</td>
                                            <td>85%</td>
                                            <td class="text-success">+18.1%</td>
                                        </tr>
                                        <tr>
                                            <td>Satisfação dos Funcionários</td>
                                            <td>78%</td>
                                            <td>89%</td>
                                            <td class="text-success">+14.1%</td>
                                        </tr>
                                        <tr>
                                            <td>Custos Operacionais</td>
                                            <td>R$ 12.500</td>
                                            <td>R$ 10.800</td>
                                            <td class="text-success">-13.6%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Storytelling -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Data Storytelling</h5>
                    </div>
                    <div class="card-body">
                        <div class="story-timeline">
                            <div class="story-item">
                                <div class="story-point">
                                    <span class="badge rounded-pill bg-primary">Início</span>
                                </div>
                                <div class="story-content">
                                    <h6>Desafio Inicial</h6>
                                    <p>O escritório enfrentava altos custos operacionais e baixa eficiência energética, com um consumo médio de 6.8 kWh e desperdício significativo de recursos.</p>
                                </div>
                            </div>
                            <div class="story-item">
                                <div class="story-point">
                                    <span class="badge rounded-pill bg-info">Fase 1</span>
                                </div>
                                <div class="story-content">
                                    <h6>Implementação de Sensores</h6>
                                    <p>A instalação de sensores IoT permitiu monitorar em tempo real o consumo de energia, temperatura e ocupação, criando uma base de dados para análise.</p>
                                </div>
                            </div>
                            <div class="story-item">
                                <div class="story-point">
                                    <span class="badge rounded-pill bg-warning">Fase 2</span>
                                </div>
                                <div class="story-content">
                                    <h6>Automação Inteligente</h6>
                                    <p>Sistemas automatizados foram implementados para controlar iluminação, temperatura e ventilação com base nos dados coletados, reduzindo o consumo em 25%.</p>
                                </div>
                            </div>
                            <div class="story-item">
                                <div class="story-point">
                                    <span class="badge rounded-pill bg-success">Resultado</span>
                                </div>
                                <div class="story-content">
                                    <h6>Transformação Digital</h6>
                                    <p>O escritório agora opera com maior eficiência, menor custo e melhor conforto para os funcionários, com ROI de 215% no primeiro ano.</p>
                                </div>
                            </div>
                        </div>
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

        // Gráfico de Correlação
        const correlationCtx = document.getElementById('correlationChart').getContext('2d');
        const correlationChart = new Chart(correlationCtx, {
            type: 'line',
            data: {
                labels: ['Sprint 1', 'Sprint 2', 'Sprint 3', 'Sprint 4', 'Sprint 5', 'Sprint 6'],
                datasets: [
                    {
                        label: 'Consumo de Energia (kWh)',
                        data: [6.8, 5.5, 4.8, 4.5, 4.2, 4.0],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.1)',
                        yAxisID: 'y',
                        fill: true
                    },
                    {
                        label: 'Conforto Térmico (%)',
                        data: [65, 68, 75, 82, 85, 88],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.1)',
                        yAxisID: 'y1',
                        fill: true
                    },
                    {
                        label: 'Otimização de Espaço (%)',
                        data: [60, 62, 65, 75, 82, 85],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.1)',
                        yAxisID: 'y1',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Consumo (kWh)'
                        },
                        min: 3,
                        max: 7
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        title: {
                            display: true,
                            text: 'Percentual (%)'
                        },
                        min: 50,
                        max: 100,
                        grid: {
                            drawOnChartArea: false,
                        },
                    },
                }
            }
        });

        // Gráfico de ROI
        const roiCtx = document.getElementById('roiChart').getContext('2d');
        const roiChart = new Chart(roiCtx, {
            type: 'bar',
            data: {
                labels: ['Sensores de Luz', 'Controle de Temperatura', 'Monitoramento de Ocupação', 'Qualidade do Ar', 'Sistema Integrado'],
                datasets: [{
                    label: 'ROI (%)',
                    data: [180, 150, 210, 120, 250],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'ROI (%)'
                        }
                    }
                }
            }
        });

        // Gráfico de Tendências de Uso
        const usageTrendsCtx = document.getElementById('usageTrendsChart').getContext('2d');
        const usageTrendsChart = new Chart(usageTrendsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [
                    {
                        label: 'Uso de Salas de Reunião',
                        data: [65, 70, 75, 72, 78, 82],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        tension: 0.1
                    },
                    {
                        label: 'Uso de Espaços Colaborativos',
                        data: [45, 52, 60, 65, 72, 80],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        tension: 0.1
                    },
                    {
                        label: 'Uso de Estações Individuais',
                        data: [85, 82, 78, 75, 70, 65],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        tension: 0.1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Utilização (%)'
                        }
                    }
                }
            }
        });

        // Gráfico de Análise Preditiva
        const predictiveCtx = document.getElementById('predictiveChart').getContext('2d');
        const predictiveChart = new Chart(predictiveCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set'],
                datasets: [
                    {
                        label: 'Dados Históricos',
                        data: [6.5, 6.2, 5.8, 5.5, 5.0, 4.5, 4.2, null, null],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.1)',
                        fill: true
                    },
                    {
                        label: 'Previsão',
                        data: [null, null, null, null, null, 4.5, 4.2, 3.8, 3.5],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.1)',
                        borderDash: [5, 5],
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                        title: {
                            display: true,
                            text: 'Consumo de Energia (kWh)'
                        }
                    }
                }
            }
        });

        // Estilo para o Data Storytelling
        document.addEventListener('DOMContentLoaded', function() {
            const storyItems = document.querySelectorAll('.story-item');
            storyItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('active');
                }, index * 500);
            });
        });
    </script>
    <style>
        .story-timeline {
            position: relative;
            padding: 20px 0;
        }
        .story-timeline:before {
            content: '';
            position: absolute;
            top: 0;
            left: 15px;
            height: 100%;
            width: 4px;
            background: #e9ecef;
        }
        .story-item {
            position: relative;
            margin-bottom: 30px;
            padding-left: 40px;
            opacity: 0.7;
            transition: opacity 0.5s ease;
        }
        .story-item.active {
            opacity: 1;
        }
        .story-point {
            position: absolute;
            left: 0;
            top: 0;
        }
        .story-content {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</body>
</html>