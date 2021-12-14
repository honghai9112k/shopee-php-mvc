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
        if (isset($_POST['addCartBtn'])) {
            $Amount = $_POST['Amount'];
            $cartDao = $this->dao("CartDao");
            $check = $cartDao->AddItemToCart($id_bookItem, $Amount );
            if ($check) {
                $bookItemDao = $this->dao("BookItemDao");
                $bookId = $bookItemDao->GetBookByIdBookItem($id_bookItem)["Id_book"];
                header('location: http://localhost/bookstore-mvc/Product/Show/'.$bookId.'');
            } else {
                $this->view("404Page", [
                ]);
            }
        }else {
            // header('location: http://localhost/bookstore-mvc/Error');
            $this->view("404Page", [
            ]);
        }
    }
    public function DeleteAllCart(){
        $cartDao = $this->dao("CartDao");
        $check = $cartDao->DeleteAllCart();
        if($check) {
            header('location: http://localhost/bookstore-mvc/Home');
        }else {
            $this->view("404Page", [
            ]);
        }
    }
}
