<?php
require_once "./mvc/implement/Order_Implement.php";
require_once "./mvc/models/OrderModel.php";
require_once "./mvc/models/BookItemModel.php";

class OrderDao extends DB implements Order_Implement
{
    public function GetOrder()
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

}
