<?php
class Ajax extends Controller
{
    public $customerDao;
    public $cartDao;

    public function __construct()
    {
        $this->customerDao = $this->dao("CustomerDao");
        $this->cartDao = $this->dao("CartDao");
    }
    public function checkUsername()
    {
        $un = $_POST["un"];
        if($this->customerDao->checkUsername($un)=='true'){
            echo "Username đã tồn tại.";
        }
    }
    public function addCart() {
        echo $this->cartDao->CountCart();
    }
}
