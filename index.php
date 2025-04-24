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
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>

  <?php
  include("./component/header.php");
  ?>

  <main>
    <div class="books">
      <?php

      include_once("./DAO/Connection.php");
      include_once("./DAO/BookDTO.php");
      include_once("./Model/BookModel.php");
      include_once("./Controller/BookController.php");

      $bookDTO = new BookDTO($con);
      $bookModel = new BookModel($bookDTO);
      $bookController = new BookController($bookModel);

      if (isset($_GET['search'])) {

        $books = $bookController->getBookLikeTitle($_GET['search']);
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
        $books = $bookController->getAllActiveBooks();
        foreach ($books as $book) {
          echo '<div class="book-item">
        <img src="./assets/images/' . $book['image'] . '" alt="' . $book['title'] . '">
        <h3>' . $book['title'] . '</h3>
        <p>📚 Autor: ' . $book['author'] . '</p>
        <p>💲 Preço: R$ ' . $book['price'] . '</p>
        <a href="./livro.php?id=' . $book['id'] . '" class="btn">Ver Detalhes</a>
        </div>';
        }

      }

      ?>


    </div>

    <script src="script.js"></script>

</body>
</main>