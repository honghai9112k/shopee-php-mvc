<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/bookstore-mvc/Admin
// http://localhost/bookstore-mvc/Product/Id?

class Product extends Controller
{
    // bookstore-mvc/Product
    function SayHi()
    {
        $addressDao = $this->dao("AddressDao");
        $bookDao = $this->dao("BookDao");
        $bookItemDao = $this->dao("BookItemDao");

        $address = $addressDao->GetAllAddress();
        $bookCategory = $bookDao->GetAllBookCategory();
        $allBook = $bookItemDao->getAllBookJoin();

        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "listProducts",
            "Book" => $allBook,
            "BookCategory"=>$bookCategory,
        ]);
    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
    function Show($id){
        $addressDao = $this->dao("AddressDao");
        $bookDao = $this->dao("BookDao");
        $bookItemDao = $this->dao("BookItemDao");
        $address = $addressDao->GetAllAddress();
        $bookCategory = $bookDao->GetAllBookCategory();
        $allBook = $bookItemDao->getAllBookJoin();

        $book = $bookDao->findBookById($id);
        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "product",
            "Book" => $allBook,
            "AllAddress"=>$address,
            "BookCategory"=>$bookCategory,
            "BookFind"=>$book
        ]);
    }
    
}
