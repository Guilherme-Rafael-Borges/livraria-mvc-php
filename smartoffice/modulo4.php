<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios Inteligentes - Smart Office 4.0</title>
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
                            <a class="nav-link" href="modulo3.php">
                                <span data-feather="layers"></span>
                                Análise e Insights
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="modulo4.php">
                                <span data-feather="file-text"></span>
                                Relatórios Inteligentes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Relatórios Inteligentes com IA</h1>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Relatório de Status do Projeto</h5>
                            </div>
                            <div class="card-body">
                                <p>Gere um relatório detalhado do status atual do projeto Smart Office 4.0, incluindo progresso, métricas-chave e próximos passos.</p>
                                <button id="generateStatusReport" class="btn btn-primary">Gerar Relatório de Status</button>
                                <div class="mt-3" id="statusReportLoading" style="display: none;">
                                    <div class="d-flex align-items-center">
                                        <div class="spinner-border text-primary me-2" role="status">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                        <span>Gerando relatório com IA...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Lições Aprendidas</h5>
                            </div>
                            <div class="card-body">
                                <p>Gere um documento de lições aprendidas com base nos dados do projeto, destacando sucessos, desafios e recomendações para projetos futuros.</p>
                                <button id="generateLessonsLearned" class="btn btn-primary">Gerar Lições Aprendidas</button>
                                <div class="mt-3" id="lessonsLearnedLoading" style="display: none;">
                                    <div class="d-flex align-items-center">
                                        <div class="spinner-border text-primary me-2" role="status">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                        <span>Gerando documento com IA...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Área de exibição do relatório gerado -->
                <div class="card mb-4" id="reportContainer" style="display: none;">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 id="reportTitle">Relatório Gerado</h5>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary me-2" id="downloadReport">
                                <span data-feather="download"></span> Baixar
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" id="printReport">
                                <span data-feather="printer"></span> Imprimir
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="reportContent" class="report-content"></div>
                    </div>
                </div>

                <!-- Histórico de Relatórios -->
                <div class="card">
                    <div class="card-header">
                        <h5>Histórico de Relatórios</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Gerado por</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30/09/2023 14:30</td>
                                    <td>Relatório de Status</td>
                                    <td>Sistema</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary view-report" data-report-id="1">Visualizar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>28/09/2023 10:15</td>
                                    <td>Lições Aprendidas</td>
                                    <td>Sistema</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary view-report" data-report-id="2">Visualizar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>25/09/2023 16:45</td>
                                    <td>Relatório de Status</td>
                                    <td>Sistema</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary view-report" data-report-id="3">Visualizar</button>
                                    </td>
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

        // Relatório de Status
        document.getElementById('generateStatusReport').addEventListener('click', function() {
            // Mostrar loading
            document.getElementById('statusReportLoading').style.display = 'block';
            
            // Simular tempo de processamento da IA
            setTimeout(function() {
                // Esconder loading
                document.getElementById('statusReportLoading').style.display = 'none';
                
                // Mostrar container do relatório
                document.getElementById('reportContainer').style.display = 'block';
                document.getElementById('reportTitle').textContent = 'Relatório de Status do Projeto';
                
                // Conteúdo do relatório gerado pela "IA"
                document.getElementById('reportContent').innerHTML = `
                    <div class="report-header">
                        <h3>Relatório de Status: Projeto Smart Office 4.0</h3>
                        <p class="text-muted">Gerado em 30/09/2023 às 15:45</p>
                    </div>
                    
                    <div class="report-section">
                        <h4>Resumo Executivo</h4>
                        <p>O projeto Smart Office 4.0 encontra-se atualmente com 65% de conclusão, alinhado com o cronograma planejado. As implementações de sensores IoT e sistemas de automação foram concluídas com sucesso, resultando em uma redução mensurável no consumo de energia e melhoria no conforto dos ambientes de trabalho.</p>
                    </div>
                    
                    <div class="report-section">
                        <h4>Progresso por Área</h4>
                        <ul>
                            <li><strong>Infraestrutura IoT:</strong> 85% concluído - Todos os sensores foram instalados e estão operacionais. Resta finalizar a integração com o sistema central.</li>
                            <li><strong>Automação:</strong> 75% concluído - Sistemas de iluminação e temperatura automatizados. Pendente implementação do controle de acesso inteligente.</li>
                            <li><strong>Dashboard:</strong> 60% concluído - Interface principal e visualizações básicas implementadas. Faltam relatórios avançados e análises preditivas.</li>
                            <li><strong>Integração:</strong> 40% concluído - APIs básicas desenvolvidas. Pendente integração com sistemas legados e plataformas externas.</li>
                        </ul>
                    </div>
                    
                    <div class="report-section">
                        <h4>Métricas-Chave</h4>
                        <ul>
                            <li><strong>SPI (Schedule Performance Index):</strong> 0.95 - Ligeiramente atrasado em relação ao cronograma original.</li>
                            <li><strong>CPI (Cost Performance Index):</strong> 1.05 - Abaixo do orçamento planejado, indicando boa gestão financeira.</li>
                            <li><strong>Qualidade:</strong> 98% de aprovação nos testes de aceitação realizados até o momento.</li>
                            <li><strong>Redução de Energia:</strong> 18% de redução no consumo energético desde a implementação dos primeiros sensores.</li>
                        </ul>
                    </div>
                    
                    <div class="report-section">
                        <h4>Riscos Ativos</h4>
                        <p>Foram identificados 4 riscos ativos que estão sendo monitorados:</p>
                        <ol>
                            <li><strong>Atraso na entrega de componentes:</strong> Probabilidade alta, impacto médio. Mitigação: Identificação de fornecedores alternativos.</li>
                            <li><strong>Resistência dos usuários:</strong> Probabilidade média, impacto médio. Mitigação: Programa de treinamento e conscientização em andamento.</li>
                            <li><strong>Falha nos sensores IoT:</strong> Probabilidade média, impacto alto. Mitigação: Sistema de redundância implementado.</li>
                            <li><strong>Problemas de segurança de dados:</strong> Probabilidade baixa, impacto alto. Mitigação: Auditorias de segurança programadas.</li>
                        </ol>
                    </div>
                    
                    <div class="report-section">
                        <h4>Próximos Passos</h4>
                        <ol>
                            <li>Finalizar a integração dos sensores com o sistema central (Prazo: 15/10/2023)</li>
                            <li>Implementar o sistema de controle de acesso inteligente (Prazo: 30/10/2023)</li>
                            <li>Desenvolver os relatórios avançados e análises preditivas (Prazo: 15/11/2023)</li>
                            <li>Realizar testes de integração com sistemas legados (Prazo: 30/11/2023)</li>
                            <li>Conduzir treinamento final com os usuários (Prazo: 15/12/2023)</li>
                        </ol>
                    </div>
                    
                    <div class="report-section">
                        <h4>Conclusão</h4>
                        <p>O projeto Smart Office 4.0 está progredindo de acordo com as expectativas, com resultados preliminares promissores em termos de eficiência energética e automação. Os desafios identificados estão sendo gerenciados adequadamente, e a equipe está comprometida em entregar todas as funcionalidades planejadas dentro do prazo final estabelecido.</p>
                    </div>
                `;
            }, 2000);
        });

        // Lições Aprendidas
        document.getElementById('generateLessonsLearned').addEventListener('click', function() {
            // Mostrar loading
            document.getElementById('lessonsLearnedLoading').style.display = 'block';
            
            // Simular tempo de processamento da IA
            setTimeout(function() {
                // Esconder loading
                document.getElementById('lessonsLearnedLoading').style.display = 'none';
                
                // Mostrar container do relatório
                document.getElementById('reportContainer').style.display = 'block';
                document.getElementById('reportTitle').textContent = 'Lições Aprendidas';
                
                // Conteúdo do relatório gerado pela "IA"
                document.getElementById('reportContent').innerHTML = `
                    <div class="report-header">
                        <h3>Lições Aprendidas: Projeto Smart Office 4.0</h3>
                        <p class="text-muted">Gerado em 30/09/2023 às 15:48</p>
                    </div>
                    
                    <div class="report-section">
                        <h4>Introdução</h4>
                        <p>Este documento apresenta as principais lições aprendidas durante a implementação do projeto Smart Office 4.0, destacando os sucessos, desafios enfrentados e recomendações para projetos futuros de natureza similar.</p>
                    </div>
                    
                    <div class="report-section">
                        <h4>Sucessos</h4>
                        <ol>
                            <li><strong>Abordagem Ágil:</strong> A metodologia ágil adotada permitiu adaptações rápidas às mudanças de requisitos e feedback contínuo dos stakeholders, resultando em um produto mais alinhado às necessidades reais.</li>
                            <li><strong>Prototipagem Rápida:</strong> A criação de protótipos funcionais desde as fases iniciais facilitou a validação de conceitos e reduziu retrabalhos em fases posteriores.</li>
                            <li><strong>Integração IoT:</strong> A escolha de uma arquitetura modular para os sensores IoT permitiu escalabilidade e facilidade de manutenção, além de possibilitar a adição de novos tipos de sensores sem grandes modificações no sistema.</li>
                            <li><strong>Análise de Dados:</strong> A implementação de dashboards analíticos proporcionou insights valiosos que não estavam inicialmente planejados, agregando valor adicional ao projeto.</li>
                        </ol>
                    </div>
                    
                    <div class="report-section">
                        <h4>Desafios</h4>
                        <ol>
                            <li><strong>Integração com Sistemas Legados:</strong> A compatibilidade com sistemas existentes foi mais complexa do que o previsto, exigindo desenvolvimento de adaptadores personalizados.</li>
                            <li><strong>Confiabilidade dos Sensores:</strong> Alguns sensores apresentaram falhas intermitentes, necessitando substituição e implementação de sistemas de redundância não previstos inicialmente.</li>
                            <li><strong>Resistência à Mudança:</strong> Houve resistência inicial dos usuários em adotar as novas tecnologias, especialmente os sistemas automatizados de controle ambiental.</li>
                            <li><strong>Segurança de Dados:</strong> As preocupações com privacidade e segurança exigiram revisões adicionais na arquitetura e implementação de medidas de proteção mais robustas.</li>
                        </ol>
                    </div>
                    
                    <div class="report-section">
                        <h4>Recomendações para Projetos Futuros</h4>
                        <ol>
                            <li><strong>Análise Aprofundada de Sistemas Legados:</strong> Realizar uma análise mais detalhada dos sistemas existentes antes de iniciar o desenvolvimento, documentando todas as interfaces e dependências.</li>
                            <li><strong>Testes Extensivos de Hardware:</strong> Implementar um período mais longo de testes para componentes de hardware em condições reais de uso antes da implantação em larga escala.</li>
                            <li><strong>Programa de Gestão de Mudanças:</strong> Desenvolver um programa estruturado de gestão de mudanças desde o início do projeto, incluindo treinamentos e demonstrações práticas dos benefícios.</li>
                            <li><strong>Arquitetura de Segurança:</strong> Incorporar requisitos de segurança e privacidade desde a fase de design, seguindo o princípio de "security by design".</li>
                            <li><strong>Documentação Contínua:</strong> Manter documentação atualizada ao longo de todo o projeto, especialmente para decisões arquiteturais e configurações de integração.</li>
                        </ol>
                    </div>
                    
                    <div class="report-section">
                        <h4>Métricas e Resultados</h4>
                        <ul>
                            <li><strong>Redução de Custos Operacionais:</strong> 22% de redução nos custos de energia após 6 meses de implementação.</li>
                            <li><strong>Satisfação dos Usuários:</strong> Aumento de 65% para 82% na satisfação com o ambiente de trabalho após período de adaptação.</li>
                            <li><strong>Produtividade:</strong> Aumento estimado de 12% na produtividade devido à otimização das condições ambientais.</li>
                            <li><strong>ROI:</strong> Retorno sobre investimento projetado em 18 meses, mais rápido que os 24 meses inicialmente estimados.</li>
                        </ul>
                    </div>
                    
                    <div class="report-section">
                        <h4>Conclusão</h4>
                        <p>O projeto Smart Office 4.0 demonstrou o potencial transformador da integração de tecnologias IoT e análise de dados no ambiente corporativo. Apesar dos desafios enfrentados, os resultados alcançados superaram as expectativas iniciais em termos de eficiência energética e satisfação dos usuários. As lições aprendidas neste projeto serão valiosas para futuras iniciativas de transformação digital e automação de ambientes.</p>
                    </div>
                `;
            }, 2000);
        });

        // Visualizar relatório do histórico
        document.querySelectorAll('.view-report').forEach(button => {
            button.addEventListener('click', function() {
                const reportId = this.getAttribute('data-report-id');
                
                // Mostrar container do relatório
                document.getElementById('reportContainer').style.display = 'block';
                
                // Conteúdo baseado no ID do relatório (simplificado para demonstração)
                if (reportId === '1') {
                    document.getElementById('reportTitle').textContent = 'Relatório de Status do Projeto (30/09/2023)';
                    // Conteúdo similar ao gerado pelo botão "Gerar Relatório de Status"
                    document.getElementById('reportContent').innerHTML = `<p>Conteúdo do relatório de status gerado em 30/09/2023...</p>`;
                } else if (reportId === '2') {
                    document.getElementById('reportTitle').textContent = 'Lições Aprendidas (28/09/2023)';
                    document.getElementById('reportContent').innerHTML = `<p>Conteúdo do relatório de lições aprendidas gerado em 28/09/2023...</p>`;
                } else {
                    document.getElementById('reportTitle').textContent = 'Relatório de Status do Projeto (25/09/2023)';
                    document.getElementById('reportContent').innerHTML = `<p>Conteúdo do relatório de status gerado em 25/09/2023...</p>`;
                }
            });
        });

        // Botões de download e impressão
        document.getElementById('downloadReport').addEventListener('click', function() {
            alert('Funcionalidade de download simulada: o relatório seria baixado como PDF.');
        });

        document.getElementById('printReport').addEventListener('click', function() {
            window.print();
        });
    </script>
    <style>
        .report-content {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .report-header {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        .report-section {
            margin-bottom: 20px;
        }
        .report-section h4 {
            color: #0d6efd;
            margin-bottom: 10px;
        }
        @media print {
            header, nav, .btn, .card-header {
                display: none !important;
            }
            .card {
                border: none !important;
            }
            .card-body {
                padding: 0 !important;
            }
            body {
                padding: 0;
                margin: 0;
            }
        }
    </style>
</body>
</html>