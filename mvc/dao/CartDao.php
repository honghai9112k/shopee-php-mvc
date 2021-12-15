<?php
require_once "./mvc/implement/Cart_Implement.php";
require_once "./mvc/models/CartModel.php";
require_once "./mvc/models/BookItemModel.php";

class CartDao extends DB implements Cart_Implement
{

    public function GetCart()
    {
        $sql = "SELECT cart.*, bookitem.*, book.*,cart_bookitem.Amount, A.CountItem
        FROM book, bookitem , cart, cart_bookitem,
        (SELECT cart_bookitem.CartId, COUNT(BookItemId) AS CountItem 
                FROM cart_bookitem GROUP BY cart_bookitem.CartId) AS A
        WHERE 
            book.Id_book =bookitem.BookId AND 
            cart.Id_cart =cart_bookitem.CartId AND
            bookitem.Id_bookItem =cart_bookitem.BookItemId
        ";
        $query = mysqli_query($this->con, $sql);
        $_SESSION['cart'] = $query;
        return $query;
    }
    public function CountCart()
    {
        $sql = "SELECT cart_bookitem.CartId, COUNT(BookItemId) AS CountItem 
                FROM cart_bookitem GROUP BY cart_bookitem.CartId";
        $query = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($query);
        return $data["CountItem"];
    }
    /*
    SELECT book.*, bookitem.*,author.*,publisher.*,bookcategory.*  FROM book JOIN bookitem JOIN author JOIN book_author JOIN publisher JOIN bookcategory ON 
        book.Id_book =bookitem.BookId AND 
        book.BookCategoryId =bookcategory.Id_category AND 
        book.PublisherId =publisher.Id_publisher AND 
        book.Id_book = book_author.BookId AND
        author.Id_author = book_author.AuthorId
    */
    // public function DeleteBookItem($Id_book) {
    //     $check = false;
    //     $sql = "DELETE FROM bookitem WHERE bookitem.BookId = '$Id_book'";
    //     $query = mysqli_query($this->con, $sql);
    //     if($query) {
    //         $check = true;
    //     }
    //     return $check;
    // }
    public function AddItemToCart($id_bookItem, $Amount)
    {
        $CheckCarrt = $this->GetCart();
        // Kiểm tra nếu không tồn tại session cart
        if (!empty($CheckCarrt)) {
            // kiểm tra xem tồn tại bookItemId
            $check = false;
            $cartId = 1;
            $amountOld = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['Id_bookItem'] == $id_bookItem) {
                    $check = true;
                    $amountOld = $value['Amount'];
                }
                $cartId = $value['Id_cart'];
            }
            // Thêm tăng số lượng/ tạo item cart mới
            if ($check) {
                $amountNew = $amountOld + $Amount;
                $qrUp = "UPDATE cart_bookitem SET Amount = '$amountNew' WHERE BookItemId = '$id_bookItem'";
                $result =  mysqli_query($this->con, $qrUp);
                return $result;
            } else {
                $qrAdd = "INSERT INTO cart_bookitem(CartId, BookItemId, Amount) VALUES ('$cartId','$id_bookItem','$Amount')";
                $rs =  mysqli_query($this->con, $qrAdd);
                return $rs;
            }
        } else {
            // Tạo cart mới
            $qrCart = "INSERT INTO cart(Id_cart) VALUES ('')";
            $query =  mysqli_query($this->con, $qrCart);

            // Lấy ra id cart vừa thêm
            $idMaxQuery = mysqli_query($this->con, "SELECT MAX(Id_cart) as maxCart FROM cart;");
            $idmaxCart = mysqli_fetch_assoc($idMaxQuery)['maxCart'];

            // thêm vào bảng cart_bookitem
            $qrAdd1 = "INSERT INTO cart_bookitem(CartId, BookItemId, Amount) VALUES ('$idmaxCart','$id_bookItem','$Amount')";
            $rs1 =  mysqli_query($this->con, $qrAdd1);
            return $rs1;
        }
    }
    public function DeleteAllCart()
    {
        $Cart = $this->GetCart();
        if (!empty($Cart)) {
            $cartId = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $cartId = $value['Id_cart'];
            }
            $sql = "DELETE FROM cart_bookitem WHERE cart_bookitem.CartId='$cartId'";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
    }
    public function DeleteCartByIdBookItem($BookItemId)
    {
        $Cart = $this->GetCart();
        if (!empty($Cart)) {
            $cartId = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $cartId = $value['Id_cart'];
            }
            $sql = "DELETE FROM cart_bookitem WHERE cart_bookitem.CartId='$cartId' AND cart_bookitem.BookItemId = '$BookItemId'";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
    }
    public function MinusItem($Id_bookItem)
    {
        $sqlAmount = "SELECT cart_bookitem.* FROM cart_bookitem WHERE BookItemId = '$Id_bookItem'";
        $qr = mysqli_query($this->con, $sqlAmount);
        $amount = mysqli_fetch_assoc($qr)['Amount'];
        if ($amount > 1) {
            $sql = "UPDATE cart_bookitem SET Amount = Amount-1  WHERE BookItemId = '$Id_bookItem'";
            $query = mysqli_query($this->con, $sql);
            if ($query) {
                $sql1 = "SELECT cart_bookitem.* FROM cart_bookitem WHERE BookItemId = '$Id_bookItem'";
                $qr1 = mysqli_query($this->con, $sql1);
                $amountNew = mysqli_fetch_assoc($qr1)['Amount'];
                return  $amountNew;
            } else {
                return $query;
            }
        } else {
            $sqlDel = "DELETE FROM cart_bookitem WHERE BookItemId = '$Id_bookItem'";
            $rs = mysqli_query($this->con, $sqlDel);
            return "0";
        }
    }
    public function PlusItem($Id_bookItem)
    {

        $sql = "UPDATE cart_bookitem SET Amount = Amount+1  WHERE BookItemId = '$Id_bookItem'";
        $query = mysqli_query($this->con, $sql);
        if ($query) {
            $sql1 = "SELECT cart_bookitem.* FROM cart_bookitem WHERE BookItemId = '$Id_bookItem'";
            $qr1 = mysqli_query($this->con, $sql1);
            $amountNew = mysqli_fetch_assoc($qr1)['Amount'];
            return  $amountNew;
        } else {
            return $query;
        }
    }
}
