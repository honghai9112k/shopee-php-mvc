<?php

class AccountModel implements JsonSerializable {
    private $id_account;
    private $customerId;
    private $username;
    private $password;
      

    public function __construct(
        $id_account,
        $customerId,
        $username,
        $password
    ) {
        $this->id_account = $id_account;
        $this->customerId = $customerId;
        $this->username = $username;
        $this->password = $password;
    }

    public function jsonSerialize()
    {
        return [
            'id_account' => $this->id_account,
            'customerId' => $this->customerId,
            'username' => $this->username,
            'password' => $this->password
        ];
    }


        /**
         * Get the value of id_account
         */ 
        public function getId_account()
        {
                return $this->id_account;
        }

        /**
         * Set the value of id_account
         *
         * @return  self
         */ 
        public function setId_account($id_account)
        {
                $this->id_account = $id_account;

                return $this;
        }

        /**
         * Get the value of customerId
         */ 
        public function getCustomerId()
        {
                return $this->customerId;
        }

        /**
         * Set the value of customerId
         *
         * @return  self
         */ 
        public function setCustomerId($customerId)
        {
                $this->customerId = $customerId;

                return $this;
        }

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
}


?>