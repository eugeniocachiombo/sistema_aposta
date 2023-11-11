<?php

namespace App\Dao;

use App\Dao\Conexao;
use App\Interfac\Crud;

class EquipaDao extends Conexao implements Crud {
    
    function Cadastrar($equipa){
        $con = $this->BuscarConexao();
        $sql = "insert into equipa (nome_equipa) values (?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $equipa->GetNome());
        return $stmt->execute();
    }

    function Actualizar($equipa){
        $con = $this->BuscarConexao();
        $sql = "update equipa set nome_equipa = ? where id_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $equipa->GetNome());
        $stmt->bindValue( 2, $equipa->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = $this->BuscarConexao();
        $sql = "delete from equipa where id_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = $this->BuscarConexao();
        $sql = "select * from equipa";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = $this->BuscarConexao();
        $sql = "select * from equipa where id_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorNome($nome){
        $con = $this->BuscarConexao();
        $sql = "select * from equipa where nome_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $nome);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

