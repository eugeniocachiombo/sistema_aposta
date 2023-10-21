<?php

class ApostaDao implements Crud {
    
    function Cadastrar($aposta){

    }

    function Actualizar($aposta){

    }

    function Eliminar($id){

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
        on equipaB.id_equipa = partida.id_equipaB
        where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
