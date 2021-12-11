<?php
require_once "./mvc/implement/Address_Implement.php";
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";

class AddressDao extends DB implements Address_Implement
{
    public function GetAllAddress()
    {
        $sql = "SELECT * FROM address";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
         $_SESSION['address'] = $query ;
         return $query;
    }
}
