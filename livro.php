<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/livros.css">
</head>
<body>
    
    <div class="container">
    <?php include_once './component/header.php'; ?>
        <div class="card">
            <!-- Imagem do Livro -->
            <div class="col-md-4">
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

                if (isset($_GET['id'])) {
                    $book = $bookController->getBookById($_GET['id']);
                    if (!$book) {
                        echo "Livro não encontrado.";
                        exit;
                    }
                    echo '<img src="./assets/images/' . $book['image'] . '" class="card-img-top" alt="' . $book['title'] . '">';
                }

                ?>
                
            </div>
            <!-- Conteúdo do Cartão -->
            <div class="col-md-8 card-body">
                <?php 
                
                if (isset($_GET['id'])) {
                    $book = $bookController->getBookById($_GET['id']);
                    if (!$book) {
                        echo "Livro não encontrado.";
                        exit;
                    }
                    echo '<h5 class="card-title">' . $book['title'] . '</h5>';
                    echo '<p class="card-text">' . $book['description'] . '</p>';
                    echo '<p class="text-muted">Autores: ' . $book['author'] . '</p>';
                    echo '<p class="fw-bold">Por: R$ ' . $book['price'] . '</p>';
                    echo '<div class="d-flex align-items-center">';
                    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
                        $user = $userController->getIdByEmail($_SESSION['email']);
                        $isPurchased = $bookController->isBookUser($_GET['id'], $user);
                        if($isPurchased)
                        {
                            echo '<button class="btn btn-primary" onclick="window.location.href=\'./assets/pdfs/' . $book['file'] . '\'">Ler</button>';
                        } else {    
                            echo '<form action="./purchaseAction.php" method="POST">
                            <input type="hidden" name="id_book" value="' . $book['id'] . '"></input>
                            <input type="hidden" name="price" value="' . $book['price'] . '"></input>
                            <input type="submit" value="comprar" name="buy" class="btn btn-primary"></input>
                            </form>';
                        }
                    } else {
                        echo '<button class="btn btn-primary" onclick="window.location.href=\'./login.php\'">Logar</button>';
                    }
                    echo '</div>';
                }
                
                ?> 
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
