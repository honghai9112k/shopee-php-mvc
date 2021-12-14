<?php

class CartBookItemModel implements JsonSerializable {
    private $cartId;
    private $bookItemId;
    private $amount;

    public function __construct(
        $cartId,
        $bookItemId,
        $amount,
    ) {
        $this->cartId = $cartId;
        $this->bookItemId = $bookItemId;
        $this->amount = $amount;
    }

    public function jsonSerialize()
    {
        return [
            'cartId' => $this->cartId,
            'bookItemId' => $this->bookItemId,
            'amount' => $this->amount,
        ];
    }
 

        /**
         * Get the value of cartId
         */ 
        public function getCartId()
        {
                return $this->cartId;
        }

        /**
         * Set the value of cartId
         *
         * @return  self
         */ 
        public function setCartId($cartId)
        {
                $this->cartId = $cartId;

                return $this;
        }

        /**
         * Get the value of bookItemId
         */ 
        public function getBookItemId()
        {
                return $this->bookItemId;
        }

        /**
         * Set the value of bookItemId
         *
         * @return  self
         */ 
        public function setBookItemId($bookItemId)
        {
                $this->bookItemId = $bookItemId;

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