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
  <title>Relatórios Inteligentes - Smart Office 4.0</title>

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
        <a href="smartoffice_analise.php" class="flex items-center px-4 py-3 text-gray-600 hover:bg-primary hover:text-white rounded-lg transition-colors duration-300">
          <i class="fas fa-chart-line mr-3"></i>
          Análise e Insights
        </a>
        <a href="smartoffice_relatorios.php" class="flex items-center px-4 py-3 bg-primary text-white rounded-lg">
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
            <h1 class="text-2xl font-bold text-gray-800 ml-2 lg:ml-0">Relatórios Inteligentes</h1>
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
            Análise de IA - Relatórios Inteligentes
          </h2>
          <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Atualizado hoje</span>
        </div>
        <div class="p-4 bg-gray-50 rounded-xl mb-4">
          <p class="text-gray-700"><span class="font-semibold">Resumo:</span> Nossa IA analisou os relatórios do último trimestre e identificou tendências importantes. Projeções indicam oportunidades de otimização em 4 áreas principais com potencial impacto positivo de 15% na eficiência operacional.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Tendências Identificadas</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-arrow-trend-up text-purple-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Aumento de 23% na utilização de salas de reunião virtuais vs. presenciais</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-arrow-trend-down text-orange-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Redução de 8% na eficiência energética nos horários de pico (14h-16h)</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-arrow-trend-up text-purple-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Crescimento de 17% na demanda por espaços flexíveis de trabalho</span>
              </li>
            </ul>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl">
            <h3 class="text-md font-semibold text-gray-800 mb-2">Previsões e Recomendações</h3>
            <ul class="space-y-2">
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Converter 30% das salas fixas em espaços flexíveis até o próximo trimestre</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Implementar sistema de escalonamento de climatização baseado em ocupação</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-lightbulb text-green-500 mt-1 mr-2"></i>
                <span class="text-sm text-gray-700">Desenvolver dashboard personalizado para gestores de departamento</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Reports Overview -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Relatórios Gerados</p>
              <h3 class="text-2xl font-bold text-gray-800">24</h3>
              <p class="text-xs text-blue-500 mt-1">
                <i class="fas fa-arrow-up mr-1"></i>
                8 nos últimos 30 dias
              </p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="fas fa-file-alt text-blue-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Insights Identificados</p>
              <h3 class="text-2xl font-bold text-gray-800">42</h3>
              <p class="text-xs text-green-500 mt-1">
                <i class="fas fa-lightbulb mr-1"></i>
                15 de alta prioridade
              </p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-lightbulb text-green-500"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500 mb-1">Economia Estimada</p>
              <h3 class="text-2xl font-bold text-gray-800">R$ 75.000</h3>
              <p class="text-xs text-purple-500 mt-1">
                <i class="fas fa-chart-line mr-1"></i>
                Baseado em relatórios
              </p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
              <i class="fas fa-dollar-sign text-purple-500"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Generate Reports Section -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="bg-primary px-6 py-4">
          <h3 class="text-white font-semibold">Gerar Relatórios</h3>
        </div>
        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Project Status Report -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
              <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                  <i class="fas fa-project-diagram text-blue-500"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-800">Relatório de Status do Projeto</h4>
                  <p class="text-sm text-gray-600">Gere um relatório detalhado sobre o status atual dos projetos</p>
                </div>
              </div>
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Projeto</label>
                  <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option>Todos os projetos</option>
                    <option>Implementação IoT</option>
                    <option>Automação de Escritório</option>
                    <option>Integração de Sistemas</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Período</label>
                  <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option>Último mês</option>
                    <option>Últimos 3 meses</option>
                    <option>Último ano</option>
                    <option>Todo o período</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Formato</label>
                  <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                      <input type="radio" name="format1" class="form-radio text-primary" checked>
                      <span class="ml-2 text-sm text-gray-700">PDF</span>
                    </label>
                    <label class="inline-flex items-center">
                      <input type="radio" name="format1" class="form-radio text-primary">
                      <span class="ml-2 text-sm text-gray-700">Excel</span>
                    </label>
                    <label class="inline-flex items-center">
                      <input type="radio" name="format1" class="form-radio text-primary">
                      <span class="ml-2 text-sm text-gray-700">HTML</span>
                    </label>
                  </div>
                </div>
                <button class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-hover transition-colors duration-300">
                  Gerar Relatório
                </button>
              </div>
            </div>
            
            <!-- Lessons Learned Report -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
              <div class="flex items-center mb-4">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                  <i class="fas fa-brain text-green-500"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-800">Relatório de Lições Aprendidas</h4>
                  <p class="text-sm text-gray-600">Gere insights baseados em dados históricos de projetos</p>
                </div>
              </div>
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                  <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option>Todas as categorias</option>
                    <option>Gerenciamento de Projetos</option>
                    <option>Eficiência Energética</option>
                    <option>Produtividade</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Projetos Concluídos</label>
                  <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option>Todos os projetos</option>
                    <option>Apenas projetos bem-sucedidos</option>
                    <option>Apenas projetos com desafios</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Formato</label>
                  <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                      <input type="radio" name="format2" class="form-radio text-primary" checked>
                      <span class="ml-2 text-sm text-gray-700">PDF</span>
                    </label>
                    <label class="inline-flex items-center">
                      <input type="radio" name="format2" class="form-radio text-primary">
                      <span class="ml-2 text-sm text-gray-700">Excel</span>
                    </label>
                    <label class="inline-flex items-center">
                      <input type="radio" name="format2" class="form-radio text-primary">
                      <span class="ml-2 text-sm text-gray-700">HTML</span>
                    </label>
                  </div>
                </div>
                <button class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-hover transition-colors duration-300">
                  Gerar Relatório
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Report History -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-primary px-6 py-4 flex justify-between items-center">
          <h3 class="text-white font-semibold">Histórico de Relatórios</h3>
          <div>
            <select class="bg-white text-primary px-3 py-1 rounded text-sm font-medium">
              <option>Todos os tipos</option>
              <option>Status do Projeto</option>
              <option>Lições Aprendidas</option>
              <option>Análise de Desempenho</option>
            </select>
          </div>
        </div>
        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome do Relatório</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data de Geração</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gerado Por</th>
                  <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Relatório de Status - Q2 2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Status do Projeto</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/06/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <button class="text-blue-500 hover:text-blue-700 mr-3">
                      <i class="fas fa-download"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Lições Aprendidas - Projeto IoT</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Lições Aprendidas</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">02/06/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <button class="text-blue-500 hover:text-blue-700 mr-3">
                      <i class="fas fa-download"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Análise de Desempenho - Maio 2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Análise de Desempenho</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">31/05/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <button class="text-blue-500 hover:text-blue-700 mr-3">
                      <i class="fas fa-download"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Relatório de Status - Q1 2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Status do Projeto</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/03/2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <button class="text-blue-500 hover:text-blue-700 mr-3">
                      <i class="fas fa-download"></i>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-500">
              Mostrando 4 de 24 relatórios
            </div>
            <div class="flex space-x-2">
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                Anterior
              </button>
              <button class="px-3 py-1 bg-primary text-white rounded-md text-sm">
                1
              </button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                2
              </button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                3
              </button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                Próximo
              </button>
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
  </script>
</body>
</html>