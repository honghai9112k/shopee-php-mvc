<?php

class CustomerModel implements JsonSerializable {
    private $id_customer;
    private $name;
    private $phone;
    private $mail;
      

    public function __construct(
        $id_customer,
        $name,
        $phone,
        $mail
    ) {
        $this->id_customer = $id_customer;
        $this->name = $name;
        $this->phone = $phone;
        $this->mail = $mail;
    }

    public function jsonSerialize()
    {
        return [
            'id_customer' => $this->id_customer,
            'name' => $this->name,
            'phone' => $this->phone,
            'mail' => $this->mail
        ];
    }


        /**
         * Get the value of id_customer
         */ 
        public function getId_customer()
        {
                return $this->id_customer;
        }

        /**
         * Set the value of id_customer
         *
         * @return  self
         */ 
        public function setId_customer($id_customer)
        {
                $this->id_customer = $id_customer;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of phone
         */ 
        public function getPhone()
        {
                return $this->phone;
        }

        /**
         * Set the value of phone
         *
         * @return  self
         */ 
        public function setPhone($phone)
        {
                $this->phone = $phone;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }
}


?>