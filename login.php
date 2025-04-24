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
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
  <div class="container">
    <div class="card d-flex flex-row mt-5 p-4">
      <!-- Seção principal para login -->
      <div class="login-section col-12">
        <h2>Bem-vindo de volta!</h2>
        <p>Para continuar conectado conosco, faça login com suas informações pessoais:</p>
        <!-- Adicionando "onsubmit" para chamar a função de validação -->
        <form action="./loginAunthy.php" method="POST" onsubmit="return validarLogin()">
          <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="senha" name="password" placeholder="Senha" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="secret" name="secret" placeholder="Nome da mãe" required>
          </div>
          <button type="submit" class="btn btn-primary mt-3" name="login">Entrar</button>
        </form>
        <p class="mt-4">Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/login.js"></script> <!-- Importando o arquivo JavaScript -->
</body>
</html>
