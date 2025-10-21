<?php

    class UserDTO {

        private $con;

        public function __construct(PDO $pDO) {
            $this->con = $pDO;
        }

        public function login($email, $password, $secret) {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password AND secret_psw = :secret";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':secret', $secret);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }

        public function register($name, $email, $password, $admin, $secret) {
            $checkSql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->con->prepare($checkSql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "error";
            }

            $sql = "INSERT INTO users (name, email, password, admin, secret_psw) VALUES (:name, :email, :password, :admin, :secret)";
            $stmt = $this->con->prepare($sql);    
            $stmt->bindParam(':name', $name);    
            $stmt->bindParam(':email', $email);    
            $stmt->bindParam(':password', $password);    
            $stmt->bindParam(':admin', $admin);    
            $stmt->bindParam(':secret', $secret);    
            $stmt->execute();
        }

        public function update($name, $email, $password, $admin, $secret, $id) {
            $sql = "UPDATE users SET name = :name, email = :email, password = :password, admin = :admin, secret_psw = :secret WHERE id = :id";
            $stmt = $this->con->prepare($sql);    
            $stmt->bindParam(':name', $name);    
            $stmt->bindParam(':email', $email);    
            $stmt->bindParam(':password', $password);    
            $stmt->bindParam(':admin', $admin);    
            $stmt->bindParam(':secret', $secret);    
            $stmt->bindParam(':id', $id);    
            $stmt->execute();
        }

        public function getIdByEmail($email) {
            $sql = "SELECT id FROM users WHERE email = :email";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user['id'];
        }

        public function makePurchase($id_book, $id_user, $price) {
            $sql = "INSERT INTO purchases (id_book, id_user, price) VALUES (:id_book, :id_user, :price)";
            $stmt = $this->con->prepare($sql);    
            $stmt->bindParam(':id_book', $id_book);    
            $stmt->bindParam(':id_user', $id_user);    
            $stmt->bindParam(':price', $price);    
            $stmt->execute();
        }

        public function getAllUsers() {
            $sql = "SELECT * FROM users";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>