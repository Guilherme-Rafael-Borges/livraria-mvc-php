<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guinness World Records 2025</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/css/livros.css">
</head>

<body>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
  <div class="container">
    <?php

    session_start();

    ?>
    <!-- Header Section -->
    <div class="container mt-4">
      <div class="header">
        <!-- Logo -->
        <div class="logo">
          <a href="./index.php" style="text-decoration: none;">
            <h4 class="mb-0">Livraria Universal</h4>
          </a>

        </div>

        <!-- Search Bar -->

        <form action="./library.php" method="GET" class="search-bar bg-white">

          <input type="text" placeholder="O que você está procurando?" name="search">
          <button type="submit"><i class="fas fa-search"></i></button>

        </form>


        <!-- User and Cart Icons -->
        <div class="d-flex align-items-center">
          <!-- User/Login/Cadastro Buttons -->
          <div class="me-3">
            <?php
            if (isset($_SESSION['email'])) {
              echo '<form action="./loginAunthy.php" method="POST">
                      <input type="hidden" name="logout" value="true"><button class="btn btn-outline-light me-2" onclick="window.location.href=\'./logout.php\'">Logout</button></input>
                    </form>';
            } else {
              echo '<button class="btn btn-outline-light me-2" onclick="window.location.href=\'./login.php\'">Login</button>
              <button class="btn btn-light" onclick="window.location.href=\'./cadastro.php\'">Cadastro</button>';
            }
            ?>
            <!--<button class="btn btn-outline-light me-2" onclick="window.location.href='./login.php'">Login</button>
          <button class="btn btn-light" onclick="window.location.href='./cadastro.php'">Cadastro</button> -->
          </div>


          <!-- Library Icon -->
          <?php
          if (isset($_SESSION['email']) && $_SESSION['admin'] == 0) {
            echo '<button class="cart-icon btn btn-light" onclick="window.location.href=`./library.php`">
          <i class="fas fa-book fa-lg"></i>
          <span class="badge bg-danger"></span>
        </button>';
          } elseif (isset($_SESSION['email']) && $_SESSION['admin'] == 1) {
            echo '<button class="cart-icon btn btn-light" onclick="window.location.href=`./admin/index.php`">
          <i class="fas fa-house fa-lg"></i>
          <span class="badge bg-danger"></span>
        </button>';
          }

          ?>
        </div>
      </div>
    </div>
    <div class="card">
      <!-- Imagem do Livro -->
      <div class="books">
        <?php

        include_once("./DAO/Connection.php");
        include_once("./DAO/BookDTO.php");
        include_once("./Model/BookModel.php");
        include_once("./Controller/BookController.php");
        include_once("./DAO/UserDTO.php");
        include_once("./Model/UserModel.php");
        include_once("./Controller/UserController.php");

        $userDTO = new UserDTO($con);
        $userModel = new UserModel($userDTO);
        $userController = new UserController($userModel);

        $bookDTO = new BookDTO($con);
        $bookModel = new BookModel($bookDTO);
        $bookController = new BookController($bookModel);


        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
          $user = $userController->getIdByEmail($_SESSION['email']);
          $books = null;
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $books = $bookController->getAllBooksByUserIdLikeTitle($user, $search);
          } else {
            $books = $bookController->getAllBooksByUserId($user);
          }
          foreach ($books as $book) {
            echo '<div class="book-item">
                    <img src="./assets/images/' . $book['image'] . '" alt="' . $book['title'] . '">
                    <h3>' . $book['title'] . '</h3>
                    <p>📚 Autor: ' . $book['author'] . '</p>
                    <p>💲 Preço: R$ ' . $book['price'] . '</p>
                    <a href="./livro.php?id=' . $book['id'] . '" class="btn">Ver Detalhes</a>
                  </div>';
          }
        } else {
          echo '<h1>Você precisa estar logado para acessar essa página.</h1>';
        }



        ?>


      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>