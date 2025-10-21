<?php

class BookController
{

    private $bookModel;
    function __construct(BookModel $bookModel)
    {
        $this->bookModel = $bookModel;
    }

    public function addBook($title, $description, $price, $isbn, $imageFile, $filePdf)
    {
        $this->bookModel->addBook($title, $description, $price, $isbn, $imageFile, $filePdf);
    }

    public function updateBook($id, $title, $description, $price, $isbn, $imageFile, $filePdf)
    {
        $this->bookModel->updateBook($id, $title, $description, $price, $isbn, $imageFile, $filePdf);
    }

    public function deleteBook($id)
    {
        $this->bookModel->deleteBook($id);
    }

    function getAllBooks() {
        $this->bookModel->getAllBooks();
    }

    public function getAllActiveBooks()
    {
        return $this->bookModel->getAllActiveBooks();
    }

    public function getAllBooksByUserId($id)
    {
        return $this->bookModel->getAllBooksByUserId($id);
    }

    public function getBookLikeTitle($title) {
        return $this->bookModel->getBookLikeTitle($title);
    }

    public function getAllActiveBooksWhoutAuthors() {
        return $this->bookModel->getAllActiveBooksWhoutAuthors();
    }

    public function getBookById($id) {
        return $this->bookModel->getBookById($id);
    }
    public function isBookUser($id, $id_user) {
        return $this->bookModel->isBookUser($id, $id_user);
    }
    public function getAllPurchasedBooks() {
        return $this->bookModel->getAllPurchasedBooks();
    }
    public function getAllBooksByUserIdLikeTitle($id, $title)
    {
        return $this->bookModel->getAllBooksByUserIdLikeTitle($id, $title);
    }
}