<?php

  include_once("./DAO/Connection.php");
  include_once("./Model/UserModel.php");
  include_once("./Controller/UserController.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Livraria Universal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
<body class="bg-gradient-to-br from-primary via-primary-hover to-primary font-sans min-h-screen">
  <!-- Background Pattern -->
  <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-transparent to-primary-hover/20"></div>
  
  <!-- Login Container -->
  <div class="relative flex justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-md">
      <!-- Logo Section -->
      <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg mb-4">
          <i class="fas fa-book text-primary text-3xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-white mb-2">Livraria Universal</h1>
        <p class="text-white/80">Faça login para continuar</p>
      </div>

      <!-- Login Card -->
      <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-white/20">
        <div class="text-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800 mb-2">Bem-vindo de volta!</h2>
          <p class="text-gray-600">Entre com suas credenciais para acessar sua conta</p>
        </div>

        <form action="./loginAunthy.php" method="POST" onsubmit="return validarLogin()" class="space-y-6">
          <!-- Email Field -->
          <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-gray-700">
              <i class="fas fa-envelope mr-2 text-primary"></i>E-mail
            </label>
            <input 
              type="email" 
              id="email" 
              name="email" 
              placeholder="seu@email.com" 
              required
              class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 hover:border-primary/50"
            >
          </div>

          <!-- Password Field -->
          <div class="space-y-2">
            <label for="senha" class="block text-sm font-medium text-gray-700">
              <i class="fas fa-lock mr-2 text-primary"></i>Senha
            </label>
            <div class="relative">
              <input 
                type="password" 
                id="senha" 
                name="password" 
                placeholder="Sua senha" 
                required
                class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 hover:border-primary/50"
              >
              <button type="button" onclick="togglePassword('senha')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary transition-colors">
                <i class="fas fa-eye" id="senha-icon"></i>
              </button>
            </div>
          </div>

          <!-- Secret Field -->
          <div class="space-y-2">
            <label for="secret" class="block text-sm font-medium text-gray-700">
              <i class="fas fa-user-secret mr-2 text-primary"></i>Nome da mãe
            </label>
            <input 
              type="text" 
              id="secret" 
              name="secret" 
              placeholder="Nome da sua mãe" 
              required
              class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 hover:border-primary/50"
            >
          </div>

          <!-- Submit Button -->
          <button 
            type="submit" 
            name="login"
            class="w-full bg-gradient-to-r from-primary to-primary-hover text-white py-3 px-6 rounded-xl font-semibold hover:from-primary-hover hover:to-primary transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg flex items-center justify-center"
          >
            <i class="fas fa-sign-in-alt mr-2"></i>
            Entrar
          </button>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
          <p class="text-gray-600">
            Não tem uma conta? 
            <a href="cadastro.php" class="text-primary hover:text-primary-hover font-semibold transition-colors duration-300 hover:underline">
              Cadastre-se aqui
            </a>
          </p>
        </div>

        <!-- Back to Home -->
        <div class="mt-4 text-center">
          <a href="index.php" class="text-gray-500 hover:text-primary transition-colors duration-300 text-sm">
            <i class="fas fa-arrow-left mr-1"></i>
            Voltar ao início
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function togglePassword(fieldId) {
      const field = document.getElementById(fieldId);
      const icon = document.getElementById(fieldId + '-icon');
      
      if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>
  <script src="./assets/js/login.js"></script>
</body>
</html>
