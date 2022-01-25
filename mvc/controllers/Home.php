<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/CartModel.php";
require_once "./mvc/models/CartBookItemModel.php";
// http://localhost/shopee-php-mvc-dao/Home/Show/1/2
// http://localhost/shopee-php-mvc-dao/Home

class Home extends Controller
{

    // shopee-php-mvc-dao/Home
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

        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "listProducts",
            "Book" => $allBook,
            "BookCategory" => $bookCategory,
            "Cart" => $cart
        ]);
        //  $this->view("404Page", []);
    }

    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
    //  Đăng ký
    public function createAccount()
    {
        // $createAjax = $this->controller("Ajax");
        // $err= $createAjax->createAccount();
        $err = [];
        if (isset($_POST['btnRegister'])) {
            $addressId = $_POST['addressId'];
            $mail = $_POST['Mail'];
            $name = $_POST['Name'];
            $phone = $_POST['Phone'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $rPassword = $_POST['rPassword'];
            if (empty($name)) {
                $err['name'] = "Bạn chưa nhập tên.";
            }
            if (empty($addressId)) {
                $err['addressId'] = "Bạn chưa nhập Dia chi.";
            }
            if (empty($mail)) {
                $err['mail'] = "Bạn chưa nhập email.";
            }
            if (empty($phone)) {
                $err['phone'] = "Bạn chưa nhập Số điện thoại.";
            }
            if (empty($password)) {
                $err['password'] = "Bạn chưa nhập password.";
            }
            if ($rPassword != $password) {
                $err['rPassword'] = "Mật khẩu không trùng khớp.";
            }

            if (empty($err)) {
                // $pass = password_hash($password, PASSWORD_DEFAULT);

                $newCus = new CustomerModel('', $addressId, $name, $phone, $mail);
                $newAcc = new AccountModel('', '', $username, $password);

                $customerDao = $this->logicCustomer("Customer_Implement");
                $customerDao->createAccount($newCus, $newAcc);
            } else {
                $this->view("404Page", [
                    "Err" => $err
                ]);
            }
        }
    }
    // Đăng nhập
    public function LoginAccount()
    {
        $bookDao = $this->logicBook("Book_Implement");
        $allBook = $bookDao->getAll();
        $err = [];
        // $userCheck =[];
        if (isset($_POST['btnLogin'])) {
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            if (empty($username)) {
                $err['username'] = "Bạn chưa nhập tên.";
            }
            if (empty($password)) {
                $err['password'] = "Bạn chưa nhập password.";
            }
            if (empty($err)) {
                $accLogin = new AccountModel('', '', $username, $password);
                $customerDao = $this->logicCustomer("Customer_Implement");

                $userCheck = $customerDao->Login($accLogin);
                // $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
                if (!isset($userCheck["faultPass"]) && !isset($userCheck["faultUsername"])) {
                    header('location: http://localhost/shopee-php-mvc-dao/Home');
                } else {
                    $this->view("404Page", [
                        "Err" => $err,
                        "Check" => $userCheck
                    ]);
                }
            } else {
                $this->view("404Page", [
                    "Err" => $err
                ]);
            }
        }
        // $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    }
    //  Đăng xuất
    public function Logout()
    {
        unset($_SESSION['user']);
        header('location: http://localhost/shopee-php-mvc-dao/Home');
    }
    // Cập nhật info tài khoản
    public function UpdateAccount()
    {
        if (isset($_POST['btnUpdateInfo'])) {
            $id_customer = $_SESSION['user']["Id_customer"];
            $addressId = $_POST['upAddressId'];
            $mail = $_POST['upMail'];
            $name = $_POST['upName'];
            $phone = $_POST['upPhone'];

            $customer = new CustomerModel($id_customer, $addressId, $name, $phone, $mail);
            $customerDao = $this->logicCustomer("Customer_Implement");

            $check = $customerDao->UpdateAccount($customer);
            if ($check) {
                header('location: http://localhost/shopee-php-mvc-dao/Home');
            } else {
                $this->view("404Page", []);
            }
        }
    }

}
