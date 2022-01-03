<?php
require_once "./mvc/logicApplication/orderDao/OrderDao.php";
require_once "./mvc/models/OrderModel.php";
require_once "./mvc/models/BookItemModel.php";

class Order_Implement extends DB implements OrderDao{
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
    public function CreateOrder(OrderModel $newOrder)
    {
        $Id_payment = $newOrder->getPaymentId();
        $ShipmentId = $newOrder->getShipmentId();
        $CustomerId = $newOrder->getCustomerId();
        $CartId = $newOrder->getCartId();
        $TotalPrice = $newOrder->getTotalPrice();
        $Status = $newOrder->getStatus();
        $DeliveryDate = $newOrder->getDeliveryDate();

        $qr_order = "INSERT INTO `order` (Id_order, PaymentId, ShipmentId, CustomerId, CartId, TotalPrice, Status, DeliveryDate) 
        VALUES (NULL, '$Id_payment', '$ShipmentId', '$CustomerId', '$CartId', '$TotalPrice', '$Status', '$DeliveryDate')";
        $result =  mysqli_query($this->con, $qr_order);
        return $result;
    }
    public function plusSoldNumberBook($CartId)
    {
        // Lấy ra các Id book
        // thêm
    }
    public function GetAllOrder()
    {
        $sql = "SELECT `order`.* , bookitem.*, book.Title, shipment.Cost, cart_bookitem.*, bookcategory.Name AS 'NameCate'  FROM `order`,bookitem,book,shipment,cart, cart_bookitem, bookcategory
        WHERE `order`.ShipmentId = shipment.Id_shipment AND `order`.CartId = cart.Id_cart AND  
        cart_bookitem.CartId = cart.Id_cart AND cart_bookitem.BookItemId = bookitem.Id_bookItem 
        AND bookitem.BookId = book.Id_book AND bookcategory.Id_category = book.BookCategoryId";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function DeleteOrder($Id_order)
    {
        $sql = "DELETE FROM `order` WHERE Id_order='$Id_order'";
        $query = mysqli_query($this->con, $sql);
        if ($query) {
            $cartId = 1;
            $sql_cart = "DELETE FROM cart_bookitem WHERE cart_bookitem.CartId='$cartId'";
            $query_cart = mysqli_query($this->con, $sql_cart);
            return $query_cart;
        }
        return $query;

    }
}
