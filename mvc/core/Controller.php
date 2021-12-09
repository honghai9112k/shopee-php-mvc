<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function dao($dao){
        require_once "./mvc/dao/".$dao.".php";
        return new $dao;
    }

    public function controller($controller){
        require_once "./mvc/controllers/".$controller.".php";
        return new $controller;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
        
    }

}
?>