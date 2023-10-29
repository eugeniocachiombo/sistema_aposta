<?php
    
    ClicarBotaoCadastrar();
    ClicarBotaoActualizar();
    ClicarBotaoEliminar();

    function ClicarBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $equipaA = new Equipa( $_POST["equipaA"], "default");
            $equipaB = new Equipa( $_POST["equipaB"], "default");
            VerificarDifirencaEquipa($equipaA, $equipaB);
        }
    }

    function ClicarBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id_partida = $_POST["id"];
            $gestor = ObjectoGestor();
            $equipaA = new Equipa($_POST["equipaA"], "default");
            $equipaB = new Equipa($_POST["equipaB"], "default");
            $partida = new Partida($id_partida, $equipaA, $equipaB, $gestor);
            ListarPorEquipasActualizar($partida);
        }
    }

    function ClicarBotaoEliminar(){
        if(isset($_POST["btn_eliminar"])){
            $id = $_POST["id"];
            $equipaA = new Equipa(0, "default");
            $equipaB = new Equipa(0, "default");
            $gestor = ObjectoGestor();
            $partida = new Partida($id, $equipaA, $equipaB, $gestor);
            Eliminar($partida);
        }
    }

    function ObjectoGestor(){
        $gestor = new Gestor();
        $gestor->SetId($_SESSION["id_logado"]);
        $gestor->SetNome($_SESSION["nome_logado"]);
        $gestor->SetSobrenome($_SESSION["sobrenome_logado"]);
        $gestor->SetEmail($_SESSION["email_logado"]);
        $gestor->SetNascimento($_SESSION["nascimento_logado"]);
        $gestor->SetGenero($_SESSION["genero_logado"]);
        $gestor->SetN_bi($_SESSION["n_bi_logado"]);
        return $gestor;
    }

    function VerificarDifirencaEquipa($equipaA, $equipaB){
        if($equipaA == $equipaB){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> As equipas não podem ser iguais <b> </font>";
        }else{
            $gestor = ObjectoGestor();
            $partida = new Partida(0, $equipaA, $equipaB, $gestor);
            ListarPorEquipasCadastrar($partida);
        }
    }

    function ListarPorEquipasCadastrar($partida){
        $id_equipaA = $partida->GetEquipaA()->GetId();
        $id_equipaB = $partida->GetEquipaB()->GetId();
        $partida_dao = new PartidaDao();
        $retorno_consulta_equipas = $partida_dao->ListarPorEquipas($id_equipaA, $id_equipaB);
        VerificarExistenciaPartidaCadastrar($retorno_consulta_equipas, $partida);
    }

    function VerificarExistenciaPartidaCadastrar($retorno_consulta_equipas, $partida){
        if($retorno_consulta_equipas){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe partida com estas equipas  <b> </font>";
        }else{
            Cadastrar($partida);
        }
    }

    function Cadastrar($partida){
        $gestor = new Gestor();
        $gestor->CadastrarPartida($partida);
    }

    function ListarPorEquipasActualizar($partida){
        $id_equipaA = $partida->GetEquipaA()->GetId();
        $id_equipaB = $partida->GetEquipaB()->GetId();
        $partida_dao = new PartidaDao();
        $retorno_consulta = $partida_dao->ListarPorEquipas($id_equipaA, $id_equipaB);
        $id_consulta = $retorno_consulta["id_partida"] ?? "";
        VerificarIdsEntrePartidas($id_consulta, $partida);
    }

    function VerificarIdsEntrePartidas($id_consulta, $partida){
        $id_partida = $partida->GetId();
        if( $id_consulta == $id_partida ){
            Actualizar($partida);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Impossível actualizar a partida  <b> </font>";
        }
    }

    function Actualizar($partida){
        $gestor = new Gestor();
        $gestor->ActualizarPartida($partida);
    }

    function Eliminar($partida){
        $gestor = new Gestor();
        $gestor->EliminarPartida($partida);
    }
    
?>