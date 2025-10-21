<?php

    class AuthorDTO {

        private $con;
        public function __construct($pdo) {
            $this->con = $pdo;
        }

        public function addAuthor($name) {
            $sql = "INSERT INTO authors (name) VALUES (:name)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        }

        public function getAllAuthors() {
            $sql = "SELECT * FROM authors";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $authors;
        }

        public function getAuthorById($id) {
            $sql = "SELECT * FROM authors WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $author = $stmt->fetch(PDO::FETCH_ASSOC);
            return $author;
        }

        public function deleteAuthor($id) {
            //Delete table book_author
            $sql = "DELETE FROM book_author WHERE id_author = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            //Delete author itself
            $sql = "DELETE FROM authors WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function updateAuthor($id, $name) {
            $sql = "UPDATE authors SET name = :name WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function setAuthorBook($id_author, $id_book) {
            $sql = "INSERT INTO book_author (id_author, id_book) VALUES (:id_author, :id_book)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_author', $id_author);
            $stmt->bindParam(':id_book', $id_book);
            $stmt->execute();
        }

        public function removeAuthorBook($id_author, $id_book) {
            $sql = "DELETE FROM book_author WHERE id_author = :id_author AND id_book = :id_book";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_author', $id_author);
            $stmt->bindParam(':id_book', $id_book);
            $stmt->execute();
        }
        public function getAllBookByAuthor() {
            $sql = "SELECT 
                        authors.id AS id_author,
                        authors.name AS author_name,
                        books.id AS id_book,
                        books.title AS book_title
                    FROM 
                        book_author
                    JOIN 
                        authors ON book_author.id_author = authors.id
                    JOIN 
                        books ON book_author.id_book = books.id;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $authors;
        }

        public function updateAuthorBook($id_author, $id_book, $new_id_author, $new_id_book) {
            $sql = "UPDATE book_author SET id_author = :new_id_author, id_book = :new_id_book WHERE id_author = :id_author AND id_book = :id_book";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id_author', $id_author);
            $stmt->bindParam(':id_book', $id_book);
            $stmt->bindParam(':new_id_author', $new_id_author);
            $stmt->bindParam(':new_id_book', $new_id_book);
            $stmt->execute();
        }   
    }

?>