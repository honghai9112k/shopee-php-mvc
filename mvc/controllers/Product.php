<?php
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
        $cartDao = $this->dao("CartDao");
        $cart = $cartDao->GetCart();

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
        
        $allBook = $bookItemDao->getAllBookJoin();
        $cartDao = $this->dao("CartDao");
        $cart = $cartDao->GetCart();

        $bookFind = $bookDao->findBookById($id);
        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "product",
            "Book" => $allBook,
            "AllAddress"=>$address,
            "BookFind"=>$bookFind
        ]);
    }

}
