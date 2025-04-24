<?php

session_start();

?>
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
<!-- Header Section -->
<div class="container mt-4">
  <div class="header">
    <!-- Logo -->
    <div class="logo">
      <a href="./index.php" style="text-decoration: none;"><h4 class="mb-0">Livraria Universal</h4></a>
      
    </div>

    <!-- Search Bar -->

    <form action="./index.php" method="GET" class="search-bar bg-white">

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