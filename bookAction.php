<?php

include_once './DAO/Connection.php';

include_once './DAO/BookDTO.php';

include_once './Model/BookModel.php';

include_once './Controller/BookController.php';

$bookDTO = new BookDTO($con);

$bookModel = new BookModel($bookDTO);
$bookController = new BookController($bookModel);

if(isset($_POST['create'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $image = $_FILES['imageFile'];
    $pdf = $_FILES['pdf'];
    $bookController->addBook($title, $description, $price, $isbn, $image, $pdf);
    header('Location: ./admin/books.php');
    exit;
}
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $image = $_FILES['imageFile'];
    $pdf = $_FILES['pdf'];
    $bookController->updateBook($id, $title, $description, $price, $isbn, $image, $pdf);
    header('Location: ./admin/books.php');
    exit;
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $bookController->deleteBook($id);
    header('Location: ./admin/books.php');
    exit;
}