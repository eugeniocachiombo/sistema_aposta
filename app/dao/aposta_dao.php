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
        where id_partida = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindValue( 1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
