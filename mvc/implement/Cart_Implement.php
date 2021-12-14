<?php
interface Cart_Implement {
    public function GetCart();
    public function AddItemToCart($id_bookItem,$Amount);
    public function DeleteAllCart();
}
?>