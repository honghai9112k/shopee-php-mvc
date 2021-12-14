<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/bookstore-mvc/
// http://localhost/bookstore-mvc/User/purchase

class User extends Controller
{
    // bookstore-mvc/User
    function Purchase()
    {
        $addressDao = $this->dao("AddressDao");
        $bookItemDao = $this->dao("BookItemDao");
        $address = $addressDao->GetAllAddress();
        $bookDao = $this->dao("BookDao");
        $allBook = $bookItemDao->getAllBookJoin();
        $bookCategory = $bookDao->GetAllBookCategory();
        $cartDao = $this->dao("CartDao");
        $cart = $cartDao->GetCart();

        $this->view("userHome", [
            "Page" => "listProducts",
            "isAdmin" => "admin",
            "Book" => $allBook,
            "Address" => $address,
            "BookCategory" => $bookCategory,
        ]);

    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
}
