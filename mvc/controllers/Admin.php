<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/shopee-php-mvc-dao/Admin
// http://localhost/shopee-php-mvc-dao/Admin/AddProductView

class Admin extends Controller
{
    // shopee-php-mvc-dao/Admin
    function SayHi()
    {
        $addressDao = $this->logicAddress("Address_Implement");
        $bookItemDao = $this->logicBookItem("BookItem_Implement");
        $address = $addressDao->GetAllAddress();
        $bookDao = $this->logicBook("Book_Implement");
        $allBook = $bookItemDao->getAllBookJoin();
        $bookCategory = $bookDao->GetAllBookCategory();
        $cartDao = $this->logicCart("Cart_Implement");
        $cart = $cartDao->GetCart();

        if (empty($_SESSION['user'])) {
            // Call Views
            $this->view("adminHome", [
                "Page" => "listProducts",
                "isAdmin" => "admin",
                "Book" => $allBook,
                "Address" => $address,
                "BookCategory" => $bookCategory,
            ]);
        } else {
            $this->Error();
        }
    }
    // Page 404
    function Error()
    {
        $this->view("404Page", []);
    }
    function AddProductView()
    {
        $bookDao = $this->logicBook("Book_Implement");
        $author = $bookDao->GetAllAuthor();
        $publisher = $bookDao->GetAllPublisher();
        $bookCategory = $bookDao->GetAllBookCategory();
        $author = $bookDao->GetAllAuthor();
        $cartDao = $this->logicCart("Cart_Implement");
        $cart = $cartDao->GetCart();

        $this->view("adminHome", [
            "Page" => "addProduct",
            "Author" => $author,
            "Publisher" => $publisher,
            "BookCategory" => $bookCategory,
        ]);
    }
    function AddProduct()
    {
        $err = [];
        if (isset($_POST['addProduct'])) {
            $isbn = $_POST['isbn'];
            $publicationDate = $_POST['publicationDate'];
            $title = $_POST['title'];
            $numberOfPage = $_POST['numberOfPage'];
            $language = $_POST['language'];
            $summary = $_POST['summary'];
            $soldNumber = $_POST['soldNumber'];
            $bookCategoryId = $_POST['bookCategoryId'];
            $authorId = $_POST['authorId'];
            $publisherId = $_POST['publisherId'];
            $price = $_POST['price'];
            $barcode = $_POST['barcode'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];

            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], './public/asset/book-imgs/' . $file_name);
            }

            if (empty($bookCategoryId)) {
                $err['bookCategoryId'] = "Bạn chưa nhập thể loại sách.";
            }
            if (empty($authorId)) {
                $err['authorId'] = "Bạn chưa nhập Tác giả.";
            }
            if (empty($publisherId)) {
                $err['publisherId'] = "Bạn chưa nhập Nhà xuất bản.";
            }

            if (empty($err)) {
                // $pass = password_hash($password, PASSWORD_DEFAULT);

                $newBook = new BookModel(
                    '',
                    $bookCategoryId,
                    $publisherId,
                    $isbn,
                    $title,
                    $summary,
                    $publicationDate,
                    $numberOfPage,
                    $language,
                    $soldNumber
                );
                $newBookItem = new BookItemModel('', '', $price, $barcode, $discount, $file_name, $description);

                $bookDao = $this->logicBook("Book_Implement");
                $check = $bookDao->createBook($newBook, $newBookItem, $authorId);
                if ($check) {
                    header('location: http://localhost/shopee-php-mvc-dao/Admin');
                } else {
                    $this->view("404Page", [
                        "Err" => $err
                    ]);
                }
            } else {
                $this->view("404Page", [
                    "Err" => $err
                ]);
            }
        }
    }
    function DeleteProduct($Id_book)
    {
        $err = [];
        $bookItemDao = $this->logicBookItem("BookItem_Implement");
        $bookDao = $this->logicBook("Book_Implement");

        $checkBookItem = $bookItemDao->DeleteBookItem($Id_book);
        if ($checkBookItem) {
            $checkBook = $bookDao->DeleteBook($Id_book);
            if ($checkBook) {
                header('location: http://localhost/shopee-php-mvc-dao/Admin');
            } else {
                $err["checkBook"] = "Không xóa được sách này";
                $this->view("404Page", [
                    "Err" => $err
                ]);
            }
        } else {
            $err["checkBookItem"] = "Không xóa được Item sách này";
            $this->view("404Page", [
                "Err" => $err
            ]);
        }
    }
    function UpdateProductView($Id_book)
    {
        $bookDao = $this->logicBook("Book_Implement");
        $author = $bookDao->GetAllAuthor();
        $publisher = $bookDao->GetAllPublisher();
        $bookCategory = $bookDao->GetAllBookCategory();
        $author = $bookDao->GetAllAuthor();
        $cartDao = $this->logicCart("Cart_Implement");
        $cart = $cartDao->GetCart();
        
        $book = $bookDao->findBookById($Id_book);

        $this->view("adminHome", [
            "Page" => "updateProduct",
            "Author" => $author,
            "Publisher" => $publisher,
            "BookCategory" => $bookCategory,
            "Book" => $book,
        ]);
    }
    function UpdateProduct($Id_book)
    {
        $err = [];
        if (isset($_POST['updateProduct'])) {
            $isbn = $_POST['isbn'];
            $publicationDate = $_POST['publicationDate'];
            $title = $_POST['title'];
            $numberOfPage = $_POST['numberOfPage'];
            $language = $_POST['language'];
            $summary = $_POST['summary'];
            $soldNumber = $_POST['soldNumber'];
            $bookCategoryId = $_POST['bookCategoryId'];
            $authorId = $_POST['authorId'];
            $publisherId = $_POST['publisherId'];
            $price = $_POST['price'];
            $barcode = $_POST['barcode'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];

            if (isset($_FILES['imageUp'])) {
                $file = $_FILES['imageUp'];
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], './public/asset/book-imgs/' . $file_name);
            }

            if (empty($bookCategoryId)) {
                $err['bookCategoryId'] = "Bạn chưa nhập thể loại sách.";
            }
            if (empty($authorId)) {
                $err['authorId'] = "Bạn chưa nhập Tác giả.";
            }
            if (empty($publisherId)) {
                $err['publisherId'] = "Bạn chưa nhập Nhà xuất bản.";
            }

            if (empty($err)) {
                // $pass = password_hash($password, PASSWORD_DEFAULT);

                $newBook = new BookModel(
                    $Id_book,
                    $bookCategoryId,
                    $publisherId,
                    $isbn,
                    $title,
                    $summary,
                    $publicationDate,
                    $numberOfPage,
                    $language,
                    $soldNumber
                );
                $newBookItem = new BookItemModel('', $Id_book, $price, $barcode, $discount, $file_name, $description);

                $bookDao = $this->logicBook("Book_Implement");
                $check = $bookDao->UpdateBook($newBook, $newBookItem, $authorId);
                if ($check) {
                    header('location: http://localhost/shopee-php-mvc-dao/Admin');
                } else {
                    $this->view("404Page", [
                        "Err" => $err
                    ]);
                }
            } else {
                $this->view("404Page", [
                    "Err" => $err
                ]);
            }
        }
    }
}
