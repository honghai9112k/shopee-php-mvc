<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/logicApplication/addressDao/AddressDao.php";
class Address_Implement extends DB  implements AddressDao{
    public function GetAllAddress(){
        $sql = "SELECT * FROM address";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
         $_SESSION['address'] = $query ;
         return $query;
    }
}
?>