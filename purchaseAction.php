<?php


include_once("./DAO/Connection.php");
    include_once("./DAO/UserDTO.php");
    include_once("./Model/UserModel.php");
    include_once("./Controller/UserController.php");

    $userDTO = new UserDTO($con);
    $userModel = new UserModel($userDTO);
    $userController = new UserController($userModel);

    session_start();

    if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
        if(isset($_POST['buy'])) {
            $id = $_POST['id_book'];
            $user = $userController->getIdByEmail($_SESSION['email']);
            $userController->makePurchase($id, $user, $_POST['price']);
            header("Location: ./index.php");
        }
    } else {
        header("Location: ./login.php");
    }