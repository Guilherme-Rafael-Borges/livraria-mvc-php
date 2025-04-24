<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livraria Universal</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="carrinho.css">
</head>
<body>
  <!-- Header Section -->
  <div class="container mt-4">
    <div class="header">
      <!-- Logo -->
      <div class="logo">
        <h4 class="mb-0">
            <a href="../index/index.php" class="mb-0" style="color: white; font: normal;">Livraria Universal</a>
        </h4>
      </div>

      <!-- Search Bar -->
      <div class="search-bar bg-white">
        <input type="text" placeholder="O que você está procurando?">
        <button><i class="fas fa-search"></i></button>
      </div>

      <!-- User and Cart Icons -->
      <div class="d-flex align-items-center">
        <!-- User/Login/Cadastro Buttons -->
        <div class="me-3">
  <button class="btn btn-outline-light me-2" onclick="window.location.href='../login/login.php'">Login</button>
  <button class="btn btn-light" onclick="window.location.href='../login/cadastro.php'">Cadastro</button>
</div>


        <!-- Cart Icon -->
        <div class="cart-icon">
          <i class="fas fa-shopping-cart fa-lg"></i>
          <span class="badge bg-danger">2</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Login (Bootstrap Modal Example) -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<main>
<body>
    <div class="container my-5">
        <div class="row">
            <!-- Seção dos Itens -->
            <div class="col-lg-8">
                <div class="card p-4 shadow-sm">
                    <h2 class="mb-4">Todos os Itens (8)</h2>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="text-muted mb-3">Envio Nacional - <span class="text-success">Frete Grátis</span></p>
                        <button class="btn btn-outline-light">Adicionar mais</button>
                    </div>
                    <!-- Exemplo de Produto -->
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img src="produto.jpg" alt="Produto" class="rounded img-thumbnail" style="width: 100px; height: 100px;">
                        <div class="ms-3">
                            <h5 class="mb-1">Nome do livro
                            </h5>
                            <p class="mb-1 text-muted">Qtd: 1</p>
                            <p class="text-success fw-bold">R$20,99</p>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-danger">Remover</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumo do Pedido -->
            <div class="col-lg-4">
                <div class="card p-4 shadow-sm">
                    <h3>Resumo do Pedido</h3>
                    <p class="fs-5">Preço estimado:</p>
                    <p class="fw-bold display-6">R$0,00</p>
                    <button class="btn btn-primary w-100 mb-3">Comprar agora</button>
                    <h5>Método de Pagamento</h5>
                    <img src="../imagens/pix.svg" alt="Métodos de Pagamento" class="img-fluid mt-3">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
