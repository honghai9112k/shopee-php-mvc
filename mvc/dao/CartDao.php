<?php
require_once "./mvc/implement/Cart_Implement.php";
require_once "./mvc/models/CartModel.php";
require_once "./mvc/models/BookItemModel.php";

class CartDao extends DB implements Cart_Implement
{

    public function GetCart()
    {
        $sql = "SELECT cart.*, bookitem.*, book.*,cart_bookitem.Amount, A.CountItem
        FROM book, bookitem , cart, cart_bookitem,
        (SELECT cart_bookitem.CartId, COUNT(BookItemId) AS CountItem 
                FROM cart_bookitem GROUP BY cart_bookitem.CartId) AS A
        WHERE 
            book.Id_book =bookitem.BookId AND 
            cart.Id_cart =cart_bookitem.CartId AND
            bookitem.Id_bookItem =cart_bookitem.BookItemId
        ";
        $query = mysqli_query($this->con, $sql);
        $_SESSION['cart'] = $query;
        return $query;
    }
    public function CountCart()
    {
        $sql = "SELECT cart_bookitem.CartId, COUNT(BookItemId) AS CountItem 
                FROM cart_bookitem GROUP BY cart_bookitem.CartId";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        return $data["CountItem"];
    }
    /*
    SELECT book.*, bookitem.*,author.*,publisher.*,bookcategory.*  FROM book JOIN bookitem JOIN author JOIN book_author JOIN publisher JOIN bookcategory ON 
        book.Id_book =bookitem.BookId AND 
        book.BookCategoryId =bookcategory.Id_category AND 
        book.PublisherId =publisher.Id_publisher AND 
        book.Id_book = book_author.BookId AND
        author.Id_author = book_author.AuthorId
    */
    // public function DeleteBookItem($Id_book) {
    //     $check = false;
    //     $sql = "DELETE FROM bookitem WHERE bookitem.BookId = '$Id_book'";
    //     $query = mysqli_query($this->con, $sql);
    //     if($query) {
    //         $check = true;
    //     }
    //     return $check;
    // }
}
