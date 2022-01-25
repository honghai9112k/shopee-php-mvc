<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/shopee-php-mvc-dao/
// http://localhost/shopee-php-mvc-dao/User/purchase

class User extends Controller
{
    // shopee-php-mvc-dao/User
    function Purchase()
    {
        $addressDao = $this->logicAddress("Address_Implement");
        $bookItemDao = $this->logicBookItem("BookItem_Implement");
        $address = $addressDao->GetAllAddress();
        $bookDao = $this->logicBook("Book_Implement");
        $allBook = $bookItemDao->getAllBookJoin();
        $bookCategory = $bookDao->GetAllBookCategory();

        $cartDao = $this->logicCart("Cart_Implement");
        $cart = $cartDao->GetCart();

        $orderDao = $this->logicOrder("Order_Implement");
        $order = $orderDao->GetAllOrder();

        $this->view("userHome", [
            "Page" => "listProducts",
            "isAdmin" => "admin",
            "Book" => $allBook,
            "Address" => $address,
            "BookCategory" => $bookCategory,
            "Order"=>$order,
        ]);

    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
}
