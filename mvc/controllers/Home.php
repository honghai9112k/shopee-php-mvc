<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
// http://localhost/bookstore-mvc/Home/Show/1/2
// http://localhost/bookstore-mvc/Home
// http://localhost/bookstore-mvc/Home/Admin

class Home extends Controller
{

    // Must have SayHi()
    function SayHi()
    {
        $bookDao = $this->dao("BookDao");
        $allBook = $bookDao->getAll();

        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "listProducts",
            "Book" => $allBook
        ]);
        //  $this->view("404Page", []);
    }

    function Error()
    {
        $this->view("404Page", []);
    }

    function Admin()
    {
        $bookDao = $this->dao("BookDao");
        $allBook = $bookDao->getAll();

        // Call Views
        $this->view("home-masterLayout", [
            "Page" => "listProducts",
            "isAdmin" => "admin",
            "Book" => $allBook
        ]);
    }

    public function createAccount()
    {
        // $createAjax = $this->controller("Ajax");
        // $err= $createAjax->createAccount();
        $err = [];
        if (isset($_POST['btnRegister'])) {
            $mail = $_POST['Mail'];
            $name = $_POST['Name'];
            $phone = $_POST['Phone'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $rPassword = $_POST['rPassword'];
            if (empty($name)) {
                $err['name'] = "Bạn chưa nhập tên.";
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
    
                $newCus = new CustomerModel('', $name, $phone, $mail);
                $newAcc = new AccountModel('', '', $username, $password);

                $customerDao = $this->dao("CustomerDao");
                $customerDao->createAccount($newCus, $newAcc);
            } else {
                $this->view("404Page", [
                    "Err" => $err
                ]);
            }
        }
    }

    public function LoginAccount()
    {
        $bookDao = $this->dao("BookDao");
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
                $customerDao = $this->dao("CustomerDao");
                
                $userCheck = $customerDao->Login($accLogin);
                // $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
                if(!isset($userCheck["faultPass"]) && !isset($userCheck["faultUsername"]) ) {
                    header('location: http://localhost/bookstore-mvc/Home');
                }else {
                    $this->view("404Page", [
                        "Err" => $err,
                        "Check"=>$userCheck
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

    public function Logout () {    
        unset($_SESSION['user']);
        header('location: http://localhost/bookstore-mvc/Home');
    }

    function Show($a, $b)
    {
        // Call Models
        $teo = $this->model("SinhVienModel");
        $tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("aodep", [
            "Page" => "news",
            "Number" => $tong,
            "Mau" => "red",
            "SoThich" => ["A", "B", "C"],
            "SV" => $teo->SinhVien()
        ]);
    }
}
