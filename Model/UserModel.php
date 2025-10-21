<?php

    class UserModel {

        private $userDTO;
        public function __construct(UserDTO $userDTO) {
            $this->userDTO = $userDTO;
        }

        public function login($email, $password, $secret) {
            return $this->userDTO->login($email, $password, $secret);
        }
        public function register($name, $email, $password, $admin, $secret) {
            $aunthy = $this->userDTO->register($name, $email, $password, $admin, $secret);
            if($aunthy == null)
            {
                $this->userDTO->login($email, $password, $secret);
            } else {
                return $aunthy;
            }
            
        }

        public function getIdByEmail($id) {
            return $this->userDTO->getIdByEmail($id);
        }

        public function makePurchase($id_book, $id_user, $price){
            return $this->userDTO->makePurchase($id_book, $id_user, $price);
        }

        public function getAllUsers() {
            return $this->userDTO->getAllUsers();
        }
    }

?>