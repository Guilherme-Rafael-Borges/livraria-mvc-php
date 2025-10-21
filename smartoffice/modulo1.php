<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Projetos - Smart Office 4.0</title>
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
                            <a class="nav-link active" aria-current="page" href="modulo1.php">
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
                    <h1 class="h2">Dashboard de Gerenciamento de Projetos</h1>
                </div>

                <!-- Product Backlog -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Product Backlog - User Stories</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Story</th>
                                    <th>Prioridade</th>
                                    <th>Status</th>
                                    <th>Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>US-01</td>
                                    <td>Como administrador, quero visualizar o consumo de energia em tempo real para monitorar gastos</td>
                                    <td><span class="badge bg-danger">Alta</span></td>
                                    <td><span class="badge bg-success">Concluído</span></td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td>US-02</td>
                                    <td>Como gerente, quero receber alertas quando a temperatura estiver fora do intervalo ideal</td>
                                    <td><span class="badge bg-danger">Alta</span></td>
                                    <td><span class="badge bg-success">Concluído</span></td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>US-03</td>
                                    <td>Como usuário, quero verificar a ocupação das salas para agendar reuniões</td>
                                    <td><span class="badge bg-warning">Média</span></td>
                                    <td><span class="badge bg-primary">Em Progresso</span></td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>US-04</td>
                                    <td>Como administrador, quero gerar relatórios de uso dos recursos para otimizar custos</td>
                                    <td><span class="badge bg-warning">Média</span></td>
                                    <td><span class="badge bg-primary">Em Progresso</span></td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td>US-05</td>
                                    <td>Como gerente, quero visualizar métricas de produtividade baseadas em ocupação</td>
                                    <td><span class="badge bg-info">Baixa</span></td>
                                    <td><span class="badge bg-secondary">Pendente</span></td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <!-- Burndown Chart -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Gráfico de Burndown</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="burndownChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- KPIs -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Indicadores de Desempenho (KPIs)</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h6>Velocity da Equipe</h6>
                                                <h2>21</h2>
                                                <p class="text-success">↑ 15% em relação ao sprint anterior</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h6>CPI (Cost Performance Index)</h6>
                                                <h2>1.05</h2>
                                                <p class="text-success">Abaixo do orçamento</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h6>SPI (Schedule Performance Index)</h6>
                                                <h2>0.95</h2>
                                                <p class="text-warning">Ligeiramente atrasado</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h6>Qualidade do Código</h6>
                                                <h2>A</h2>
                                                <p class="text-success">98% de cobertura de testes</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Risk Management -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Gestão de Riscos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Risco</th>
                                    <th>Probabilidade</th>
                                    <th>Impacto</th>
                                    <th>Estratégia de Mitigação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>R-01</td>
                                    <td>Falha nos sensores IoT</td>
                                    <td><span class="badge bg-warning">Média</span></td>
                                    <td><span class="badge bg-danger">Alto</span></td>
                                    <td>Implementar sistema de redundância e monitoramento contínuo</td>
                                </tr>
                                <tr>
                                    <td>R-02</td>
                                    <td>Atraso na entrega de componentes</td>
                                    <td><span class="badge bg-danger">Alta</span></td>
                                    <td><span class="badge bg-warning">Médio</span></td>
                                    <td>Identificar fornecedores alternativos e manter estoque de segurança</td>
                                </tr>
                                <tr>
                                    <td>R-03</td>
                                    <td>Problemas de segurança de dados</td>
                                    <td><span class="badge bg-info">Baixa</span></td>
                                    <td><span class="badge bg-danger">Alto</span></td>
                                    <td>Implementar criptografia e auditorias regulares de segurança</td>
                                </tr>
                                <tr>
                                    <td>R-04</td>
                                    <td>Resistência dos usuários à adoção</td>
                                    <td><span class="badge bg-warning">Média</span></td>
                                    <td><span class="badge bg-warning">Médio</span></td>
                                    <td>Realizar treinamentos e demonstrar benefícios tangíveis</td>
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

        // Gráfico de Burndown
        const burndownCtx = document.getElementById('burndownChart').getContext('2d');
        const burndownChart = new Chart(burndownCtx, {
            type: 'line',
            data: {
                labels: ['Dia 1', 'Dia 2', 'Dia 3', 'Dia 4', 'Dia 5', 'Dia 6', 'Dia 7', 'Dia 8', 'Dia 9', 'Dia 10'],
                datasets: [
                    {
                        label: 'Pontos Restantes (Ideal)',
                        data: [39, 35, 31, 27, 23, 19, 15, 11, 7, 0],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderDash: [5, 5],
                        fill: false
                    },
                    {
                        label: 'Pontos Restantes (Real)',
                        data: [39, 37, 33, 30, 27, 25, 22, 18, 13, 8],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pontos Restantes'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Dias do Sprint'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>