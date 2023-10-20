<?php
    
    spl_autoload_register(function($class){

        $model = "../app/class/" . $class .".php";
        $dao = "../app/dao/" . $class ."_dao.php";
        $crud = "../app/interface/" . $class .".php";
        

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