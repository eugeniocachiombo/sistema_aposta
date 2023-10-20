<?php

function GetConexao(){
    try {
        $host = "mysql:host=localhost;dbname=sistema_aposta;charset=utf8";
        $user = "root";
        $pass = "";
        $pdo = new PDO( $host, $user, $pass );
        return $pdo;
    } catch (Exception $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}