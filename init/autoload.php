<?php
     
    spl_autoload_register(function($class){

        $model = "../app/class/" . strtolower($class) .".php";
        $dao = "../app/dao/" . explode("dao", strtolower($class))[0] ."_dao.php";
        $crud = "../app/interface/" . strtolower($class) .".php";
        

        if(file_exists($model)){
            include $model;
        }

        if(file_exists($dao)){
            include $dao;
        }

        if(file_exists($crud)){
            include $crud;
        }

    });