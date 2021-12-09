<?php
interface Customer_Implement {
    public function createAccount(CustomerModel $customerModel, AccountModel $accountModel);
    public function Login(AccountModel $accountModel);
}
?>