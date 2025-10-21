<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Livraria Universal</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../assets/css/custom.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
  <script>
    // Fallback para Chart.js
    if (typeof Chart === 'undefined') {
      console.error('Chart.js não carregou, tentando CDN alternativo...');
      const script = document.createElement('script');
      script.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.js';
      script.onload = function() {
        console.log('Chart.js carregado com sucesso via CDN alternativo');
      };
      script.onerror = function() {
        console.error('Falha ao carregar Chart.js');
      };
      document.head.appendChild(script);
    }
  </script>
  
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
  <?php
  session_start();
  if (!isset($_SESSION['email']) || $_SESSION['admin'] != 1) {
    header("Location: ../index.php");
  }
  ?>

  <!-- Sidebar -->
  <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex items-center justify-center h-16 bg-primary">
      <h1 class="text-white text-xl font-bold">Admin Panel</h1>
    </div>
    
    <nav class="mt-8">
      <div class="px-4 space-y-2">
        <a href="index.php" class="flex items-center px-4 py-3 bg-primary text-white rounded-lg">
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
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Administrativo</h1>
            <p class="text-gray-600">Visão geral do sistema e estatísticas</p>
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
      <div class="mb-6">
        <div class="flex justify-between items-center">
          <div>
            <h2 class="text-xl font-semibold text-gray-800">Análise de Inteligência Artificial</h2>
            <p class="text-gray-600">Insights automáticos baseados nos dados do sistema</p>
          </div>
          <div class="flex items-center space-x-4">
            <button id="aiAnalysisBtn" class="bg-gradient-to-r from-purple-500 to-blue-500 text-white px-6 py-2 rounded-lg hover:from-purple-600 hover:to-blue-600 transition-all duration-300 flex items-center">
              <i class="fas fa-robot mr-2"></i>
              Análise IA
            </button>
            <span class="text-sm text-gray-500">Última atualização: <?php echo date('d/m/Y H:i'); ?></span>
          </div>
        </div>
      </div>

      <!-- Cards de Estatísticas -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <?php
          include_once("../DAO/Connection.php");
          include_once("../DAO/BookDTO.php");
          include_once("../DAO/UserDTO.php");
          include_once("../Model/BookModel.php");
          include_once("../Model/UserModel.php");
          include_once("../Controller/BookController.php");
          include_once("../Controller/UserController.php");

          $bookDTO = new BookDTO($con);
          $bookModel = new BookModel($bookDTO);
          $bookController = new BookController($bookModel);

          $userDTO = new UserDTO($con);
          $userModel = new UserModel($userDTO);
          $userController = new UserController($userModel);

          // Estatísticas
          $totalBooks = count($bookController->getAllActiveBooks());
          $totalUsers = count($userController->getAllUsers());
          
          // Calcular receita total e preço médio dos livros
          $books = $bookController->getAllActiveBooks();
          $totalRevenue = 0;
          $totalPrice = 0;
          
          foreach ($books as $book) {
              $totalPrice += $book['price'];
              // Simular vendas baseadas no ID do livro
              $sales = ($book['id'] % 10) + 1;
              $totalRevenue += $book['price'] * $sales;
          }
          
          $avgBookPrice = $totalBooks > 0 ? $totalPrice / $totalBooks : 0;
        ?>

        <!-- Total de Livros -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Total de Livros</p>
              <p class="text-3xl font-bold text-gray-900"><?php echo $totalBooks; ?></p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="fas fa-book text-blue-600 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-600 text-sm font-medium">+12%</span>
            <span class="text-gray-500 text-sm">vs mês anterior</span>
          </div>
        </div>

        <!-- Total de Usuários -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Total de Usuários</p>
              <p class="text-3xl font-bold text-gray-900"><?php echo $totalUsers; ?></p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-users text-green-600 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-600 text-sm font-medium">+8%</span>
            <span class="text-gray-500 text-sm">vs mês anterior</span>
          </div>
        </div>

        <!-- Receita Total -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Receita Total</p>
              <p class="text-3xl font-bold text-gray-900">R$ <?php echo number_format($totalRevenue, 2, ',', '.'); ?></p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
              <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-600 text-sm font-medium">+15%</span>
            <span class="text-gray-500 text-sm">vs mês anterior</span>
          </div>
        </div>

        <!-- Preço Médio do Livro -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Preço Médio</p>
              <p class="text-3xl font-bold text-gray-900">R$ <?php echo number_format($avgBookPrice, 2, ',', '.'); ?></p>
            </div>
            <div class="bg-red-100 p-3 rounded-full">
              <i class="fas fa-tag text-red-600 text-xl"></i>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-red-600 text-sm font-medium">-3%</span>
            <span class="text-gray-500 text-sm">vs mês anterior</span>
          </div>
        </div>
      </div>

      <!-- AI Analysis Section -->
      <div id="aiAnalysisSection" class="bg-white rounded-xl shadow-sm p-6 mb-8 hidden">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-semibold text-gray-800">Resultados da Análise de IA</h3>
          <button id="closeAiAnalysis" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div id="aiLoading" class="text-center py-8">
          <i class="fas fa-spinner fa-spin text-primary text-4xl mb-4"></i>
          <p class="text-gray-600">Gerando insights de IA, por favor aguarde...</p>
        </div>
        <div id="aiResults" class="hidden">
          <div class="mb-4">
            <h4 class="font-semibold text-gray-800">Insights de Mercado:</h4>
            <p id="marketInsights" class="text-gray-700"></p>
          </div>
          <div class="mb-4">
            <h4 class="font-semibold text-gray-800">Recomendações:</h4>
            <p id="recommendations" class="text-gray-700"></p>
          </div>
          <div class="mb-4">
            <h4 class="font-semibold text-gray-800">Alertas:</h4>
            <p id="alerts" class="text-gray-700"></p>
          </div>
          <div>
            <h4 class="font-semibold text-gray-800">Tendências:</h4>
            <p id="trends" class="text-gray-700"></p>
          </div>
        </div>
      </div>

      <!-- Charts Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Vendas por Mês</h3>
          <div class="relative h-64">
            <canvas id="salesChart"></canvas>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Livros por Categoria</h3>
          <div class="relative h-64">
            <canvas id="categoryChart"></canvas>
          </div>
        </div>
      </div>

      <!-- Top Books Table -->
      <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Livros Mais Vendidos</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Título
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Autor
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Vendas
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Preço
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php
                $topBooks = $bookController->getAllActiveBooks(); // Simular top books
                usort($topBooks, function($a, $b) {
                    return (($b['id'] % 10) + 1) - (($a['id'] % 10) + 1);
                });
                $topBooks = array_slice($topBooks, 0, 5); // Pegar os 5 primeiros
                foreach ($topBooks as $book) {
                    echo '<tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . htmlspecialchars($book['title']) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . htmlspecialchars($book['author']) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . (($book['id'] % 10) + 1) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ ' . number_format($book['price'], 2, ',', '.') . '</td>
                          </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Função para alternar a visibilidade da sidebar em telas pequenas
    function toggleSidebar() {
      const sidebar = document.querySelector('.fixed.inset-y-0.left-0');
      sidebar.classList.toggle('-translate-x-full');
    }

    // Inicializar gráficos quando a página carregar
    document.addEventListener('DOMContentLoaded', function() {
      // Aguardar um pouco para garantir que o Chart.js esteja carregado
      setTimeout(function() {
        initializeCharts();
      }, 100);
    });

    function initializeCharts() {
      // Gráfico de Vendas
      const salesCtx = document.getElementById('salesChart');
      if (salesCtx && typeof Chart !== 'undefined') {
        new Chart(salesCtx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
              label: 'Vendas',
              data: [12, 19, 3, 5, 2, 3],
              borderColor: '#00A9A5',
              backgroundColor: 'rgba(0, 169, 165, 0.1)',
              tension: 0.4,
              fill: true,
              pointBackgroundColor: '#00A9A5',
              pointBorderColor: '#ffffff',
              pointBorderWidth: 2,
              pointRadius: 6
            }]
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
                grid: {
                  color: 'rgba(0, 0, 0, 0.1)'
                }
              },
              x: {
                grid: {
                  display: false
                }
              }
            }
          }
        });
      }

      // Gráfico de Categorias
      const categoryCtx = document.getElementById('categoryChart');
      if (categoryCtx && typeof Chart !== 'undefined') {
        new Chart(categoryCtx, {
          type: 'doughnut',
          data: {
            labels: ['Ficção', 'Educação', 'Romance', 'Tecnologia', 'Outros'],
            datasets: [{
              data: [30, 25, 20, 15, 10],
              backgroundColor: [
                '#00A9A5',
                '#007E79',
                '#FF6B6B',
                '#4ECDC4',
                '#45B7D1'
              ],
              borderWidth: 0,
              hoverOffset: 10
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
                  usePointStyle: true,
                  font: {
                    size: 12
                  }
                }
              }
            }
          }
        });
      }
    }
  </script>
  
  <!-- Charts JavaScript -->
  <script src="./charts.js"></script>
  
  <!-- Dashboard JavaScript -->
  <script src="./dashboard.js"></script>
</body>

</html>