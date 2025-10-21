<?php

    class AuthorModel
    {
        private $authorDTO;
        public function __construct(AuthorDTO $authorDTO)
        {
            $this->authorDTO = $authorDTO;
        }

        public function addAuthor($name) {
            $this->authorDTO->addAuthor($name);
        }

        public function deleteAuthor($id) {
            $this->authorDTO->deleteAuthor($id);
        }

        public function updateAuthor($id, $name) {
            $this->authorDTO->updateAuthor($id, $name);
        }

        public function setAuthorBook($id_author, $id_book) {
            $this->authorDTO->setAuthorBook($id_author, $id_book);
        }

        public function getAllAuthors() {
            return $this->authorDTO->getAllAuthors();
        }

        public function getAuthorById($id) {
            return $this->authorDTO->getAuthorById($id);
        }

        public function removeAuthorBook($id_author, $id_book) {
            $this->authorDTO->removeAuthorBook($id_author, $id_book);
        }
        public function getAllBookByAuthor() {
            return $this->authorDTO->getAllBookByAuthor();
        }
        public function updateAuthorBook($id_author, $id_book, $new_id_author, $new_id_book) {
            $this->authorDTO->updateAuthorBook($id_author, $id_book, $new_id_author, $new_id_book);
        }
    }

?>