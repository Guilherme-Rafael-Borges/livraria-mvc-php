<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['admin'] != 1) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento de Projetos - Smart Office 4.0</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/admin.css">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Fallback para Chart.js
    if (typeof Chart === 'undefined') {
      document.write('<script src="../assets/js/chart.min.js"><\/script>');
    }
  </script>
  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',
            'primary-hover': '#4338CA',
            secondary: '#0EA5E9',
            'secondary-hover': '#0284C7',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans min-h-screen">
  <!-- Sidebar -->
  <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex items-center justify-center h-16 bg-primary">
      <h1 class="text-white text-xl font-bold">Admin Panel</h1>
    </div>
    
    <nav class="mt-8">
      <div class="px-4 space-y-2">
        <a href="index.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-home mr-3"></i>
          Dashboard
        </a>
        <a href="books.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-book mr-3"></i>
          Livros
        </a>
        <a href="authors.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-user-edit mr-3"></i>
          Autores
        </a>
        <a href="purchases.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-shopping-cart mr-3"></i>
          Compras
        </a>
        <!-- Smart Office 4.0 Menu -->
        <div class="pt-2 pb-2">
          <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider px-4">Smart Office 4.0</h3>
        </div>
        <a href="smartoffice.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-th-large mr-3"></i>
          Visão Geral
        </a>
        <a href="smartoffice_projeto.php" class="flex items-center px-4 py-3 bg-primary text-white rounded-lg">
          <i class="fas fa-tasks mr-3"></i>
          Gerenciamento de Projetos
        </a>
        <a href="smartoffice_iot.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-chart-bar mr-3"></i>
          Monitoramento IoT
        </a>
        <a href="smartoffice_analise.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-chart-line mr-3"></i>
          Análise e Insights
        </a>
        <a href="smartoffice_relatorios.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-file-alt mr-3"></i>
          Relatórios Inteligentes
        </a>
        <!-- Links originais -->
        <div class="pt-2 pb-2">
          <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider px-4">Sistema</h3>
        </div>
        <a href="../index.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-external-link-alt mr-3"></i>
          Ver Site
        </a>
        <a href="../logout.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-red-500 hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-sign-out-alt mr-3"></i>
          Logout
        </a>
      </div>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="lg:ml-64">
    <!-- Top Header -->
    <div class="bg-white shadow-sm border-b border-gray-200">
      <div class="px-6 py-4">
        <div class="flex items-center justify-between">
          <div>
            <h1 class="text-2xl font-bold text-gray-800">Gerenciamento de Projetos</h1>
            <p class="text-gray-600">Acompanhe e gerencie todos os projetos da empresa</p>
          </div>
          <div class="flex items-center space-x-4">
            <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
              <i class="fas fa-bars text-gray-600"></i>
            </button>
            <a href="../index.php" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-hover transition-colors duration-300">
              <i class="fas fa-external-link-alt mr-2"></i>
              Ver Site
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Area -->
    <div class="p-6">
      <!-- AI Analysis Section -->
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-semibold text-gray-800 flex items-center">
            <i class="fas fa-robot mr-3 text-primary"></i>
            Análise de IA - Gerenciamento de Projetos
          </h2>
          <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atualizado hoje</span>
        </div>
        <div class="p-4 bg-gray-50 rounded-xl mb-4">
          <p class="text-gray-700"><span class="font-semibold">Resumo:</span> Nossa IA analisou o desempenho de 12 projetos ativos e identificou oportunidades para reduzir prazos em 18%. O algoritmo de otimização de recursos sugere realocações que podem aumentar a produtividade da equipe em 22%.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Recomendações de IA</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Redistribuir recursos do projeto "Aplicativo Mobile" para acelerar entregas críticas</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Antecipar reuniões de revisão do projeto "Redesenho do Site" para evitar atrasos</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Implementar metodologia ágil no projeto "Análise de Mercado" para melhorar resultados</span>
              </li>
            </ul>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Previsões de Projetos</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Projeto "Aplicativo Mobile" tem 68% de chance de atraso se não houver intervenção</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Potencial economia de 35% em custos com implementação de automação em tarefas repetitivas</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Previsão de sucesso de 92% para o projeto "Redesenho do Site" com ajustes recomendados</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Project Overview -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Projetos Ativos</h3>
            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">12 Projetos</span>
          </div>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mr-4">
              <i class="fas fa-project-diagram text-green-600 text-xl"></i>
            </div>
            <div>
              <p class="text-3xl font-bold text-gray-800">12</p>
              <p class="text-sm text-gray-500">Em andamento</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Tarefas Pendentes</h3>
            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">28 Tarefas</span>
          </div>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mr-4">
              <i class="fas fa-tasks text-yellow-600 text-xl"></i>
            </div>
            <div>
              <p class="text-3xl font-bold text-gray-800">28</p>
              <p class="text-sm text-gray-500">Aguardando conclusão</p>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Projetos Concluídos</h3>
            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">45 Projetos</span>
          </div>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
              <i class="fas fa-check-circle text-blue-600 text-xl"></i>
            </div>
            <div>
              <p class="text-3xl font-bold text-gray-800">45</p>
              <p class="text-sm text-gray-500">Finalizados com sucesso</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Timeline -->
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 mb-6">
        <div class="p-6 border-b border-gray-200">
          <h2 class="text-xl font-semibold text-gray-800 flex items-center">
            <i class="fas fa-calendar-alt mr-3 text-primary"></i>
            Cronograma de Projetos
          </h2>
        </div>
        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projeto</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Responsável</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Início</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prazo</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progresso</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-md flex items-center justify-center">
                        <i class="fas fa-laptop-code text-indigo-600"></i>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Redesenho do Site</div>
                        <div class="text-sm text-gray-500">Departamento de Marketing</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Ana Silva</div>
                    <div class="text-sm text-gray-500">Designer UX</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">10/05/2023</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">30/06/2023</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Em andamento
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                      <div class="bg-green-600 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                    <span class="text-xs text-gray-500">75%</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-md flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-blue-600"></i>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Aplicativo Mobile</div>
                        <div class="text-sm text-gray-500">Departamento de TI</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Carlos Mendes</div>
                    <div class="text-sm text-gray-500">Desenvolvedor Mobile</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">01/04/2023</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">15/07/2023</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      Em atraso
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                      <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                    <span class="text-xs text-gray-500">45%</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-md flex items-center justify-center">
                        <i class="fas fa-chart-pie text-purple-600"></i>
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Análise de Mercado</div>
                        <div class="text-sm text-gray-500">Departamento Comercial</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Juliana Costa</div>
                    <div class="text-sm text-gray-500">Analista de Mercado</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">15/05/2023</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">15/06/2023</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      Concluído
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                      <div class="bg-blue-600 h-2.5 rounded-full" style="width: 100%"></div>
                    </div>
                    <span class="text-xs text-gray-500">100%</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Project Tasks -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
          <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
              <i class="fas fa-tasks mr-3 text-primary"></i>
              Tarefas Recentes
            </h2>
          </div>
          <div class="p-6">
            <ul class="divide-y divide-gray-200">
              <li class="py-3">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Finalizar protótipo da página inicial</p>
                      <p class="text-xs text-gray-500">Projeto: Redesenho do Site</p>
                    </div>
                  </div>
                  <span class="text-xs text-gray-500">Hoje</span>
                </div>
              </li>
              <li class="py-3">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Implementar autenticação no app</p>
                      <p class="text-xs text-gray-500">Projeto: Aplicativo Mobile</p>
                    </div>
                  </div>
                  <span class="text-xs text-gray-500">Amanhã</span>
                </div>
              </li>
              <li class="py-3">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900 line-through">Preparar relatório de análise</p>
                      <p class="text-xs text-gray-500">Projeto: Análise de Mercado</p>
                    </div>
                  </div>
                  <span class="text-xs text-gray-500">Ontem</span>
                </div>
              </li>
              <li class="py-3">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Reunião com stakeholders</p>
                      <p class="text-xs text-gray-500">Projeto: Redesenho do Site</p>
                    </div>
                  </div>
                  <span class="text-xs text-gray-500">Em 2 dias</span>
                </div>
              </li>
              <li class="py-3">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Testar funcionalidades do app</p>
                      <p class="text-xs text-gray-500">Projeto: Aplicativo Mobile</p>
                    </div>
                  </div>
                  <span class="text-xs text-gray-500">Em 3 dias</span>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
          <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
              <i class="fas fa-chart-pie mr-3 text-primary"></i>
              Distribuição de Projetos
            </h2>
          </div>
          <div class="p-6">
            <canvas id="projectDistribution" height="250"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Toggle Sidebar
    function toggleSidebar() {
      const sidebar = document.querySelector('.fixed');
      sidebar.classList.toggle('-translate-x-full');
    }

    // Project Distribution Chart
    document.addEventListener('DOMContentLoaded', function() {
      const ctx = document.getElementById('projectDistribution').getContext('2d');
      const projectDistribution = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Marketing', 'TI', 'Comercial', 'Operações', 'RH'],
          datasets: [{
            data: [12, 8, 6, 5, 3],
            backgroundColor: [
              '#4F46E5',
              '#0EA5E9',
              '#10B981',
              '#F59E0B',
              '#EF4444'
            ],
            borderWidth: 0
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                padding: 20,
                boxWidth: 12
              }
            },
            tooltip: {
              displayColors: false,
              callbacks: {
                label: function(context) {
                  return context.label + ': ' + context.raw + ' projetos';
                }
              }
            }
          },
          cutout: '70%'
        }
      });
    });
  </script>
</body>
</html>