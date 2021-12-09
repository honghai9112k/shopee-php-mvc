<?php

class ShipmentModel implements JsonSerializable {
    private $id_shipment;
    private $cost;
    private $address;
      

    public function __construct(
        $id_shipment,
        $cost,
        $address
    ) {
        $this->id_shipment = $id_shipment;
        $this->cost = $cost;
        $this->address = $address;
    }

    public function jsonSerialize()
    {
        return [
            'id_shipment' => $this->id_shipment,
            'cost' => $this->cost,
            'address' => $this->address
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
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }
}


?>