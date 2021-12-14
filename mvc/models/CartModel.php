<?php

class CartModel implements JsonSerializable {
    private $id_cart;
      

    public function __construct(
        $id_cart
    ) {
        $this->id_cart = $id_cart;
    }

    public function jsonSerialize()
    {
        return [
            'id_cart' => $this->id_cart,
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
}


?>