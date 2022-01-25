<?php
// http://localhost/shopee-php-mvc-dao/Admin
// http://localhost/shopee-php-mvc-dao/Product/Id?

class Product extends Controller
{
    // shopee-php-mvc-dao/Product
    function SayHi()
    {
        $addressDao = $this->logicAddress("Address_Implement");
        $bookDao = $this->logicBook("Book_Implement");
        $bookItemDao = $this->logicBookItem("BookItem_Implement");

        $address = $addressDao->GetAllAddress();
        $bookCategory = $bookDao->GetAllBookCategory();
        $allBook = $bookItemDao->getAllBookJoin();
        $cartDao = $this->logicCart("Cart_Implement");
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
        $addressDao = $this->logicAddress("Address_Implement");
        $bookDao = $this->logicBook("Book_Implement");
        $bookItemDao = $this->logicBookItem("BookItem_Implement");
        $address = $addressDao->GetAllAddress();
        
        $allBook = $bookItemDao->getAllBookJoin();
        $cartDao = $this->logicCart("Cart_Implement");
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
