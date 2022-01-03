<?php
interface BookItemDao 
{
    public function getAllBookJoin();
    public function DeleteBookItem($Id_book);
    public function GetBookByIdBookItem ($BookItemId);
}
