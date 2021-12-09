<?php
require_once "./mvc/implement/Book_Implement.php";
require_once "./mvc/models/BookModel.php";

class BookDao extends DB implements Book_Implement
{
    // private $listBook;

    // public function __construct()
    // {
    //     $this->listBook = array();
    // }

    public function getAll()
    {
        $qr = "SELECT * FROM book";
        $result =  mysqli_query($this->con, $qr);
        // $list_books = mysqli_fetch_array($result);
         $list_books = $result;

        $list = array();
        foreach ($list_books as $book) {
            array_push($list, new BookModel(
                $book["Id_book"],
                $book["BookCategoryId"],
                $book["PublisherId"],
                $book["ISBN"],
                $book["Title"],
                $book["Summary"],
                $book["PublicationDate"],
                $book["NumberOfPage"],
                $book["Language"],
                $book["SoldNumber"],
            ));
        }
        return $list;
    }
}

?>