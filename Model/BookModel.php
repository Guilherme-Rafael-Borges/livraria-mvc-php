<?php


class BookModel
{
    private $bookDTO;
    public function __construct(BookDTO $bookDTO)
    {
        $this->bookDTO = $bookDTO;
    }

    public function addBook($title, $description, $price, $isbn, $imageFile, $filePdf)
    {
        return $this->bookDTO->addBook($title, $description, $price, $isbn, $imageFile, $filePdf);
    }

    public function getAllBooksByUserIdLikeTitle($id, $title)
    {
        return $this->bookDTO->getAllBooksByUserIdLikeTitle($id, $title);
    }
    public function updateBook($id, $title, $description, $price, $isbn, $imageFile, $filePdf)
    {
        return $this->bookDTO->updateBook($id, $title, $description, $price, $isbn, $imageFile, $filePdf);
    }

    public function getAllBooks()
    {
        return $this->bookDTO->getAllBooks();
    }

    public function deleteBook($id)
    {
        return $this->bookDTO->deleteBook($id);
    }
    
    public function getBookById($id)
    {
        return $this->bookDTO->getBookById($id);
    }

    public function getAllActiveBooks()
    {
        return $this->bookDTO->getAllActiveBooks();
    }

    public function getAllBooksByUserId($id)
    {
        return $this->bookDTO->getAllBooksByUserId($id);
    }

    public function getBookLikeTitle($title){
        return $this->bookDTO->getBookLikeTitle($title);}

    public function isBookUser($id, $id_user){
        return $this->bookDTO->isBookUser($id, $id_user);
    }
    public function getAllPurchasedBooks(){
        return $this->bookDTO->getAllPurchasedBooks();
    }
    public function getAllActiveBooksWhoutAuthors(){
        return $this->bookDTO->getAllActiveBooksWhoutAuthors();
    }
    
}