<?php
interface Cart_Implement {
    public function GetCart();
    public function AddItemToCart($id_bookItem,$Amount);
    public function DeleteAllCart();
    public function MinusItem($Id_bookItem);
    public function PlusItem($Id_bookItem);
    public function DeleteCartByIdBookItem($BookItemId);
}
?>