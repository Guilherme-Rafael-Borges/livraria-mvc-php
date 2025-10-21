<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho de Compras - Livraria Universal</title>
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
            'cart-red': '#FF3D57'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans min-h-screen">
  <?php
  include("./component/header.php");
  ?>

  <!-- Main Content -->
  <main class="container mx-auto my-8 px-4">
    <!-- Page Header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">Carrinho de Compras</h1>
      <p class="text-gray-600">Revise seus itens antes de finalizar a compra</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Items Section -->
      <div class="lg:w-2/3">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
          <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
              <i class="fas fa-shopping-cart mr-3 text-primary"></i>
              Seus Itens (8)
            </h2>
            <button class="text-primary hover:text-primary-hover font-semibold transition-colors duration-300 flex items-center">
              <i class="fas fa-plus mr-2"></i>
              Adicionar mais livros
            </button>
          </div>

          <!-- Shipping Info -->
          <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
            <div class="flex items-center">
              <i class="fas fa-truck text-green-600 mr-3"></i>
              <div>
                <p class="text-green-800 font-semibold">Envio Nacional</p>
                <p class="text-green-600 text-sm">Frete Grátis para todo o Brasil</p>
              </div>
            </div>
          </div>

          <!-- Product Items -->
          <div class="space-y-4">
            <!-- Product Item 1 -->
            <div class="flex items-center border border-gray-200 rounded-xl p-4 hover:shadow-md transition-shadow duration-300">
              <div class="relative">
                <img src="./assets/images/placeholder.txt" alt="Produto" class="rounded-lg w-24 h-24 object-cover bg-gray-200">
                <div class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full w-6 h-6 flex items-center justify-center font-semibold">1</div>
              </div>
              <div class="ml-4 flex-grow">
                <h5 class="text-lg font-semibold text-gray-800 mb-1">Nome do livro</h5>
                <p class="text-gray-500 mb-1">Autor: Nome do Autor</p>
                <p class="text-gray-500 mb-2">ISBN: 1234567890123</p>
                <div class="flex items-center space-x-4">
                  <div class="flex items-center space-x-2">
                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">
                      <i class="fas fa-minus text-xs"></i>
                    </button>
                    <span class="text-gray-700 font-medium">1</span>
                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">
                      <i class="fas fa-plus text-xs"></i>
                    </button>
                  </div>
                  <p class="text-primary font-bold text-lg">R$ 20,99</p>
                </div>
              </div>
              <div class="ml-auto flex flex-col space-y-2">
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-600 transition-colors duration-300 flex items-center">
                  <i class="fas fa-trash mr-2"></i>
                  Remover
                </button>
                <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-200 transition-colors duration-300 flex items-center">
                  <i class="fas fa-heart mr-2"></i>
                  Favoritar
                </button>
              </div>
            </div>

            <!-- Product Item 2 -->
            <div class="flex items-center border border-gray-200 rounded-xl p-4 hover:shadow-md transition-shadow duration-300">
              <div class="relative">
                <img src="./assets/images/placeholder.txt" alt="Produto" class="rounded-lg w-24 h-24 object-cover bg-gray-200">
                <div class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full w-6 h-6 flex items-center justify-center font-semibold">1</div>
              </div>
              <div class="ml-4 flex-grow">
                <h5 class="text-lg font-semibold text-gray-800 mb-1">Outro livro</h5>
                <p class="text-gray-500 mb-1">Autor: Outro Autor</p>
                <p class="text-gray-500 mb-2">ISBN: 9876543210987</p>
                <div class="flex items-center space-x-4">
                  <div class="flex items-center space-x-2">
                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">
                      <i class="fas fa-minus text-xs"></i>
                    </button>
                    <span class="text-gray-700 font-medium">1</span>
                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">
                      <i class="fas fa-plus text-xs"></i>
                    </button>
                  </div>
                  <p class="text-primary font-bold text-lg">R$ 35,50</p>
                </div>
              </div>
              <div class="ml-auto flex flex-col space-y-2">
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-600 transition-colors duration-300 flex items-center">
                  <i class="fas fa-trash mr-2"></i>
                  Remover
                </button>
                <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-200 transition-colors duration-300 flex items-center">
                  <i class="fas fa-heart mr-2"></i>
                  Favoritar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="lg:w-1/3">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 sticky top-4">
          <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-receipt mr-3 text-primary"></i>
            Resumo do Pedido
          </h3>

          <!-- Price Breakdown -->
          <div class="space-y-4 mb-6">
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Subtotal (2 itens)</span>
              <span class="font-semibold text-gray-800">R$ 56,49</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Frete</span>
              <span class="font-semibold text-green-600">Grátis</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Desconto</span>
              <span class="font-semibold text-red-600">-R$ 5,00</span>
            </div>
            <hr class="border-gray-200">
            <div class="flex justify-between items-center">
              <span class="text-lg font-semibold text-gray-800">Total</span>
              <span class="text-2xl font-bold text-primary">R$ 51,49</span>
            </div>
          </div>

          <!-- Checkout Button -->
          <button class="w-full bg-gradient-to-r from-primary to-primary-hover text-white py-4 px-6 rounded-xl font-semibold hover:from-primary-hover hover:to-primary transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg mb-4 flex items-center justify-center">
            <i class="fas fa-credit-card mr-2"></i>
            Finalizar Compra
          </button>

          <!-- Payment Methods -->
          <div class="border-t border-gray-200 pt-4">
            <h5 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
              <i class="fas fa-shield-alt mr-2 text-green-600"></i>
              Métodos de Pagamento
            </h5>
            <div class="grid grid-cols-2 gap-3">
              <div class="bg-gray-50 rounded-lg p-3 text-center">
                <i class="fas fa-credit-card text-2xl text-gray-600 mb-2"></i>
                <p class="text-xs text-gray-600">Cartão</p>
              </div>
              <div class="bg-gray-50 rounded-lg p-3 text-center">
                <i class="fas fa-qrcode text-2xl text-gray-600 mb-2"></i>
                <p class="text-xs text-gray-600">PIX</p>
              </div>
            </div>
            <div class="mt-3">
              <img src="./assets/images/pix.svg" alt="Métodos de Pagamento" class="w-full rounded-lg">
            </div>
          </div>

          <!-- Security Info -->
          <div class="mt-4 text-center">
            <p class="text-xs text-gray-500 flex items-center justify-center">
              <i class="fas fa-lock mr-1"></i>
              Compra 100% segura e protegida
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Continue Shopping -->
  <div class="container mx-auto px-4 mb-8">
    <div class="text-center">
      <a href="index.php" class="inline-flex items-center text-primary hover:text-primary-hover font-semibold transition-colors duration-300">
        <i class="fas fa-arrow-left mr-2"></i>
        Continuar comprando
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
