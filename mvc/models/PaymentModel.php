<?php

class PaymentModel implements JsonSerializable {
    private $id_payment;
    private $paymentType;
      

    public function __construct(
        $id_payment,
        $paymentType
    ) {
        $this->id_payment = $id_payment;
        $this->paymentType = $paymentType;
    }

    public function jsonSerialize()
    {
        return [
            'id_payment' => $this->id_payment,
            'paymentType' => $this->paymentType
        ];
    }


        /**
         * Get the value of id_payment
         */ 
        public function getId_payment()
        {
                return $this->id_payment;
        }

        /**
         * Set the value of id_payment
         *
         * @return  self
         */ 
        public function setId_payment($id_payment)
        {
                $this->id_payment = $id_payment;

                return $this;
        }

        /**
         * Get the value of paymentType
         */ 
        public function getPaymentType()
        {
                return $this->paymentType;
        }

        /**
         * Set the value of paymentType
         *
         * @return  self
         */ 
        public function setPaymentType($paymentType)
        {
                $this->paymentType = $paymentType;

                return $this;
        }
}


?>