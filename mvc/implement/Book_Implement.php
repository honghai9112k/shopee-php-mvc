<?php
interface Book_Implement {
    public function getAll();
    public function createBook(BookModel $newBook,BookItemModel $newBookItem, $authorId);
    public function findBookById($Id_book);
    public function UpdateBook(BookModel $upBook,BookItemModel $upBookItem, $authorId);
    public function DeleteBook($Id_book);
}
?>