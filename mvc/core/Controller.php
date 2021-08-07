<?php
    class Controller{

        function view($views, $data=[]) {
            require_once "./mvc/views/".$views.".php";
            return $views;
        }

        function model($model) {
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }


    }
?>