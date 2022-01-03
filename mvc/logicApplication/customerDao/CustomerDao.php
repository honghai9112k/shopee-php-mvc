<?php
interface CustomerDao
{
    public function createAccount(CustomerModel $customerModel, AccountModel $accountModel);
    public function Login(AccountModel $accountModel);
    public function UpdateAccount(CustomerModel $customer);
    public function UpdateSessionUser();
}
