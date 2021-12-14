<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/bookstore-mvc/Cart
// http://localhost/bookstore-mvc/Cart

class Cart extends Controller
{
    // bookstore-mvc/Cart
    function SayHi()
    {
        $addressDao = $this->dao("AddressDao");
        $bookDao = $this->dao("BookDao");
        $bookItemDao = $this->dao("BookItemDao");
        $cartDao = $this->dao("CartDao");
        $cart = $cartDao->GetCart();

        $address = $addressDao->GetAllAddress();
        $bookCategory = $bookDao->GetAllBookCategory();
        $allBook = $bookItemDao->getAllBookJoin();
        
        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "listCart",
            "Book" => $allBook,
            "BookCategory"=>$bookCategory,
            "Cart" => $cart
        ]);
    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
}
