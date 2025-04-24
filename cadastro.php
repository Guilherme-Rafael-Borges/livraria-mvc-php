<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
  <div class="container">
    <div class="card d-flex flex-row mt-5 p-4">
      <!-- Seção de cadastro -->
      <div class="login-section col-12">
        <div class="letra"> 
          <h2>Crie sua conta</h2>
        </div>
        <p style="text-align: center;">Preencha os campos abaixo para se cadastrar:</p>

        <!-- Adicionando "onsubmit" para chamar a função de validação -->
        <form action="./registerAunthy.php" method="POST" onsubmit="return validarFormulario()">
          <div class="mb-3">
            <input type="text" class="form-control" id="nome" name="name" placeholder="Nome" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="segredo" name="secret" placeholder="Nome da mãe" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="senha" name="password" placeholder="Senha" required>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="adminLogin" name="admin" value="1">
            <label class="form-check-label" for="adminLogin">
              Conta administradora
            </label>
          </div>
          <button type="submit" name="register"  class="btn btn-primary mt-3">Cadastrar</button>
        </form>
        <p class="mt-4">Já tem uma conta? <a href="login.php">Faça login</a></p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/cadastro.js"></script>  <!-- Importando o arquivo JavaScript -->
  <script src="./assets/js/login.js"></script>
</body>
</html>
