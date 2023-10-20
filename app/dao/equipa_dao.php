<?php

class EquipaDao implements Crud {
    
    function Cadastrar($equipa){
        $con = GetConexao();
        $sql = "insert into equipa (nome_equipa) values (?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $equipa->GetNome());
        return $stmt->execute();
    }

    function Actualizar($equipa){
        $con = GetConexao();
        $sql = "update equipa set nome_equipa = ? where id_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $equipa->GetNome());
        $stmt->bindValue( 2, $equipa->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from equipa where id_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select * from equipa;";
        $stmt = $con->prepare($sql);
        return $stmt->execute();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from equipa where id_equipa = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

}
