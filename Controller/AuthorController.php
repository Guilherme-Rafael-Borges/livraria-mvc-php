<?php

    class AuthorController {

        private $authorModel;
        public function __construct(AuthorModel $authorModel) {
            $this->authorModel = $authorModel;
        }

        public function getAllAuthors() {
            return $this->authorModel->getAllAuthors();
        }

        public function getAuthorById($id) {
            return $this->authorModel->getAuthorById($id);
        }

        public function addAuthor($name) {
            return $this->authorModel->addAuthor($name);
        }

        public function updateAuthor($id, $name) {
            return $this->authorModel->updateAuthor($id, $name);
        }

        public function deleteAuthor($id) {
            return $this->authorModel->deleteAuthor($id);
        }

        public function setAuthorBook($id_author, $id_book) {
            return $this->authorModel->setAuthorBook($id_author, $id_book);
        }

        public function removeAuthorBook($id_author, $id_book) {
            return $this->authorModel->removeAuthorBook($id_author, $id_book);
        }

        public function getAllBookByAuthor() {
            return $this->authorModel->getAllBookByAuthor();
        }


        public function updateAuthorBook($id_author, $id_book, $new_id_author, $new_id_book) {
            return $this->authorModel->updateAuthorBook($id_author, $id_book, $new_id_author, $new_id_book);
        }

    }

?>