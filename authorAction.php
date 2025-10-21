<?php

include_once './DAO/Connection.php';

include_once './DAO/AuthorDTO.php';

include_once './Model/AuthorModel.php';

include_once './Controller/AuthorController.php';

$authorDTO = new AuthorDTO($con);

$authorModel = new AuthorModel($authorDTO);
$authorController = new AuthorController($authorModel);

if(isset($_POST['create'])){

    $name = $_POST['name'];
    $authorController->addAuthor($name);
    header('Location: ./admin/authors.php');
    exit;
}
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $authorController->updateAuthor($id, $name);
    header('Location: ./admin/authors.php');
    exit;
}

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $authorController->deleteAuthor($id);
    header('Location: ./admin/authors.php');
    exit;
}


if(isset($_POST['createLink'])){

    $id_author = $_POST['id_author'];
    $id_book = $_POST['id_book'];
    $authorController->setAuthorBook($id_author, $id_book);
    header('Location: ./admin/authors.php');
    exit;
}
if(isset($_POST['editLink'])) {
    $id_author = $_POST['id_author'];
    $id_book = $_POST['id_book'];
    $old_id_author = $_POST['old_id_author'];
    $old_id_book = $_POST['old_id_book'];
    $authorController->updateAuthorBook($old_id_author, $old_id_book, $id_author, $id_book);
    header('Location: ./admin/authors.php');
    exit;
}

if(isset($_POST['deleteLink'])) {
    $id_author = $_POST['id_author'];
    $id_book = $_POST['id_book'];
    $authorController->removeAuthorBook($id_author, $id_book);
    header('Location: ./admin/authors.php');
    exit;
}