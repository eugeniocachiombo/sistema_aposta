<?php

class PartidaDao implements Crud {

    function Cadastrar($partida){
        $con = GetConexao();
        $sql = "insert into partida (id_equipaA, id_equipaB, id_gestor) values (?, ?, ?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $partida->GetEquipaA()->GetId());
        $stmt->bindValue( 2, $partida->GetEquipaB()->GetId());
        $stmt->bindValue( 3, $partida->GetGestor()->GetId());
        return $stmt->execute();
    }

    function Actualizar($partida){
        $con = GetConexao();
        $sql = "update partida set id_equipaA = ?, id_equipaB = ?, id_gestor = ?  where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $partida->GetEquipaA()->GetId());
        $stmt->bindValue( 2, $partida->GetEquipaB()->GetId());
        $stmt->bindValue( 3, $partida->GetGestor()->GetId());
        $stmt->bindValue( 4, $partida->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from partida where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select * from partida";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select * from partida where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
