<?php

class BookCategory implements JsonSerializable {
    private $id_category;
    private $name;
      

    public function __construct(
        $id_category,
        $name,
    ) {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    public function jsonSerialize()
    {
        return [
            'id_category' => $this->id_category,
            'name' => $this->name,
        ];
    }


        /**
         * Get the value of id_category
         */ 
        public function getId_category()
        {
                return $this->id_category;
        }

        /**
         * Set the value of id_category
         *
         * @return  self
         */ 
        public function setId_category($id_category)
        {
                $this->id_category = $id_category;

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
}


?>