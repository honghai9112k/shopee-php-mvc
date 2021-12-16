<?php
require_once "./mvc/implement/Shipment_Implement.php";
require_once "./mvc/models/OrderModel.php";
require_once "./mvc/models/BookItemModel.php";

class ShipmentDao extends DB implements Shipment_Implement
{
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
