<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function controller($controller){
        require_once "./mvc/controllers/".$controller.".php";
        return new $controller;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
        
    }
    public function logicAddress($logic){
        require_once "./mvc/logicApplication/addressDao/".$logic.".php";
        return new $logic;
    }
    public function logicBook($logic){
        require_once "./mvc/logicApplication/bookDao/".$logic.".php";
        return new $logic;
    }
    public function logicBookItem($logic){
        require_once "./mvc/logicApplication/bookItemDao/".$logic.".php";
        return new $logic;
    }
    public function logicCart($logic){
        require_once "./mvc/logicApplication/cartDao/".$logic.".php";
        return new $logic;
    }
    public function logicCustomer($logic){
        require_once "./mvc/logicApplication/customerDao/".$logic.".php";
        return new $logic;
    }
    public function logicOrder($logic){
        require_once "./mvc/logicApplication/orderDao/".$logic.".php";
        return new $logic;
    }

}
?>