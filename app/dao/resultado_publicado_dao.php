<?php

class ResultadoPublicadoDao implements Crud {
    
    function Cadastrar($resultado_publicado){
        $con = GetConexao();
        $sql = "insert into resultado_publicado (id_partida_pub, golos_equipaA, golos_equipaB, data_publicada, hora_publicada, id_publicador) values (?, ?, ?, ?, ?, ?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $resultado_publicado->GetPartida_pub()->GetId());
        $stmt->bindValue( 2, $resultado_publicado->GetGolos_equipaA());
        $stmt->bindValue( 3, $resultado_publicado->GetGolos_equipaB());
        $stmt->bindValue( 4, $resultado_publicado->GetData_publicada());
        $stmt->bindValue( 5, $resultado_publicado->GetHora_publicada());
        $stmt->bindValue( 6, $resultado_publicado->GetPublicador()->GetId());
        return $stmt->execute();
    }

    function Actualizar($resultado_publicado){
        $con = GetConexao();
        $sql = "update resultado_publicado set id_partida_pub = ?, golos_equipaA = ?, golos_equipaB = ?, data_publicada = ?, hora_publicada = ?, id_publicador = ? where id_resultado_pub = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $resultado_publicado->GetPartida_pub()->GetId());
        $stmt->bindValue( 2, $resultado_publicado->GetGolos_equipaA());
        $stmt->bindValue( 3, $resultado_publicado->GetGolos_equipaB());
        $stmt->bindValue( 4, $resultado_publicado->GetData_publicada());
        $stmt->bindValue( 5, $resultado_publicado->GetHora_publicada());
        $stmt->bindValue( 6, $resultado_publicado->GetPublicador()->GetId());
        $stmt->bindValue( 7, $resultado_publicado->GetId());
        return $stmt->execute();
    }

    function Eliminar($id){

    }

    function Listar(){
        $con = GetConexao();
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from resultado_publicado
        left outer join publicador
        on publicador.id_publicador = resultado_publicado.id_publicador
        left outer join partida_publicada
        on partida_publicada.id_partida_pub = resultado_publicado.id_partida_pub
        left outer join partida
        on partida.id_partida = partida_publicada.id_partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB;";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function ListarPorId($id){
        $con = GetConexao();
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from resultado_publicado
        left outer join publicador
        on publicador.id_publicador = resultado_publicado.id_publicador
        left outer join partida_publicada
        on partida_publicada.id_partida_pub = resultado_publicado.id_partida_pub
        left outer join partida
        on partida.id_partida = partida_publicada.id_partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB
        where id_resultado_pub = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorIdPartidaPublicada($id_partida_publicada){
        $con = GetConexao();
        $sql = "select * from resultado_publicado
        where id_partida_pub = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id_partida_publicada);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
