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
        $addressDao = $this->logicAddress("Address_Implement");
        $bookDao = $this->logicBook("Book_Implement");
        $bookItemDao = $this->logicBookItem("BookItem_Implement");
        $cartDao = $this->logicCart("Cart_Implement");
        $cart = $cartDao->GetCart();

        $address = $addressDao->GetAllAddress();
        $bookCategory = $bookDao->GetAllBookCategory();
        $allBook = $bookItemDao->getAllBookJoin();

        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "listCart",
            "Book" => $allBook,
            "BookCategory" => $bookCategory,
            "Cart" => $cart
        ]);
    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
    function AddItemToCart($id_bookItem)
    {
        if (isset($_POST['addCartBtn'])||isset($_POST['orderCartBtn']) ) {
            $Amount = $_POST['Amount'];
            $cartDao = $this->logicCart("Cart_Implement");
            $check = $cartDao->AddItemToCart($id_bookItem, $Amount);
            if ($check) {
                $bookItemDao = $this->logicBookItem("BookItem_Implement");
                $bookId = $bookItemDao->GetBookByIdBookItem($id_bookItem)["Id_book"];
                header('location: http://localhost/bookstore-mvc/Product/Show/' . $bookId . '');
            } else {
                $this->view("404Page", []);
            }
        } else {
            // header('location: http://localhost/bookstore-mvc/Error');
            $this->view("404Page", []);
        }
    }
    public function DeleteAllCart()
    {
        $cartDao = $this->logicCart("Cart_Implement");
        $check = $cartDao->DeleteAllCart();
        if ($check) {
            header('location: http://localhost/bookstore-mvc/Home');
        } else {
            $this->view("404Page", []);
        }
    }
    public function DeleteCartByIdBookItem($BookItemId)
    {
        $cartDao = $this->logicCart("Cart_Implement");
        $check = $cartDao->DeleteCartByIdBookItem($BookItemId);
        if ($check) {
            header('location: http://localhost/bookstore-mvc/Cart');
        } else {
            $this->view("404Page", []);
        }
    }
}
