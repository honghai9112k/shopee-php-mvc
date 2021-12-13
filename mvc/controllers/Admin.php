<?php
require_once "./mvc/models/CustomerModel.php";
require_once "./mvc/models/AccountModel.php";
require_once "./mvc/models/AddressModel.php";
require_once "./mvc/models/BookModel.php";
require_once "./mvc/models/BookItemModel.php";
// http://localhost/bookstore-mvc/Admin
// http://localhost/bookstore-mvc/Admin/AddProductView

class Admin extends Controller
{
    // bookstore-mvc/Admin
    function SayHi()
    {
        $addressDao = $this->dao("AddressDao");
        $bookItemDao = $this->dao("BookItemDao");
        $address = $addressDao->GetAllAddress();
        $bookDao = $this->dao("BookDao");
        $allBook = $bookItemDao->getAllBookJoin();
        $bookCategory = $bookDao->GetAllBookCategory();

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
        $bookDao = $this->dao("BookDao");
        $author = $bookDao->GetAllAuthor();
        $publisher = $bookDao->GetAllPublisher();
        $bookCategory = $bookDao->GetAllBookCategory();
        $author = $bookDao->GetAllAuthor();

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
            $image = $_POST['image'];
            $description = $_POST['description'];

            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], './public/asset/img/' . $file_name);
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

                $bookDao = $this->dao("BookDao");
                $check = $bookDao->createBook($newBook, $newBookItem, $authorId);
                if ($check) {
                    header('location: http://localhost/bookstore-mvc/Admin');
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
        $bookItemDao = $this->dao("BookItemDao");
        $bookDao = $this->dao("BookDao");

        $checkBookItem = $bookItemDao->DeleteBookItem($Id_book);
        if ($checkBookItem) {
            $checkBook = $bookDao->DeleteBook($Id_book);
            if ($checkBook) {
                header('location: http://localhost/bookstore-mvc/Admin');
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
        $bookDao = $this->dao("BookDao");
        $author = $bookDao->GetAllAuthor();
        $publisher = $bookDao->GetAllPublisher();
        $bookCategory = $bookDao->GetAllBookCategory();
        $author = $bookDao->GetAllAuthor();

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
            $image = $_POST['image'];
            $description = $_POST['description'];

            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], './public/asset/img/' . $file_name);
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

                $bookDao = $this->dao("BookDao");
                $check = $bookDao->UpdateBook($newBook, $newBookItem, $authorId);
                if ($check) {
                    header('location: http://localhost/bookstore-mvc/Admin');
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
