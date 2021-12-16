<?php
interface Order_Implement {
    public function GetOrder();
    public function CreateOrder(OrderModel $newOrder);
}
?>