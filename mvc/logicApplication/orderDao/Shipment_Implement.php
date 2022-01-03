<?php
require_once "./mvc/logicApplication/orderDao/ShipmentDao.php";
require_once "./mvc/models/OrderModel.php";
require_once "./mvc/models/BookItemModel.php";
class Shipment_Implement extends DB implements ShipmentDao{
    public function GetShipmentByAdress($AddressId)
    {
        $sql = "SELECT shipment.*, address.*
        FROM shipment, address
        WHERE 
        shipment.AddressId =address.Id_address AND 
        shipment.AddressId ='$AddressId'
        ";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        return $data;
    }

}
