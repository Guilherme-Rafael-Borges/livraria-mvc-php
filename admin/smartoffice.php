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
  <title>Smart Office 4.0 - Livraria Universal</title>

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
        <a href="smartoffice.php" class="flex items-center px-4 py-3 bg-primary text-white rounded-lg">
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
            <button class="lg:hidden text-gray-600 focus:outline-none" id="sidebarToggle">
              <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-2xl font-bold text-gray-800 ml-2 lg:ml-0">Smart Office 4.0</h1>
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
            Análise de IA - Visão Geral
          </h2>
          <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atualizado hoje</span>
        </div>
        <div class="p-4 bg-gray-50 rounded-xl mb-4">
          <p class="text-gray-700"><span class="font-semibold">Resumo:</span> Nossa análise de IA detectou um aumento de 15% na eficiência operacional do escritório este mês. Os sensores de ocupação mostram padrões de uso otimizados nas salas de reunião, e o consumo de energia está 32% abaixo da média histórica.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Recomendações de IA</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Ajustar temperatura em 2°C nas salas do setor oeste para maior economia</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Redistribuir reuniões para otimizar uso de espaços nas terças e quintas</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Implementar iluminação adaptativa baseada em presença para reduzir 12% adicional no consumo</span>
              </li>
            </ul>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Insights Preditivos</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Previsão de pico de ocupação na próxima semana (25% acima da média)</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Tendência de aumento no uso de salas colaborativas vs. espaços individuais</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Potencial economia de 45% em custos operacionais com implementação completa das recomendações</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Bem-vindo ao Smart Office 4.0</h2>
        <p class="text-gray-600">Gerencie projetos, monitore dispositivos IoT, analise dados e gere relatórios inteligentes.</p>
      </div>

      <!-- Cards Overview -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Projetos Ativos</p>
              <h3 class="text-2xl font-bold text-gray-800">8</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="fas fa-tasks text-blue-500"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
            </div>
            <p class="text-xs text-gray-500 mt-1">65% concluído</p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Economia de Energia</p>
              <h3 class="text-2xl font-bold text-gray-800">18%</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-bolt text-green-500"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-green-500 h-2 rounded-full" style="width: 18%"></div>
            </div>
            <p class="text-xs text-gray-500 mt-1">Meta: 25%</p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Ocupação Média</p>
              <h3 class="text-2xl font-bold text-gray-800">72%</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
              <i class="fas fa-users text-yellow-500"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div class="bg-yellow-500 h-2 rounded-full" style="width: 72%"></div>
            </div>
            <p class="text-xs text-gray-500 mt-1">Capacidade total</p>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Alertas Ativos</p>
              <h3 class="text-2xl font-bold text-gray-800">3</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
              <i class="fas fa-bell text-purple-500"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="flex justify-between text-xs text-gray-500">
              <span>1 Crítico</span>
              <span>2 Moderados</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Modules Section -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Module 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Gerenciamento de Projetos</h3>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-4">
              <h4 class="text-lg font-medium text-gray-800">Status dos Projetos</h4>
              <a href="smartoffice_projeto.php" class="text-primary hover:text-primary-hover text-sm">Ver detalhes</a>
            </div>
            <div class="space-y-3">
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Implementação IoT</span>
                <span class="text-sm font-medium text-gray-800">85%</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
              </div>
              
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Automação</span>
                <span class="text-sm font-medium text-gray-800">75%</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
              </div>
              
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Dashboard</span>
                <span class="text-sm font-medium text-gray-800">60%</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 60%"></div>
              </div>
              
              <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Integração</span>
                <span class="text-sm font-medium text-gray-800">40%</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-red-500 h-2 rounded-full" style="width: 40%"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Module 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Monitoramento IoT</h3>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-4">
              <h4 class="text-lg font-medium text-gray-800">Métricas em Tempo Real</h4>
              <a href="smartoffice_iot.php" class="text-primary hover:text-primary-hover text-sm">Ver detalhes</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <div class="bg-blue-100 p-2 rounded-full mr-3">
                    <i class="fas fa-temperature-low text-blue-500"></i>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Temperatura</p>
                    <p class="text-lg font-semibold text-gray-800">23.5°C</p>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <div class="bg-green-100 p-2 rounded-full mr-3">
                    <i class="fas fa-bolt text-green-500"></i>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Energia</p>
                    <p class="text-lg font-semibold text-gray-800">4.2 kWh</p>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <div class="bg-yellow-100 p-2 rounded-full mr-3">
                    <i class="fas fa-users text-yellow-500"></i>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Ocupação</p>
                    <p class="text-lg font-semibold text-gray-800">72%</p>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <div class="bg-purple-100 p-2 rounded-full mr-3">
                    <i class="fas fa-wind text-purple-500"></i>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Qualidade do Ar</p>
                    <p class="text-lg font-semibold text-gray-800">Boa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Row Modules -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Module 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Análise e Insights</h3>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-4">
              <h4 class="text-lg font-medium text-gray-800">Tendências Recentes</h4>
              <a href="smartoffice_analise.php" class="text-primary hover:text-primary-hover text-sm">Ver detalhes</a>
            </div>
            <div class="h-64">
              <canvas id="trendsChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Module 4 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Relatórios Inteligentes</h3>
          </div>
          <div class="p-6">
            <div class="flex items-center justify-between mb-4">
              <h4 class="text-lg font-medium text-gray-800">Relatórios Recentes</h4>
              <a href="smartoffice_relatorios.php" class="text-primary hover:text-primary-hover text-sm">Ver todos</a>
            </div>
            <div class="space-y-4">
              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <div class="bg-blue-100 p-2 rounded-full mr-3">
                  <i class="fas fa-file-alt text-blue-500"></i>
                </div>
                <div class="flex-1">
                  <h5 class="text-sm font-medium text-gray-800">Relatório de Status do Projeto</h5>
                  <p class="text-xs text-gray-500">Gerado em 30/09/2023</p>
                </div>
                <a href="smartoffice_relatorios.php" class="text-primary hover:text-primary-hover">
                  <i class="fas fa-eye"></i>
                </a>
              </div>
              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <div class="bg-green-100 p-2 rounded-full mr-3">
                  <i class="fas fa-file-alt text-green-500"></i>
                </div>
                <div class="flex-1">
                  <h5 class="text-sm font-medium text-gray-800">Lições Aprendidas</h5>
                  <p class="text-xs text-gray-500">Gerado em 28/09/2023</p>
                </div>
                <a href="smartoffice_relatorios.php" class="text-primary hover:text-primary-hover">
                  <i class="fas fa-eye"></i>
                </a>
              </div>
              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <div class="bg-yellow-100 p-2 rounded-full mr-3">
                  <i class="fas fa-file-alt text-yellow-500"></i>
                </div>
                <div class="flex-1">
                  <h5 class="text-sm font-medium text-gray-800">Relatório de Status do Projeto</h5>
                  <p class="text-xs text-gray-500">Gerado em 25/09/2023</p>
                </div>
                <a href="smartoffice_relatorios.php" class="text-primary hover:text-primary-hover">
                  <i class="fas fa-eye"></i>
                </a>
              </div>
            </div>
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

    // Trends Chart
    const ctx = document.getElementById('trendsChart').getContext('2d');
    const trendsChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        datasets: [
          {
            label: 'Consumo de Energia (kWh)',
            data: [4.8, 5.2, 4.9, 4.5, 4.2, 3.8, 3.5],
            borderColor: '#10B981',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Ocupação (%)',
            data: [65, 70, 75, 80, 72, 45, 30],
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
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>