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
                "data_publicada" => TratarData($_POST["data_publicada"]),
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
        $publicador->SetId($_SESSION["id_logado"]);
        $publicador->SetNome($_SESSION["nome_logado"]);
        $publicador->SetSobrenome($_SESSION["sobrenome_logado"]);
        $publicador->SetEmail($_SESSION["email_logado"]);
        $publicador->SetNascimento($_SESSION["nascimento_logado"]);
        $publicador->SetGenero($_SESSION["genero_logado"]);
        $publicador->SetN_bi($_SESSION["n_bi_logado"]);
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
        LimparCampos();
    }

    function LimparCampos(){
        $_POST["data_partida"] = "";
        $_POST["hora_partida"] = ""; 
    }

    function ClicarBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $retorno_partida_publicada = ProcurarPartidaActualizar($_POST["partida_publicada"]);
            $dados_enviados = Array (
                "id_partida_publicada" => $_POST["partida_publicada"],
                "id_partida" =>  $retorno_partida_publicada["id_partida"],
                "data_partida" => TratarData($_POST["data_partida"]),
                "hora_partida" => $_POST["hora_partida"],
                "data_publicada" => TratarData($_POST["data_publicada"]),
                "hora_publicada" => $_POST["hora_publicada"]
            );
            Actualizar($dados_enviados);
        }
    }

    function ProcurarPartidaActualizar($id_partida_publicada){
        $partida_publicada_dao = new PartidaPublicadaDao();
        return $partida_publicada_dao->ListarPorId($id_partida_publicada);
    }

    function Actualizar($dados_enviados){
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
        $publicador->ActualizarPartidaPublicada($partida_publicada);
        LimparCampos();
    }

    function ClicarBotaoEliminar(){
        if(isset($_POST["btn_eliminar"])){
            $retorno_partida_publicada = ProcurarPartidaActualizar($_POST["partida_publicada"]);
            $id_partida_publicada = $_POST["partida_publicada"];
            Eliminar($id_partida_publicada);
        }
    }

    function Eliminar($id_partida_publicada){
        $publicador = new Publicador();
        $publicador->EliminarPartidaPublicada($id_partida_publicada);
    }
    
?>