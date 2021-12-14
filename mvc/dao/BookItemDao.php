<?php
require_once "./mvc/implement/BookItem_Implement.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";

class BookItemDao extends DB implements BookItem_Implement
{
    // private $listBook;

    // public function __construct()
    // {
    //     $this->listBook = array();
    // }

    public function getAllBookJoin()
    {
        $sql = "SELECT book.*, bookitem.*,
        bookcategory.Name AS 'CategoryName', 
        publisher.Name AS 'publisherName', publisher.Address AS 'publisherAddress',
        author.Name AS 'AuthorName', author.Email AS 'AuthorEmail', author.Biography
        FROM book, bookitem , bookcategory,publisher, author, book_author
        WHERE 
                book.Id_book =bookitem.BookId AND 
                book.BookCategoryId =bookcategory.Id_category AND 
                book.PublisherId = publisher.Id_publisher AND
                author.Id_author =book_author.AuthorId AND
                book.Id_book =book_author.BookId
        ";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    /*
    SELECT book.*, bookitem.*,author.*,publisher.*,bookcategory.*  FROM book JOIN bookitem JOIN author JOIN book_author JOIN publisher JOIN bookcategory ON 
        book.Id_book =bookitem.BookId AND 
        book.BookCategoryId =bookcategory.Id_category AND 
        book.PublisherId =publisher.Id_publisher AND 
        book.Id_book = book_author.BookId AND
        author.Id_author = book_author.AuthorId
    */
    public function DeleteBookItem($Id_book) {
        $check = false;
        $sql = "DELETE FROM bookitem WHERE bookitem.BookId = '$Id_book'";
        $query = mysqli_query($this->con, $sql);
        if($query) {
            $check = true;
        }
        return $check;
    }
}
