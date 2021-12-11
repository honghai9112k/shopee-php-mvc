<?php
interface Book_Implement {
    public function getAll();
    public function createBook(BookModel $newBook,BookItemModel $newBookItem, $authorId);
}
?>