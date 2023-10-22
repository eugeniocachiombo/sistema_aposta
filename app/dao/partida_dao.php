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
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB
        left outer join gestor
        on gestor.id_gestor = partida.id_gestor";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorEuipas($equipaA, $equipaB){
        $con = GetConexao();
        $sql = "select * from partida
        where id_equipaA = ? and id_equipaB = ? or id_equipaB = ? and id_equipaA = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $equipaA);
        $stmt->bindValue( 2, $equipaB);
        $stmt->bindValue( 3, $equipaA);
        $stmt->bindValue( 4, $equipaB);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB
        left outer join gestor
        on gestor.id_gestor = partida.id_gestor
        where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
