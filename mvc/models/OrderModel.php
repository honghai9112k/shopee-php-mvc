<?php

class OrderModel implements JsonSerializable {
    private $id_order;
    private $paymentId;
    private $shipmentId;
    private $customerId;
    private $cartId;
    private $totalPrice;
    private $status;
    private $deliveryDate;
      

    public function __construct(
        $id_order,
        $paymentId,
        $shipmentId,
        $customerId,
        $cartId,
        $totalPrice,
        $status,
        $deliveryDate,
    ) {
        $this->id_order = $id_order;
        $this->paymentId = $paymentId;
        $this->shipmentId = $shipmentId;
        $this->customerId = $customerId;
        $this->cartId = $cartId;
        $this->totalPrice = $totalPrice;
        $this->status = $status;
        $this->deliveryDate = $deliveryDate;
    }

    public function jsonSerialize()
    {
        return [
            'id_order' => $this->id_order,
            'paymentId' => $this->paymentId,
            'shipmentId' => $this->shipmentId,
            'customerId' => $this->customerId,
            'cartId' => $this->cartId,
            'totalPrice' => $this->totalPrice,
            'status' => $this->status,
            'deliveryDate' => $this->deliveryDate,
        ];
    }


        /**
         * Get the value of id_order
         */ 
        public function getId_order()
        {
                return $this->id_order;
        }

        /**
         * Set the value of id_order
         *
         * @return  self
         */ 
        public function setId_order($id_order)
        {
                $this->id_order = $id_order;

                return $this;
        }

        /**
         * Get the value of paymentId
         */ 
        public function getPaymentId()
        {
                return $this->paymentId;
        }

        /**
         * Set the value of paymentId
         *
         * @return  self
         */ 
        public function setPaymentId($paymentId)
        {
                $this->paymentId = $paymentId;

                return $this;
        }

        /**
         * Get the value of shipmentId
         */ 
        public function getShipmentId()
        {
                return $this->shipmentId;
        }

        /**
         * Set the value of shipmentId
         *
         * @return  self
         */ 
        public function setShipmentId($shipmentId)
        {
                $this->shipmentId = $shipmentId;

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
         * Get the value of totalPrice
         */ 
        public function getTotalPrice()
        {
                return $this->totalPrice;
        }

        /**
         * Set the value of totalPrice
         *
         * @return  self
         */ 
        public function setTotalPrice($totalPrice)
        {
                $this->totalPrice = $totalPrice;

                return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        /**
         * Get the value of deliveryDate
         */ 
        public function getDeliveryDate()
        {
                return $this->deliveryDate;
        }

        /**
         * Set the value of deliveryDate
         *
         * @return  self
         */ 
        public function setDeliveryDate($deliveryDate)
        {
                $this->deliveryDate = $deliveryDate;

                return $this;
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
}


?>