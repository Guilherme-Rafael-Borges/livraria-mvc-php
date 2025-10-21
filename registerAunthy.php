<?php

    include_once("./DAO/Connection.php");
    include_once("./DAO/UserDTO.php");
    include_once("./Model/UserModel.php");
    include_once("./Controller/UserController.php");


if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $secret = $_POST['secret'];
    $admin = $_POST['admin'] == null ? false : true;
    $userDTO = new UserDTO($con);
    $userModel = new UserModel($userDTO);
    $userController = new UserController($userModel);
    $userController->register($name, $email, $password, $admin, $secret);
}
