<?php

class AuthorModel implements JsonSerializable {
    private $id_author;
    private $name;
    private $email;
    private $biography;
      

    public function __construct(
        $id_author,
        $name,
        $email,
        $biography
    ) {
        $this->id_author = $id_author;
        $this->name = $name;
        $this->email = $email;
        $this->biography = $biography;
    }

    public function jsonSerialize()
    {
        return [
            'id_author' => $this->id_author,
            'name' => $this->name,
            'email' => $this->email,
            'biography' => $this->biography
        ];
    }


        /**
         * Get the value of id_author
         */ 
        public function getId_author()
        {
                return $this->id_author;
        }

        /**
         * Set the value of id_author
         *
         * @return  self
         */ 
        public function setId_author($id_author)
        {
                $this->id_author = $id_author;

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
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of biography
         */ 
        public function getBiography()
        {
                return $this->biography;
        }

        /**
         * Set the value of biography
         *
         * @return  self
         */ 
        public function setBiography($biography)
        {
                $this->biography = $biography;

                return $this;
        }
}


?>