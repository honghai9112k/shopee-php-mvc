<?php
class Ajax extends Controller
{
    public $customerDao;

    public function __construct()
    {
        $this->customerDao = $this->dao("CustomerDao");
    }
    public function checkUsername()
    {
        $un = $_POST["un"];
        if($this->customerDao->checkUsername($un)=='true'){
            echo "Username đã tồn tại.";
        }
    }
}
