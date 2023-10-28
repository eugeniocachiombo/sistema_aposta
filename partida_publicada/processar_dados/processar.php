<?php
    
    ClicarBotaoCadastrar();
    ClicarBotaoActualizar();
    ClicarBotaoEliminar();

    function ClicarBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $dados_enviados = Array (
                "id_partida_publicada" => 0,
                "id_partida" => $_POST["partida"],
                "data_partida" => TratarData($_POST["data_partida"]),
                "hora_partida" => $_POST["hora_partida"],
                "data_publicada" => TratarData($_POST["data_partida"]),
                "hora_publicada" => $_POST["hora_publicada"]
            );
            VerificarSePartidaExiste($dados_enviados);
        }
    }

    function TratarData($data){
        $repartir_data = explode("-", $data);
        $data_tratada = $repartir_data[2] . "-" . $repartir_data[1] . "-" . $repartir_data[0];
        return $data_tratada;
    }

    function ObjectoPublicador(){
        $publicador = new Publicador();
        $publicador->SetId($_SESSION["id_publicador"]);
        $publicador->SetNome($_SESSION["nome_publicador"]);
        $publicador->SetSobrenome($_SESSION["sobrenome_publicador"]);
        $publicador->SetEmail($_SESSION["email_publicador"]);
        $publicador->SetNascimento($_SESSION["nascimento_publicador"]);
        $publicador->SetGenero($_SESSION["genero_publicador"]);
        $publicador->SetN_bi($_SESSION["n_bi_publicador"]);
        return $publicador;
    }

    function VerificarSePartidaExiste($dados_enviados){
        $partida_publicada_dao = new PartidaPublicadaDao();
        $retorno_listagem = $partida_publicada_dao->ListarPorIdPartida($dados_enviados["id_partida"]);
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Esta partida já foi publicada  <b> </font>";
        } else{
            Cadastrar($dados_enviados);
        }
    }

    function Cadastrar($dados_enviados){
        $publicador = ObjectoPublicador();
        $partida = new Partida($dados_enviados["id_partida"], "", "", "");
        $partida_publicada = new PartidaPublicada(
            $dados_enviados["id_partida_publicada"], 
            $partida, 
            $dados_enviados["data_partida"], 
            $dados_enviados["hora_partida"], 
            $dados_enviados["data_publicada"], 
            $dados_enviados["hora_publicada"], 
            $publicador
        );
        $publicador->PublicarPartida($partida_publicada);
    }

    function ClicarBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id_partida = $_POST["id"];
            $publicador = Objectopublicador();
            $equipaA = new Equipa($_POST["equipaA"], "default");
            $equipaB = new Equipa($_POST["equipaB"], "default");
            $partida_publlicada = new Partida($id_partida, $equipaA, $equipaB, $publicador);
            ListarPorEquipasActualizar($partida_publlicada);
        }
    }

    function ClicarBotaoEliminar(){
        if(isset($_POST["btn_eliminar"])){
            $id = $_POST["id"];
            $equipaA = new Equipa(0, "default");
            $equipaB = new Equipa(0, "default");
            $publicador = Objectopublicador();
            $partida_publlicada = new Partida($id, $equipaA, $equipaB, $publicador);
            Eliminar($partida_publlicada);
        }
    }

    

    function Actualizar($partida_publlicada){
        $publicador = new Publicador();
        $publicador->ActualizarPartida($partida_publlicada);
    }

    function Eliminar($partida_publlicada){
        $publicador = new Publicador();
        $publicador->EliminarPartida($partida_publlicada);
    }
    
?>