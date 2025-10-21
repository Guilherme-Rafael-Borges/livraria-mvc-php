<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['admin'] != 1) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Análise e Insights - Smart Office 4.0</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../assets/css/custom.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#00A9A5',
            'primary-hover': '#007E79',
            'primary-light': '#ffffff',
            'text-color': '#333333',
            'background-color': '#f8f9fa',
            'cart-red': '#FF3D57'
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
        <a href="smartoffice_projeto.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-tasks mr-3"></i>
          Gerenciamento de Projetos
        </a>
        <a href="smartoffice_iot.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-chart-bar mr-3"></i>
          Monitoramento IoT
        </a>
        <a href="smartoffice_analise.php" class="flex items-center px-4 py-3 bg-primary text-white rounded-lg">
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
            <button class="lg:hidden text-gray-600 focus:outline-none" id="sidebarToggle">
              <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-2xl font-bold text-gray-800 ml-2 lg:ml-0">Análise e Insights</h1>
          </div>
          <div class="flex items-center">
            <div class="relative">
              <span class="text-gray-600"><?php echo $_SESSION['email']; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Dashboard Content -->
    <div class="p-6">
      <!-- AI Analysis Section -->
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-semibold text-gray-800 flex items-center">
            <i class="fas fa-robot mr-3 text-primary"></i>
            Análise de IA - Insights Avançados
          </h2>
          <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atualizado hoje</span>
        </div>
        <div class="p-4 bg-gray-50 rounded-xl mb-4">
          <p class="text-gray-700"><span class="font-semibold">Resumo:</span> Nossa IA identificou 3 padrões significativos nos dados operacionais que sugerem oportunidades de otimização. Análise preditiva indica potencial economia de 12% em custos operacionais com ajustes recomendados.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Insights Detectados</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-chart-line text-blue-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Correlação entre temperatura ambiente e produtividade (confiança: 87%)</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-chart-line text-blue-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Padrão de subutilização de espaços colaborativos às segundas-feiras</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-chart-line text-blue-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Tendência de aumento no consumo energético desproporcional à ocupação</span>
              </li>
            </ul>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Recomendações Baseadas em Dados</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Ajustar temperatura para 22°C (±1°C) para otimizar conforto e produtividade</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Reorganizar agenda de reuniões para maximizar uso de espaços colaborativos</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Implementar desligamento automático de sistemas em áreas não ocupadas</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Analysis Overview -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Correlação Positiva</p>
              <h3 class="text-2xl font-bold text-gray-800">Produtividade x Temperatura</h3>
              <p class="text-xs text-indigo-500 mt-1">
                <i class="fas fa-arrow-up mr-1"></i>
                Coeficiente: 0.78
              </p>
            </div>
            <div class="bg-indigo-100 p-3 rounded-full">
              <i class="fas fa-chart-line text-indigo-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-teal-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">ROI Médio</p>
              <h3 class="text-2xl font-bold text-gray-800">185%</h3>
              <p class="text-xs text-teal-500 mt-1">
                <i class="fas fa-arrow-up mr-1"></i>
                15% acima do esperado
              </p>
            </div>
            <div class="bg-teal-100 p-3 rounded-full">
              <i class="fas fa-percentage text-teal-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-pink-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Previsão de Economia</p>
              <h3 class="text-2xl font-bold text-gray-800">R$ 45.000</h3>
              <p class="text-xs text-pink-500 mt-1">
                <i class="fas fa-calendar-alt mr-1"></i>
                Próximos 12 meses
              </p>
            </div>
            <div class="bg-pink-100 p-3 rounded-full">
              <i class="fas fa-piggy-bank text-pink-500"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Correlation Analysis -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="bg-primary px-6 py-4 flex justify-between items-center">
          <h3 class="text-white font-semibold">Correlação entre Entregas de Projetos e Métricas IoT</h3>
          <div>
            <select class="bg-white text-primary px-3 py-1 rounded text-sm font-medium">
              <option>Últimos 30 dias</option>
              <option>Últimos 90 dias</option>
              <option>Último ano</option>
            </select>
          </div>
        </div>
        <div class="p-6">
          <div class="h-80">
            <canvas id="correlationChart"></canvas>
          </div>
        </div>
      </div>

      <!-- ROI and Trends -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- ROI by Functionality -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">ROI por Funcionalidade</h3>
          </div>
          <div class="p-6">
            <div class="h-64">
              <canvas id="roiChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Usage Trends -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Tendências de Uso</h3>
          </div>
          <div class="p-6">
            <div class="h-64">
              <canvas id="trendsChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Predictive Analysis -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="bg-primary px-6 py-4">
          <h3 class="text-white font-semibold">Análise Preditiva</h3>
        </div>
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
              <h4 class="font-semibold text-gray-800 mb-2">Previsão de Consumo Energético</h4>
              <p class="text-sm text-gray-600 mb-3">Baseado nos padrões atuais, prevemos uma redução de 12% no consumo energético nos próximos 3 meses.</p>
              <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500">Confiança: 85%</span>
                <button class="text-primary text-xs font-medium">Ver detalhes</button>
              </div>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
              <h4 class="font-semibold text-gray-800 mb-2">Otimização de Ocupação</h4>
              <p class="text-sm text-gray-600 mb-3">Recomendamos reorganizar as estações de trabalho no 3º andar para aumentar a eficiência em 18%.</p>
              <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500">Confiança: 92%</span>
                <button class="text-primary text-xs font-medium">Ver detalhes</button>
              </div>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
              <h4 class="font-semibold text-gray-800 mb-2">Manutenção Preventiva</h4>
              <p class="text-sm text-gray-600 mb-3">O sistema de ar condicionado da sala 302 apresenta sinais de falha iminente nos próximos 15 dias.</p>
              <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500">Confiança: 78%</span>
                <button class="text-primary text-xs font-medium">Ver detalhes</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Data Storytelling -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-primary px-6 py-4 flex justify-between items-center">
          <h3 class="text-white font-semibold">Data Storytelling</h3>
          <button class="bg-white text-primary px-3 py-1 rounded text-sm font-medium hover:bg-gray-100">
            Compartilhar
          </button>
        </div>
        <div class="p-6">
          <div class="prose max-w-none">
            <h4 class="text-xl font-semibold text-gray-800 mb-4">A Jornada da Transformação Digital</h4>
            <p class="text-gray-600 mb-4">Nos últimos 6 meses, nossa iniciativa Smart Office 4.0 produziu resultados significativos. A análise de dados revela três insights principais:</p>
            
            <div class="pl-4 border-l-4 border-primary mb-4">
              <p class="text-gray-700 font-medium">1. Economia de Energia</p>
              <p class="text-gray-600">A implementação de sensores IoT e automação resultou em uma redução de 15% no consumo de energia, superando nossa meta inicial de 10%.</p>
            </div>
            
            <div class="pl-4 border-l-4 border-primary mb-4">
              <p class="text-gray-700 font-medium">2. Produtividade Aprimorada</p>
              <p class="text-gray-600">Observamos um aumento de 22% na velocidade de entrega de projetos, correlacionado diretamente com melhorias nas condições ambientais do escritório.</p>
            </div>
            
            <div class="pl-4 border-l-4 border-primary mb-4">
              <p class="text-gray-700 font-medium">3. Satisfação dos Colaboradores</p>
              <p class="text-gray-600">Pesquisas internas mostram um aumento de 18% na satisfação dos colaboradores com o ambiente de trabalho.</p>
            </div>
            
            <p class="text-gray-600">Estes resultados demonstram o valor tangível da transformação digital no ambiente de escritório, com um ROI projetado de 185% ao longo de 24 meses.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Sidebar Toggle
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      const sidebar = document.querySelector('.fixed');
      sidebar.classList.toggle('-translate-x-full');
    });

    // Correlation Chart
    const corrCtx = document.getElementById('correlationChart').getContext('2d');
    const corrChart = new Chart(corrCtx, {
      type: 'scatter',
      data: {
        datasets: [
          {
            label: 'Temperatura vs. Produtividade',
            data: [
              {x: 21, y: 65}, {x: 21.5, y: 68}, {x: 22, y: 75}, {x: 22.5, y: 82},
              {x: 23, y: 85}, {x: 23.5, y: 87}, {x: 24, y: 82}, {x: 24.5, y: 78}
            ],
            backgroundColor: '#4F46E5',
            borderColor: '#4F46E5'
          },
          {
            label: 'Ocupação vs. Produtividade',
            data: [
              {x: 30, y: 72}, {x: 40, y: 75}, {x: 50, y: 80}, {x: 60, y: 85},
              {x: 70, y: 82}, {x: 80, y: 78}, {x: 90, y: 70}
            ],
            backgroundColor: '#EC4899',
            borderColor: '#EC4899'
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.dataset.label}: (${context.parsed.x}, ${context.parsed.y})`;
              }
            }
          }
        },
        scales: {
          x: {
            title: {
              display: true,
              text: 'Métricas IoT'
            }
          },
          y: {
            title: {
              display: true,
              text: 'Produtividade (%)'
            }
          }
        }
      }
    });

    // ROI Chart
    const roiCtx = document.getElementById('roiChart').getContext('2d');
    const roiChart = new Chart(roiCtx, {
      type: 'bar',
      data: {
        labels: ['Automação', 'Monitoramento', 'Análise', 'Relatórios', 'Integração'],
        datasets: [
          {
            label: 'ROI (%)',
            data: [210, 185, 165, 150, 190],
            backgroundColor: [
              '#00A9A5', '#3B82F6', '#F59E0B', '#EC4899', '#8B5CF6'
            ],
            borderRadius: 6
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
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

    // Trends Chart
    const trendsCtx = document.getElementById('trendsChart').getContext('2d');
    const trendsChart = new Chart(trendsCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
        datasets: [
          {
            label: 'Uso de Salas de Reunião',
            data: [65, 70, 75, 80, 85, 82],
            borderColor: '#3B82F6',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Uso de Estações de Trabalho',
            data: [85, 82, 80, 75, 72, 70],
            borderColor: '#F59E0B',
            backgroundColor: 'rgba(245, 158, 11, 0.1)',
            tension: 0.4,
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
          }
        },
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
  </script>
</body>
</html>