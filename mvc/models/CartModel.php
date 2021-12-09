<?php

class CartModel implements JsonSerializable {
    private $id_cart;
    private $amount;
      

    public function __construct(
        $id_cart,
        $amount
    ) {
        $this->id_cart = $id_cart;
        $this->amount = $amount;
    }

    public function jsonSerialize()
    {
        return [
            'id_cart' => $this->id_cart,
            'amount' => $this->amount
        ];
    }


        /**
         * Get the value of id_cart
         */ 
        public function getId_cart()
        {
                return $this->id_cart;
        }

        /**
         * Set the value of id_cart
         *
         * @return  self
         */ 
        public function setId_cart($id_cart)
        {
                $this->id_cart = $id_cart;

                return $this;
        }

        /**
         * Get the value of amount
         */ 
        public function getAmount()
        {
                return $this->amount;
        }

        /**
         * Set the value of amount
         *
         * @return  self
         */ 
        public function setAmount($amount)
        {
                $this->amount = $amount;

                return $this;
        }
}


?>