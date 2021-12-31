<?php
require_once "./mvc/implement/Book_Implement.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";

class BookDao extends DB implements Book_Implement
{
    // private $listBook;

    // public function __construct()
    // {
    //     $this->listBook = array();
    // }

    public function getAll()
    {
        $qr = "SELECT * FROM book";
        $result =  mysqli_query($this->con, $qr);
        // $list_books = mysqli_fetch_array($result);
        $list_books = $result;

        $list = array();
        foreach ($list_books as $book) {
            array_push($list, new BookModel(
                $book["Id_book"],
                $book["BookCategoryId"],
                $book["PublisherId"],
                $book["ISBN"],
                $book["Title"],
                $book["Summary"],
                $book["PublicationDate"],
                $book["NumberOfPage"],
                $book["Language"],
                $book["SoldNumber"],
            ));
        }
        return $list;
    }

    public function createBook(BookModel $newBook, BookItemModel $newBookItem, $authorId)
    {
        $result = false;

        $bookCategoryId = $newBook->getBookCategoryId();
        $publisherId = $newBook->getPublisherId();
        $isbn = $newBook->getISBN();
        $title = $newBook->getTitle();
        $summary = $newBook->getSummary();
        $publicationDate = $newBook->getPublicationDate();
        $numberOfPage = $newBook->getNumberOfPage();
        $language = $newBook->getLanguage();
        $soldNumber = $newBook->getSoldNumber();
        $price = $newBookItem->getPrice();
        $barcode = $newBookItem->getBarcode();
        $discount = $newBookItem->getDiscount();
        $image = $newBookItem->getImage();
        $description = $newBookItem->getDescription();

        $qr_book = "INSERT INTO book (Id_book, BookCategoryId, PublisherId, ISBN, Title, Summary, PublicationDate, NumberOfPage, Language, SoldNumber) 
                 VALUES (NULL, '$bookCategoryId', '$publisherId', '$isbn', '$title', '$summary', '$publicationDate', '$numberOfPage', '$language', '$soldNumber')";
        $result =  mysqli_query($this->con, $qr_book);


        if ($result) {
            // Lấy ra id customer vừa thêm
            $idMaxQuery = mysqli_query($this->con, "SELECT MAX(Id_book) as maxidBook FROM book;");
            $idmaxBook = mysqli_fetch_assoc($idMaxQuery)['maxidBook'];
            $newBook->setId_book($idmaxBook);


            $qr_bookauthor = "INSERT INTO book_author (BookId, AuthorId) VALUES ('$idmaxBook', '$authorId')";
            $qr =  mysqli_query($this->con, $qr_bookauthor);

            $qr_bookitem = "INSERT INTO bookitem (Id_bookItem, BookId, Price, Barcode, Discount, Image, Description)
             VALUES (NULL, '$idmaxBook', '$price', '$barcode', '$discount', '$image', '$description')";
            $rs =  mysqli_query($this->con, $qr_bookitem);
            if ($rs && $qr) {
                $result = true;
            }
        }
        return json_encode($result);
    }

    // Lấy ra tất cả các Publisher
    public function GetAllPublisher()
    {
        $sql = "SELECT * FROM publisher";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        $_SESSION['publisher'] = $query;
        return $query;
    }
    // Lấy ra tất cả các bookCategory
    public function GetAllBookCategory()
    {
        $sql = "SELECT * FROM bookcategory";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        $_SESSION['bookcategory'] = $query;
        return $query;
    }
    // Lấy ra tất cả các author
    public function GetAllAuthor()
    {
        $sql = "SELECT * FROM author";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        $_SESSION['author'] = $query;
        return $query;
    }
    public function findBookById($Id_book)
    {
        $sql = "SELECT book.*, bookitem.*,
        bookcategory.Name AS 'CategoryName', 
        publisher.Name AS 'publisherName', publisher.Address AS 'publisherAddress',
        author.Name AS 'AuthorName',author.Id_author AS 'AuthorId', author.Email AS 'AuthorEmail', author.Biography
        FROM book, bookitem , bookcategory,publisher, author, book_author
        WHERE 
                book.Id_book =bookitem.BookId AND 
                book.BookCategoryId =bookcategory.Id_category AND 
                book.PublisherId = publisher.Id_publisher AND
                author.Id_author =book_author.AuthorId AND
                book.Id_book =book_author.BookId AND
                book.Id_book ='$Id_book'
        ";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        return $data;
    }
    public function DeleteBook($Id_book)
    {
        $check = false;

        $sql = "DELETE FROM book_author WHERE book_author.BookId= '$Id_book'";
        $query = mysqli_query($this->con, $sql);
        if ($query) {
            $sql2 = "DELETE FROM book WHERE book.Id_book = '$Id_book'";
            $query2 = mysqli_query($this->con, $sql2);
            if ($query2) {
                $check = true;
            }
        }
        return $check;
    }
    public function UpdateBook(BookModel $newBook, BookItemModel $newBookItem, $authorId)
    {
        $result = false;
        $id_book = $newBook->getId_book();
        $bookCategoryId = $newBook->getBookCategoryId();
        $publisherId = $newBook->getPublisherId();
        $isbn = $newBook->getISBN();
        $title = $newBook->getTitle();
        $summary = $newBook->getSummary();
        $publicationDate = $newBook->getPublicationDate();
        $numberOfPage = $newBook->getNumberOfPage();
        $language = $newBook->getLanguage();
        $soldNumber = $newBook->getSoldNumber();
        $price = $newBookItem->getPrice();
        $barcode = $newBookItem->getBarcode();
        $discount = $newBookItem->getDiscount();
        $image = $newBookItem->getImage();
        $description = $newBookItem->getDescription();

        $qr_book = "UPDATE book SET BookCategoryId = '$bookCategoryId', PublisherId = '$publisherId', ISBN = '$isbn', Title = '$title',Summary = '$summary', PublicationDate = '$publicationDate', NumberOfPage = '$numberOfPage',Language = '$language', SoldNumber = '$soldNumber' WHERE book.Id_book = '$id_book'";
        $result =  mysqli_query($this->con, $qr_book);


        if ($result) {
            $qr_bookauthor = "UPDATE book_author SET BookId = '$id_book', AuthorId = '$authorId' WHERE BookId = '$id_book'";
            $qr =  mysqli_query($this->con, $qr_bookauthor);

            $qr_bookitem = "UPDATE bookitem SET Price ='$price', Barcode='$barcode', Discount='$discount', Image='$image', Description='$description' WHERE BookId = '$id_book'";
            $rs =  mysqli_query($this->con, $qr_bookitem);
            if ($rs && $qr) {
                $result = true;
            }
        }
        return json_encode($result);
    }
    public function searchBook($key)
    {
        $sql = "SELECT book.*, bookitem.*,
        bookcategory.Name AS 'CategoryName', 
        publisher.Name AS 'publisherName', publisher.Address AS 'publisherAddress',
        author.Name AS 'AuthorName',author.Id_author AS 'AuthorId', author.Email AS 'AuthorEmail', author.Biography
        FROM book, bookitem , bookcategory,publisher, author, book_author
        WHERE 
                book.Id_book =bookitem.BookId AND 
                book.BookCategoryId =bookcategory.Id_category AND 
                book.PublisherId = publisher.Id_publisher AND
                author.Id_author =book_author.AuthorId AND
                book.Id_book =book_author.BookId AND
                book.Title like '%$key%'
        ";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function GetBookCategory($idCategory)
    {
        $sql = "SELECT book.*, bookitem.*,
        bookcategory.Name AS 'CategoryName', 
        publisher.Name AS 'publisherName', publisher.Address AS 'publisherAddress',
        author.Name AS 'AuthorName',author.Id_author AS 'AuthorId', author.Email AS 'AuthorEmail', author.Biography
        FROM book, bookitem , bookcategory,publisher, author, book_author
        WHERE 
                book.Id_book =bookitem.BookId AND 
                book.BookCategoryId =bookcategory.Id_category AND 
                book.PublisherId = publisher.Id_publisher AND
                author.Id_author =book_author.AuthorId AND
                book.Id_book =book_author.BookId AND
                bookcategory.Id_category = '$idCategory'
        ";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
