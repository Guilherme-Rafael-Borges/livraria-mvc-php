<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Livros - Livraria Universal</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="./assets/css/custom.css" rel="stylesheet">
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
            'cart-red': '#FF3D57',
            'mercadolivre': '#FFE600',
            'shopee': '#EE4D2D'
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-50">

  <?php
  include("./component/header.php");
  ?>

  <main class="min-h-screen">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-primary to-primary-hover text-white py-8">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
          <div>
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Catálogo de Livros</h1>
            <p class="text-lg opacity-90">Explore nossa coleção completa de livros</p>
          </div>
          <div class="hidden md:flex items-center space-x-4">
            <div class="bg-white/20 rounded-lg px-4 py-2">
              <i class="fas fa-truck mr-2"></i>
              <span class="text-sm">Frete Grátis</span>
            </div>
            <div class="bg-white/20 rounded-lg px-4 py-2">
              <i class="fas fa-shield-alt mr-2"></i>
              <span class="text-sm">Compra Segura</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6">
      <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- Sidebar de Filtros -->
        <div class="lg:w-1/4" id="filtros">
          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filtros</h3>
            
            <!-- Busca por Título -->
            <div class="mb-6">
              <h4 class="font-medium text-gray-700 mb-3">Buscar por Título</h4>
              <form action="./catalogo.php" method="GET" class="relative">
                <input 
                  type="text" 
                  name="search" 
                  placeholder="Digite o título do livro..." 
                  value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none"
                >
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary">
                  <i class="fas fa-search"></i>
                </button>
              </form>
            </div>

            <!-- Categoria -->
            <div class="mb-6">
              <h4 class="font-medium text-gray-700 mb-3">Categoria</h4>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" name="categoria[]" value="ficcao" class="rounded text-primary" <?php echo (isset($_GET['categoria']) && in_array('ficcao', $_GET['categoria'])) ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">Ficção</span>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" name="categoria[]" value="educacao" class="rounded text-primary" <?php echo (isset($_GET['categoria']) && in_array('educacao', $_GET['categoria'])) ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">Educação</span>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" name="categoria[]" value="romance" class="rounded text-primary" <?php echo (isset($_GET['categoria']) && in_array('romance', $_GET['categoria'])) ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">Romance</span>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" name="categoria[]" value="tecnologia" class="rounded text-primary" <?php echo (isset($_GET['categoria']) && in_array('tecnologia', $_GET['categoria'])) ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">Tecnologia</span>
                </label>
              </div>
            </div>

            <!-- Faixa de Preço -->
            <div class="mb-6">
              <h4 class="font-medium text-gray-700 mb-3">Faixa de Preço</h4>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="radio" name="preco" value="0-20" class="text-primary" <?php echo (isset($_GET['preco']) && $_GET['preco'] == '0-20') ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">Até R$ 20</span>
                </label>
                <label class="flex items-center">
                  <input type="radio" name="preco" value="20-50" class="text-primary" <?php echo (isset($_GET['preco']) && $_GET['preco'] == '20-50') ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">R$ 20 - R$ 50</span>
                </label>
                <label class="flex items-center">
                  <input type="radio" name="preco" value="50-100" class="text-primary" <?php echo (isset($_GET['preco']) && $_GET['preco'] == '50-100') ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">R$ 50 - R$ 100</span>
                </label>
                <label class="flex items-center">
                  <input type="radio" name="preco" value="100+" class="text-primary" <?php echo (isset($_GET['preco']) && $_GET['preco'] == '100+') ? 'checked' : ''; ?>>
                  <span class="ml-2 text-sm text-gray-600">Acima de R$ 100</span>
                </label>
              </div>
            </div>

            <!-- Avaliação -->
            <div class="mb-6">
              <h4 class="font-medium text-gray-700 mb-3">Avaliação</h4>
              <div class="space-y-2">
                <label class="flex items-center">
                  <input type="checkbox" name="avaliacao[]" value="5" class="rounded text-primary">
                  <div class="flex items-center ml-2">
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">5 estrelas</span>
                  </div>
                </label>
                <label class="flex items-center">
                  <input type="checkbox" name="avaliacao[]" value="4" class="rounded text-primary">
                  <div class="flex items-center ml-2">
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                      <i class="fas fa-star text-sm"></i>
                      <i class="far fa-star text-sm"></i>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">4 estrelas</span>
                  </div>
                </label>
              </div>
            </div>

            <button type="submit" class="w-full bg-primary text-white py-2 rounded-lg hover:bg-primary-hover transition-colors">
              Aplicar Filtros
            </button>
          </div>
        </div>

        <!-- Área Principal de Produtos -->
        <div class="lg:w-3/4">
          <!-- Header da Lista -->
          <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
            <div class="flex items-center justify-between">
              <div>
                <?php if (isset($_GET['search'])): ?>
                  <h2 class="text-xl font-semibold text-gray-800">Resultados para: "<?php echo htmlspecialchars($_GET['search']); ?>"</h2>
                  <p class="text-gray-600 text-sm">Encontramos os seguintes livros</p>
                <?php else: ?>
                  <h2 class="text-xl font-semibold text-gray-800">Nossos Livros</h2>
                  <p class="text-gray-600 text-sm">Explore nossa coleção completa</p>
                <?php endif; ?>
              </div>
              <div class="flex items-center space-x-4">
                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                  <option>Ordenar por</option>
                  <option>Menor preço</option>
                  <option>Maior preço</option>
                  <option>Mais vendidos</option>
                  <option>Melhor avaliados</option>
                </select>
                <div class="flex border border-gray-300 rounded-lg">
                  <button class="px-3 py-2 text-gray-600 hover:bg-gray-100">
                    <i class="fas fa-th-large"></i>
                  </button>
                  <button class="px-3 py-2 text-primary bg-gray-100">
                    <i class="fas fa-list"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Grid de Produtos -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            include_once("./DAO/Connection.php");
            include_once("./DAO/BookDTO.php");
            include_once("./Model/BookModel.php");
            include_once("./Controller/BookController.php");

            $bookDTO = new BookDTO($con);
            $bookModel = new BookModel($bookDTO);
            $bookController = new BookController($bookModel);

            // Buscar livros baseado nos filtros
            if (isset($_GET['search'])) {
              $books = $bookController->getBookLikeTitle($_GET['search']);
            } else {
              $books = $bookController->getAllActiveBooks();
            }

            // Aplicar filtros adicionais se necessário
            if (isset($_GET['preco'])) {
              $precoRange = $_GET['preco'];
              $books = array_filter($books, function($book) use ($precoRange) {
                $price = $book['price'];
                switch ($precoRange) {
                  case '0-20':
                    return $price <= 20;
                  case '20-50':
                    return $price > 20 && $price <= 50;
                  case '50-100':
                    return $price > 50 && $price <= 100;
                  case '100+':
                    return $price > 100;
                  default:
                    return true;
                }
              });
            }

            if (empty($books)) {
              echo '<div class="col-span-full text-center py-12">
                      <div class="bg-white rounded-lg shadow-sm p-8">
                        <i class="fas fa-search text-gray-400 text-6xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nenhum livro encontrado</h3>
                        <p class="text-gray-600">Tente buscar por outro termo ou explore nossa coleção completa.</p>
                        <a href="./catalogo.php" class="mt-4 inline-block bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-hover transition-colors">
                          Ver Todos os Livros
                        </a>
                      </div>
                    </div>';
            } else {
              foreach ($books as $book) {
                echo '<div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-200 group">
                        <div class="relative">
                          <img src="./assets/images/' . $book['image'] . '" alt="' . $book['title'] . '" class="w-full h-48 object-cover rounded-t-lg group-hover:scale-105 transition-transform duration-300">
                          <div class="absolute top-2 right-2">
                            <button class="bg-white/90 hover:bg-white text-gray-600 p-2 rounded-full shadow-sm transition-colors">
                              <i class="fas fa-heart"></i>
                            </button>
                          </div>
                          <div class="absolute bottom-2 left-2">
                            <span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">-20%</span>
                          </div>
                        </div>
                        <div class="p-4">
                          <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2 text-sm">' . htmlspecialchars($book['title']) . '</h3>
                          <p class="text-gray-600 text-xs mb-2">' . htmlspecialchars($book['author']) . '</p>
                          <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400 text-xs">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-xs ml-1">(4.8)</span>
                          </div>
                          <div class="flex items-center justify-between">
                            <div>
                              <span class="text-lg font-bold text-primary">R$ ' . number_format($book['price'], 2, ',', '.') . '</span>
                              <span class="text-gray-400 text-sm line-through ml-2">R$ ' . number_format($book['price'] * 1.25, 2, ',', '.') . '</span>
                            </div>
                            <a href="./livro.php?id=' . $book['id'] . '" class="bg-primary text-white px-3 py-1 rounded text-xs hover:bg-primary-hover transition-colors">
                              Ver
                            </a>
                          </div>
                          <div class="mt-2 text-xs text-gray-500">
                            <i class="fas fa-truck mr-1"></i>
                            Frete grátis
                          </div>
                        </div>
                      </div>';
              }
            }
            ?>
          </div>

          <!-- Paginação -->
          <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
              <button class="px-3 py-2 text-gray-500 hover:text-primary">
                <i class="fas fa-chevron-left"></i>
              </button>
              <button class="px-3 py-2 bg-primary text-white rounded">1</button>
              <button class="px-3 py-2 text-gray-500 hover:text-primary">2</button>
              <button class="px-3 py-2 text-gray-500 hover:text-primary">3</button>
              <button class="px-3 py-2 text-gray-500 hover:text-primary">
                <i class="fas fa-chevron-right"></i>
              </button>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <?php
    include("./component/footer.php");
    ?>
  </main>

  <script src="./assets/js/script.js"></script>
</body>
</html>
