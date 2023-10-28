<?php

class PartidaPublicadaDao implements Crud {
    
    function Cadastrar($partida_publicada){
        $con = GetConexao();
        $sql = "insert into partida_publicada (id_partida, data_partida, hora_partida, data_publicada, hora_publicada, id_publicador) values (?, ?, ?, ?, ?, ?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $partida_publicada->GetPartida()->GetId());
        $stmt->bindValue( 2, $partida_publicada->GetData_partida());
        $stmt->bindValue( 3, $partida_publicada->GetHora_partida());
        $stmt->bindValue( 4, $partida_publicada->GetData_publicada());
        $stmt->bindValue( 5, $partida_publicada->GetHora_publicada());
        $stmt->bindValue( 6, $partida_publicada->GetPublicador()->GetId());
        return $stmt->execute();
    }

    function Actualizar($partida_publicada){
        $con = GetConexao();
        $sql = "update partida_publicada set data_partida = ?, hora_partida = ?, data_publicada = ?, hora_publicada = ?, id_publicador = ? where id_partida_pub = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $partida_publicada->GetData_partida());
        $stmt->bindValue( 2, $partida_publicada->GetHora_partida());
        $stmt->bindValue( 3, $partida_publicada->GetData_publicada());
        $stmt->bindValue( 4, $partida_publicada->GetHora_publicada());
        $stmt->bindValue( 5, $partida_publicada->GetPublicador()->GetId());
        $stmt->bindValue( 6, $partida_publicada->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from partida_publicada where id_partida_pub = ?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from partida_publicada
        left outer join partida
        on partida.id_partida = partida_publicada.id_partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB
        left outer join publicador
        on publicador.id_publicador = partida_publicada.id_publicador";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from partida_publicada
        left outer join partida
        on partida.id_partida = partida_publicada.id_partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB
        left outer join publicador
        on publicador.id_publicador = partida_publicada.id_publicador
        where id_partida_pub = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorIdPartida($id_partida){
        $con = GetConexao();
        $sql = "select * from partida_publicada where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id_partida);
        $stmt->execute();
        return $stmt->fetch();
    }

}
