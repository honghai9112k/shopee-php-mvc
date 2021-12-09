<?php

class AddressModel implements JsonSerializable {
    private $id_address;
    private $numberHouse;
    private $street;
    private $district;
    private $city;
    private $nation;
      

    public function __construct(
        $id_address,
        $numberHouse,
        $street,
        $district,
        $city,
        $nation
    ) {
        $this->id_address = $id_address;
        $this->numberHouse = $numberHouse;
        $this->street = $street;
        $this->district = $district;
        $this->city = $city;
        $this->nation = $nation;
    }

    public function jsonSerialize()
    {
        return [
            'id_address' => $this->id_address,
            'numberHouse' => $this->numberHouse,
            'street' => $this->street,
            'district' => $this->district,
            'city' => $this->city,
            'nation' => $this->nation
        ];
    }


        /**
         * Get the value of id_address
         */ 
        public function getId_address()
        {
                return $this->id_address;
        }

        /**
         * Set the value of id_address
         *
         * @return  self
         */ 
        public function setId_address($id_address)
        {
                $this->id_address = $id_address;

                return $this;
        }

        /**
         * Get the value of numberHouse
         */ 
        public function getNumberHouse()
        {
                return $this->numberHouse;
        }

        /**
         * Set the value of numberHouse
         *
         * @return  self
         */ 
        public function setNumberHouse($numberHouse)
        {
                $this->numberHouse = $numberHouse;

                return $this;
        }

        /**
         * Get the value of street
         */ 
        public function getStreet()
        {
                return $this->street;
        }

        /**
         * Set the value of street
         *
         * @return  self
         */ 
        public function setStreet($street)
        {
                $this->street = $street;

                return $this;
        }

        /**
         * Get the value of district
         */ 
        public function getDistrict()
        {
                return $this->district;
        }

        /**
         * Set the value of district
         *
         * @return  self
         */ 
        public function setDistrict($district)
        {
                $this->district = $district;

                return $this;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }

        /**
         * Get the value of nation
         */ 
        public function getNation()
        {
                return $this->nation;
        }

        /**
         * Set the value of nation
         *
         * @return  self
         */ 
        public function setNation($nation)
        {
                $this->nation = $nation;

                return $this;
        }
}


?>