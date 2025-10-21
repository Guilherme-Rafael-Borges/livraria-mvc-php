<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Office 4.0 - Dashboard</title>
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
                            <a class="nav-link active" aria-current="page" href="index.php">
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
                    <h1 class="h2">Dashboard Smart Office 4.0</h1>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Status do Projeto</h5>
                            </div>
                            <div class="card-body">
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                </div>
                                <p>Progresso geral do projeto Smart Office 4.0</p>
                                <a href="modulo1.php" class="btn btn-primary">Ver detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Monitoramento IoT</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="iotOverviewChart"></canvas>
                                <a href="modulo2.php" class="btn btn-primary mt-3">Ver detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Análise e Insights</h5>
                            </div>
                            <div class="card-body">
                                <p>Correlação entre implementação de funcionalidades e métricas IoT</p>
                                <div id="correlationChart" style="height: 200px;"></div>
                                <a href="modulo3.php" class="btn btn-primary mt-3">Ver detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Relatórios Inteligentes</h5>
                            </div>
                            <div class="card-body">
                                <p>Gere relatórios automatizados com IA para comunicar o status do projeto</p>
                                <a href="modulo4.php" class="btn btn-primary">Gerar Relatório de Status</a>
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
    <script src="assets/js/dashboard.js"></script>
</body>
</html>