<?php
interface Order_Implement {
    public function GetOrder();
    public function CreateOrder(OrderModel $newOrder);
    public function GetAllOrder();
    public function DeleteOrder($Id_order);
}
?>