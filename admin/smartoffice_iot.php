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
  <title>Monitoramento IoT - Smart Office 4.0</title>

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
        <a href="smartoffice_iot.php" class="flex items-center px-4 py-3 bg-primary text-white rounded-lg">
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
            <h1 class="text-2xl font-bold text-gray-800 ml-2 lg:ml-0">Monitoramento IoT</h1>
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
            Análise de IA - Monitoramento IoT
          </h2>
          <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atualizado hoje</span>
        </div>
        <div class="p-4 bg-gray-50 rounded-xl mb-4">
          <p class="text-gray-700"><span class="font-semibold">Resumo:</span> Nossa IA detectou padrões anômalos em 3 sensores de temperatura que indicam possível mau funcionamento. Análise preditiva sugere manutenção preventiva em 5 dispositivos para evitar falhas nos próximos 30 dias.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Alertas de Dispositivos</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-exclamation-triangle text-red-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Sensor de temperatura #T-103 apresenta leituras inconsistentes (Sala 4)</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Sensor de ocupação #O-087 com bateria baixa (Sala de Reuniões 2)</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Gateway #GW-02 com conectividade intermitente (Setor Leste)</span>
              </li>
            </ul>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Otimizações Sugeridas</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Recalibrar sensores de iluminação para reduzir 8% no consumo de energia</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Ajustar intervalo de coleta de dados para otimizar vida útil da bateria</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Implementar redundância para sensores críticos nas salas de reunião</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- IoT Metrics Overview -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Consumo de Energia</p>
              <h3 class="text-2xl font-bold text-gray-800">85 kWh</h3>
              <p class="text-xs text-green-500 mt-1">
                <i class="fas fa-arrow-down mr-1"></i>
                12% abaixo da média
              </p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-bolt text-green-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Temperatura</p>
              <h3 class="text-2xl font-bold text-gray-800">23.5°C</h3>
              <p class="text-xs text-blue-500 mt-1">
                <i class="fas fa-check-circle mr-1"></i>
                Dentro do ideal
              </p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="fas fa-thermometer-half text-blue-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Ocupação</p>
              <h3 class="text-2xl font-bold text-gray-800">68%</h3>
              <p class="text-xs text-yellow-500 mt-1">
                <i class="fas fa-arrow-up mr-1"></i>
                5% acima de ontem
              </p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
              <i class="fas fa-users text-yellow-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Qualidade do Ar</p>
              <h3 class="text-2xl font-bold text-gray-800">Boa</h3>
              <p class="text-xs text-purple-500 mt-1">
                <i class="fas fa-check-circle mr-1"></i>
                CO2: 650 ppm
              </p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
              <i class="fas fa-wind text-purple-500"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Energy Consumption Chart -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="bg-primary px-6 py-4 flex justify-between items-center">
          <h3 class="text-white font-semibold">Consumo de Energia (Últimos 7 dias)</h3>
          <div>
            <select class="bg-white text-primary px-3 py-1 rounded text-sm font-medium">
              <option>Diário</option>
              <option>Semanal</option>
              <option>Mensal</option>
            </select>
          </div>
        </div>
        <div class="p-6">
          <div class="h-80">
            <canvas id="energyChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Temperature and Occupancy -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Temperature Chart -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Temperatura (Hoje)</h3>
          </div>
          <div class="p-6">
            <div class="h-64">
              <canvas id="temperatureChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Occupancy Chart -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="bg-primary px-6 py-4">
            <h3 class="text-white font-semibold">Ocupação (Hoje)</h3>
          </div>
          <div class="p-6">
            <div class="h-64">
              <canvas id="occupancyChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Alerts -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="bg-primary px-6 py-4 flex justify-between items-center">
          <h3 class="text-white font-semibold">Alertas Recentes</h3>
          <button class="bg-white text-primary px-3 py-1 rounded text-sm font-medium hover:bg-gray-100">
            Ver Todos
          </button>
        </div>
        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mensagem</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Local</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data/Hora</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Crítico</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Temperatura acima do limite</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sala de Servidores</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Hoje, 10:23</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Resolvido</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Alerta</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Consumo de energia elevado</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Andar 2</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Hoje, 09:15</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Em análise</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Informação</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Manutenção programada</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sistema de Ar Condicionado</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ontem, 18:30</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Agendado</span>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Alerta</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Qualidade do ar abaixo do ideal</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sala de Reuniões 3</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ontem, 15:45</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Resolvido</span>
                  </td>
                </tr>
              </tbody>
            </table>
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

    // Energy Consumption Chart
    const energyCtx = document.getElementById('energyChart').getContext('2d');
    const energyChart = new Chart(energyCtx, {
      type: 'bar',
      data: {
        labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        datasets: [
          {
            label: 'Consumo Real (kWh)',
            data: [95, 88, 92, 85, 82, 65, 70],
            backgroundColor: '#00A9A5',
            borderRadius: 6
          },
          {
            label: 'Meta (kWh)',
            data: [100, 100, 100, 100, 100, 80, 80],
            backgroundColor: 'rgba(0, 169, 165, 0.2)',
            borderRadius: 6
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
            title: {
              display: true,
              text: 'Consumo (kWh)'
            }
          }
        }
      }
    });

    // Temperature Chart
    const tempCtx = document.getElementById('temperatureChart').getContext('2d');
    const tempChart = new Chart(tempCtx, {
      type: 'line',
      data: {
        labels: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'],
        datasets: [
          {
            label: 'Temperatura (°C)',
            data: [21.5, 22.0, 22.8, 23.2, 23.5, 23.8, 23.5, 23.2, 22.8, 22.5],
            borderColor: '#3B82F6',
            backgroundColor: 'rgba(59, 130, 246, 0.1)',
            borderWidth: 3,
            pointBackgroundColor: '#3B82F6',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Ideal',
            data: [22.0, 22.0, 22.0, 22.0, 22.0, 22.0, 22.0, 22.0, 22.0, 22.0],
            borderColor: '#9CA3AF',
            borderDash: [5, 5],
            borderWidth: 2,
            pointRadius: 0,
            fill: false
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
            min: 20,
            max: 25,
            title: {
              display: true,
              text: 'Temperatura (°C)'
            }
          }
        }
      }
    });

    // Occupancy Chart
    const occCtx = document.getElementById('occupancyChart').getContext('2d');
    const occChart = new Chart(occCtx, {
      type: 'line',
      data: {
        labels: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'],
        datasets: [
          {
            label: 'Ocupação (%)',
            data: [25, 45, 65, 75, 60, 50, 70, 75, 65, 40],
            borderColor: '#F59E0B',
            backgroundColor: 'rgba(245, 158, 11, 0.1)',
            borderWidth: 3,
            pointBackgroundColor: '#F59E0B',
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
              text: 'Ocupação (%)'
            }
          }
        }
      }
    });
  </script>
</body>
</html>