<?php

class ApostaDao implements Crud {
    
    function Cadastrar($aposta){
        $con = GetConexao();
        $sql = "insert into aposta (id_apostador, id_partida_pub, golos_equipaA, golos_equipaB, data_aposta, hora_aposta, valor_apostado) values (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $aposta->GetApostador()->GetId());
        $stmt->bindValue( 2, $aposta->GetPartida_pub()->GetId());
        $stmt->bindValue( 3, $aposta->GetGolos_equipaA());
        $stmt->bindValue( 4, $aposta->GetGolos_equipaB());
        $stmt->bindValue( 5, $aposta->GetData_aposta());
        $stmt->bindValue( 6, $aposta->GetHora_aposta());
        $stmt->bindValue( 7, $aposta->GetValor_apostado());
        return $stmt->execute();
    }

    function Actualizar($aposta){

    }

    function Eliminar($id){
        $con = GetConexao();
        $sql = "delete from aposta where id_aposta = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        return $stmt->execute();
    }

    function Listar(){
        $con = GetConexao();
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from aposta
        left outer join apostador
        on apostador.id_apostador = aposta.id_apostador
        left outer join partida_publicada
        on partida_publicada.id_partida_pub = aposta.id_partida_pub
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
        $sql = "select *, equipaA.nome_equipa as nome_equipaA, equipaB.nome_equipa as nome_equipaB from aposta
        left outer join apostador
        on apostador.id_apostador = aposta.id_apostador
        left outer join partida_publicada
        on partida_publicada.id_partida_pub = aposta.id_partida_pub
        left outer join partida
        on partida.id_partida = partida_publicada.id_partida
        left outer join equipa as equipaA
        on equipaA.id_equipa = partida.id_equipaA
        left outer join equipa as equipaB
        on equipaB.id_equipa = partida.id_equipaB;
        where id_aposta = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function ListarPorIdPartidaPublicada($id_partida_publicada){
        $con = GetConexao();
        $sql = "select * from aposta
        where id_partida_pub = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id_partida_publicada);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
