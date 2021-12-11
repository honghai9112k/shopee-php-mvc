<?php

class BookItemModel implements JsonSerializable {
    private $id_bookItem;
    private $bookId;
    private $price;
    private $barcode;
    private $discount;
    private $image; 
    private $description;  

    public function __construct(
        $id_bookItem,
        $bookId,
        $price,
        $barcode,
        $discount,
        $image, 
        $description,
    ) {
        $this->id_bookItem = $id_bookItem;
        $this->bookId = $bookId;
        $this->price = $price;
        $this->barcode = $barcode;
        $this->discount = $discount;
        $this->image = $image;
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return [
            'id_bookItem' => $this->id_bookItem,
            'bookId' => $this->bookId,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'discount' =>  $this->discount,
            'image' =>  $this->image,
            'description' =>  $this->description,
        ];
    }
    

        /**
         * Get the value of id_bookItem
         */ 
        public function getId_bookItem()
        {
                return $this->id_bookItem;
        }

        /**
         * Set the value of id_bookItem
         *
         * @return  self
         */ 
        public function setId_bookItem($id_bookItem)
        {
                $this->id_bookItem = $id_bookItem;

                return $this;
        }

        /**
         * Get the value of bookId
         */ 
        public function getBookId()
        {
                return $this->bookId;
        }

        /**
         * Set the value of bookId
         *
         * @return  self
         */ 
        public function setBookId($bookId)
        {
                $this->bookId = $bookId;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of barcode
         */ 
        public function getBarcode()
        {
                return $this->barcode;
        }

        /**
         * Set the value of barcode
         *
         * @return  self
         */ 
        public function setBarcode($barcode)
        {
                $this->barcode = $barcode;

                return $this;
        }

        /**
         * Get the value of discount
         */ 
        public function getDiscount()
        {
                return $this->discount;
        }

        /**
         * Set the value of discount
         *
         * @return  self
         */ 
        public function setDiscount($discount)
        {
                $this->discount = $discount;

                return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }
}


?>