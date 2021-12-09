<?php

class PublisherModel implements JsonSerializable {
    private $id_publisher;
    private $name;
    private $address;
      

    public function __construct(
        $id_publisher,
        $name,
        $address
    ) {
        $this->id_publisher = $id_publisher;
        $this->name = $name;
        $this->address = $address;
    }

    public function jsonSerialize()
    {
        return [
            'id_publisher' => $this->id_publisher,
            'name' => $this->name,
            'address' => $this->address
        ];
    }


        /**
         * Get the value of id_publisher
         */ 
        public function getId_publisher()
        {
                return $this->id_publisher;
        }

        /**
         * Set the value of id_publisher
         *
         * @return  self
         */ 
        public function setId_publisher($id_publisher)
        {
                $this->id_publisher = $id_publisher;

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
