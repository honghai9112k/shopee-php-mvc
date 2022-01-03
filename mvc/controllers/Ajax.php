<?php
class Ajax extends Controller
{
    public $customerDao;
    public $cartDao;
    public $shipmentDao;
    public $bookDao;
    public $bookItemDao;

    public function __construct()
    {
        $this->customerDao =$this->logicCustomer("Customer_Implement");
        $this->cartDao = $this->logicCart("Cart_Implement");
        $this->shipmentDao = $this->logicOrder("Shipment_Implement");
        $this->bookDao = $this->logicBook("Book_Implement");
        $this->bookItemDao= $this->logicBookItem("BookItem_Implement");
    }
    public function checkUsername()
    {
        $un = $_POST["un"];
        if ($this->customerDao->checkUsername($un) == 'true') {
            echo "Username đã tồn tại.";
        }
    }
    public function minusItem()
    {
        $idBookItem = $_POST["id"];
        $check = $this->cartDao->MinusItem($idBookItem);
        if ($check) {
            echo $check;
        } else if ($check == "0") {
            echo "0";
        } else {
            echo "Fall";
        }
    }
    public function plusItem()
    {
        $idBookItem = $_POST["id"];
        $check = $this->cartDao->PlusItem($idBookItem);
        if ($check) {
            echo $check;
        } else {
            echo "Fall";
        }
    }
    public function priceShipment()
    {
        $Id_address = $_POST['idAdress'];
        $shipment = $this->shipmentDao->GetShipmentByAdress($Id_address)['Cost'];
        if ($shipment) {
            echo $shipment;
        } else {
            echo "Fall";
        }
    }
    public function searchProduct()
    {
        $key = $_POST['key'];
        $book = $this->bookDao->searchBook($key);
        $bookCategory = $this->bookDao->GetAllBookCategory();
        $cart =  $this->cartDao->GetCart();
        require_once "./mvc/views/pages/listProducts.php";
    }
    public function GetBookCategory()
    {
        $id = $_POST['idCategory'];
        if ($id) {
            $book = $this->bookDao->GetBookCategory($id);
            $bookCategory = $this->bookDao->GetAllBookCategory();
            $cart =  $this->cartDao->GetCart();
            $cateId = $id;
            require_once "./mvc/views/pages/listProducts.php";
        } else {
            $book = $this->bookItemDao->getAllBookJoin();
            $bookCategory = $this->bookDao->GetAllBookCategory();
            $cart =  $this->cartDao->GetCart();
            require_once "./mvc/views/pages/listProducts.php";
        }
    }
}
