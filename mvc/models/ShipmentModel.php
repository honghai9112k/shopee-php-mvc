<?php

class ShipmentModel implements JsonSerializable {
    private $id_shipment;
    private $addressId;
    private $cost;
      

    public function __construct(
        $id_shipment,
        $addressId,
        $cost
    ) {
        $this->id_shipment = $id_shipment;
        $this->addressId = $addressId;
        $this->cost = $cost;
    }

    public function jsonSerialize()
    {
        return [
            'id_shipment' => $this->id_shipment,
            'addressId' => $this->addressId,
            'cost' => $this->cost
        ];
    }


        /**
         * Get the value of id_shipment
         */ 
        public function getId_shipment()
        {
                return $this->id_shipment;
        }

        /**
         * Set the value of id_shipment
         *
         * @return  self
         */ 
        public function setId_shipment($id_shipment)
        {
                $this->id_shipment = $id_shipment;

                return $this;
        }

        /**
         * Get the value of cost
         */ 
        public function getCost()
        {
                return $this->cost;
        }

        /**
         * Set the value of cost
         *
         * @return  self
         */ 
        public function setCost($cost)
        {
                $this->cost = $cost;

                return $this;
        }

        /**
         * Get the value of addressId
         */ 
        public function getAddressId()
        {
                return $this->addressId;
        }

        /**
         * Set the value of addressId
         *
         * @return  self
         */ 
        public function setAddressId($addressId)
        {
                $this->addressId = $addressId;

                return $this;
        }
}


?>