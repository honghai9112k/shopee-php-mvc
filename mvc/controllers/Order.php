<?php
require_once "./mvc/models/OrderModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/shopee-php-mvc-dao/Cart
// http://localhost/shopee-php-mvc-dao/Cart

class Order extends Controller
{
    // shopee-php-mvc-dao/Cart
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

        $shipmentDao = $this->logicOrder("Shipment_Implement");
        $shipmentSession = $shipmentDao->GetShipmentByAdress($_SESSION['user']['AddressId']);
        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "order",
            "Book" => $allBook,
            "BookCategory" => $bookCategory,
            "Cart" => $cart,
            "ShipmentSesstion" => $shipmentSession,
        ]);
    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
    function CreateOrder()
    {
        $cartDao = $this->logicCart("Cart_Implement");
        $shipmentDao = $this->logicOrder("Shipment_Implement");
        $orderDao = $this->logicOrder("Order_Implement");

        if (isset($_POST['orderButton'])) {
            $Id_payment = $_POST['radioPayment'];
            $AddressId = $_POST['addressIdOrder'];
            $CustomerId = $_SESSION['user']['Id_customer'];
            $CartId = $cartDao->getCartId();
            $TotalPrice = $_POST['TotalPrice'];
            $Status = "Đang chuẩn bị hàng";
            $DeliveryDate = date('Y/m/d', mktime(0, 0, 0, date('m'), (date('d') + 5), date('Y')));

            $ShipmentId = $shipmentDao->GetShipmentByAdress($AddressId)['Id_shipment'];

            $newOrder = new OrderModel('', $Id_payment, $ShipmentId, $CustomerId, $CartId, $TotalPrice, $Status, $DeliveryDate);
            $check = $orderDao->CreateOrder($newOrder);
            if ($check) {
                header('location: http://localhost/shopee-php-mvc-dao/User/Purchase');
            } else {
                $this->view("404Page", []);
            }
        }
    }
    public function DeleteOrder ($Id_order) {
        $orderDao = $this->logicOrder("Order_Implement");
        $check = $orderDao->DeleteOrder($Id_order);
        if ($check) {
            header('location: http://localhost/shopee-php-mvc-dao/User/Purchase');
        } else {
            $this->view("404Page", []);
        }
    }
}
