<?php

class BookModel implements JsonSerializable {
    private $id_book;
    private $ISBN;
    private $title;
    private $summary;
    private $publicationDate;
    private $numberOfPage;
    private $language; 
    private $bookCategoryId; 
    private $publisherId; 
    private $soldNumber; 


    public function __construct(
        $id_book,
        $bookCategoryId, 
        $publisherId, 
        $ISBN,
        $title,
        $summary,
        $publicationDate,
        $numberOfPage,
        $language ,
        $soldNumber
    ) {
        $this->id_book = $id_book;
        $this->bookCategoryId = $bookCategoryId;
        $this->publisherId = $publisherId;
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->summary = $summary;
        $this->publicationDate = $publicationDate;
        $this->numberOfPage = $numberOfPage;
        $this->language = $language;
        $this->soldNumber = $soldNumber;
    }

    public function jsonSerialize()
    {
        return [
            'id_book' => $this->id_book,
            'bookCategoryId' => $this->bookCategoryId,
            'publisherId' => $this->publisherId,
            'ISBN' => $this->ISBN,
            'title' => $this->title,
            'summary' => $this->summary,
            'publicationDate' => $this->publicationDate,
            'numberOfPage' =>  $this->numberOfPage,
            'language' =>  $this->language,
            'soldNumber' =>  $this->soldNumber
        ];
    }
    
    

        /**
         * Get the value of id_book
         */ 
        public function getId_book()
        {
                return $this->id_book;
        }

        /**
         * Set the value of id_book
         *
         * @return  self
         */ 
        public function setId_book($id_book)
        {
                $this->id_book = $id_book;

                return $this;
        }

        /**
         * Get the value of bookCategoryId
         */ 
        public function getBookCategoryId()
        {
                return $this->bookCategoryId;
        }

        /**
         * Set the value of bookCategoryId
         *
         * @return  self
         */ 
        public function setBookCategoryId($bookCategoryId)
        {
                $this->bookCategoryId = $bookCategoryId;

                return $this;
        }

        /**
         * Get the value of publisherId
         */ 
        public function getPublisherId()
        {
                return $this->publisherId;
        }

        /**
         * Set the value of publisherId
         *
         * @return  self
         */ 
        public function setPublisherId($publisherId)
        {
                $this->publisherId = $publisherId;

                return $this;
        }

        /**
         * Get the value of ISBN
         */ 
        public function getISBN()
        {
                return $this->ISBN;
        }

        /**
         * Set the value of ISBN
         *
         * @return  self
         */ 
        public function setISBN($ISBN)
        {
                $this->ISBN = $ISBN;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of summary
         */ 
        public function getSummary()
        {
                return $this->summary;
        }

        /**
         * Set the value of summary
         *
         * @return  self
         */ 
        public function setSummary($summary)
        {
                $this->summary = $summary;

                return $this;
        }

        /**
         * Get the value of publicationDate
         */ 
        public function getPublicationDate()
        {
                return $this->publicationDate;
        }

        /**
         * Set the value of publicationDate
         *
         * @return  self
         */ 
        public function setPublicationDate($publicationDate)
        {
                $this->publicationDate = $publicationDate;

                return $this;
        }

        /**
         * Get the value of numberOfPage
         */ 
        public function getNumberOfPage()
        {
                return $this->numberOfPage;
        }

        /**
         * Set the value of numberOfPage
         *
         * @return  self
         */ 
        public function setNumberOfPage($numberOfPage)
        {
                $this->numberOfPage = $numberOfPage;

                return $this;
        }

        /**
         * Get the value of language
         */ 
        public function getLanguage()
        {
                return $this->language;
        }

        /**
         * Set the value of language
         *
         * @return  self
         */ 
        public function setLanguage($language)
        {
                $this->language = $language;

                return $this;
        }

    /**
     * Get the value of soldNumber
     */ 
    public function getSoldNumber()
    {
        return $this->soldNumber;
    }

    /**
     * Set the value of soldNumber
     *
     * @return  self
     */ 
    public function setSoldNumber($soldNumber)
    {
        $this->soldNumber = $soldNumber;

        return $this;
    }
}


?>