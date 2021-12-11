<?php
require_once "./mvc/implement/Customer_Implerment.php";
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";

class CustomerDao extends DB implements Customer_Implement
{
    // Tạo account và customer khi đăng ký.
    public function createAccount(CustomerModel $newCus, AccountModel $newAcc)
    {
        $result = false;

        $newname = $newCus->getName();
        $newAddr = $newCus->getAddressId();
        $newphone = $newCus->getPhone();
        $newmail = $newCus->getMail();

        $qr_customer = "INSERT INTO customer (Id_customer,AddressId, Name, Phone, Mail) 
                 VALUES (NULL,'$newAddr', '$newname'  ,'$newphone' , '$newmail' )";
        $result =  mysqli_query($this->con, $qr_customer);

        if ($result) {
            // Lấy ra id customer vừa thêm
            $idMaxQuery = mysqli_query($this->con, "SELECT MAX(Id_customer) as maxid FROM customer;");
            $idmax = mysqli_fetch_assoc($idMaxQuery)['maxid'];

            $newAcc->setCustomerId($idmax);
            $newUsername = $newAcc->getUsername();
            $newPass = $newAcc->getPassword();

            $qr_account = "INSERT INTO account (Id_account, CustomerId, Username, Password) 
                        VALUES (NULL, '$idmax', '$newUsername',' $newPass')";
            $rs =  mysqli_query($this->con, $qr_account);
            if ($rs) {
                $result = true;
                header('location: http://localhost/bookstore-mvc/Home');
            }
        }
        return json_encode($result);
    }
    // Kiểm tra xem username đã tồn tại chưa.
    public function checkUsername($un)
    {
        $qr = "SELECT Id_account FROM account WHERE Username ='$un'";
        $row = mysqli_query($this->con, $qr);
        $kq = false;
        if (mysqli_num_rows($row) > 0) {
            $kq = true;
        }
        return json_encode($kq);
    }
    // Đăng nhập
    public function Login(AccountModel $accLogin)
    {
        $check = [];
        $username = $accLogin->getUsername();
        $password = $accLogin->getPassword();

        $sql = "SELECT account.*, customer.Id_customer, customer.Name, customer.Phone, customer.Mail, customer.AddressId FROM account JOIN customer 
        ON Username = '$username' AND account.CustomerId=customer.Id_customer";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkUn = mysqli_num_rows($query);

        if ($checkUn == 1) {
            // $checkPass = password_verify($password, $data['Password']);
            $checkPass = ($password == $data['Password']) ? true : false;
            if ($checkPass) {
                $_SESSION['user'] = $data;
            } else {
                $check['faultPass'] = "Sai mật khẩu.";
            }
        } else {
            $check['faultUsername'] = "Không tồn tại Username.";
        }
        return $check;
    }
    // Chỉnh sửa thông tin cá nhân
    public function UpdateAccount(CustomerModel $customer)
    {

        $id_customer = $customer->getId_customer();
        $name = $customer->getName();
        $phone = $customer->getPhone();
        $mail = $customer->getMail();
        $addressId = $customer->getAddressId();

        $sql = "UPDATE customer SET Name ='$name', Phone='$phone', Mail='$mail', AddressId = '$addressId'
            WHERE Id_customer = $id_customer ";
        $query = mysqli_query($this->con, $sql);
        $check = false;
        if ($query) {
            $check = true;
            $this->UpdateSessionUser();
        }
        return $check;
    }
    // Cập nhật lại $_SESSION['user'] (sau khi update user)
    public function UpdateSessionUser()
    {
        $Id_customer = $_SESSION['user']["Id_customer"];
        $sql = "SELECT account.*, customer.Id_customer, customer.Name, customer.Phone, customer.Mail, customer.AddressId FROM account JOIN customer 
             ON Id_customer = '$Id_customer' AND account.CustomerId=customer.Id_customer";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $data;
        return $_SESSION['user'];
    }

}
