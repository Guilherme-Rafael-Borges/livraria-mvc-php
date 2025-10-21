<?php

    class UserController {

        private $userModel;
        public function __construct(UserModel $userModel) {
            $this->userModel = $userModel;
        }
        public function login($email, $password, $secret) {
            $loginData = $this->userModel->login($email, $password, $secret);
            if($loginData == null) {
                header("Location: ./login.php?error=Email ou senha incorretos! (nem vou considerar ter errado o nome da própria mãe)");
            } else {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['admin'] = $loginData['admin'];
                header("Location: ./index.php");
            }
        }
        public function register($name, $email, $password, $admin, $secret) {
            $aunthy = $this->userModel->register($name, $email, $password, $admin, $secret);
            if($aunthy == null) {
                $this->login($email, $password, $secret);
            } else {
                header("Location: ./cadastro.php?error=Email ja cadastrado!");
            }
            
        }
        public function logout() {
            session_start();
            session_destroy();
            header("Location: ./login.php");
        }
        function getIdByEmail($email) {
            return $this->userModel->getIdByEmail($email);
        }

        public function makePurchase($id_book, $id_user, $price) {
            return $this->userModel->makePurchase($id_book, $id_user, $price);
        }

        public function getAllUsers() {
            return $this->userModel->getAllUsers();
        }
    }

?>