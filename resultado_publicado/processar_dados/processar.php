<?php
    
    ClicarBotaoCadastrar();
    ClicarBotaoActualizar();
    ClicarBotaoEliminar();

    function ClicarBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $dados_enviados = Array (
                "id_resultado_publicado" => 0,
                "id_partida_publicada" => $_POST["partida_publicada"],
                "golos_equipaA" => $_POST["golos_equipaA"],
                "golos_equipaB" => $_POST["golos_equipaB"],
                "data_publicada" => TratarData($_POST["data_publicada"]),
                "hora_publicada" => $_POST["hora_publicada"]
            );
            VerificarSePartidaPublicadaExiste($dados_enviados);
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

    function VerificarSePartidaPublicadaExiste($dados_enviados){
        $resultado_publicado_dao = new ResultadoPublicadoDao();
        $retorno_listagem = $resultado_publicado_dao->ListarPorId($dados_enviados["id_partida_publicada"]);
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Este resultado já foi publicado  <b> </font>";
        } else{
            Cadastrar($dados_enviados);
        }
    }

    function Cadastrar($dados_enviados){
        $publicador = ObjectoPublicador();
        $partida_publicada = new PartidaPublicada($dados_enviados["id_partida_publicada"], "", "", "", "", "", $publicador);
        $resultado_publicado = new ResultadoPublicado(
            $dados_enviados["id_resultado_publicado"], 
            $partida_publicada, 
            $dados_enviados["golos_equipaA"], 
            $dados_enviados["golos_equipaB"], 
            $dados_enviados["data_publicada"], 
            $dados_enviados["hora_publicada"], 
            $publicador
        );
        $publicador->PublicarResultado($resultado_publicado);
        LimparCampos();
    }

    function LimparCampos(){
        $_POST["golos_equipaA"] = "";
        $_POST["golos_equipaB"] = ""; 
    }

    function ClicarBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $retorno_resultado_publicado = ProcurarPartida_publicadaActualizar($_POST["resultado_publicado"]);
            $dados_enviados = Array (
                "id_resultado_publicado" => $_POST["resultado_publicado"],
                "id_partida_publicada" =>  $retorno_resultado_publicado["id_partida_publicada"],
                "golos_equipaA" => $_POST["golos_equipaA"],
                "golos_equipaB" => $_POST["golos_equipaB"],
                "data_publicada" => TratarData($_POST["data_publicada"]),
                "hora_publicada" => $_POST["hora_publicada"]
            );
            Actualizar($dados_enviados);
        }
    }

    function ProcurarPartida_publicadaActualizar($id_resultado_publicado){
        $resultado_publicado_dao = new ResultadoPublicadoDao();
        return $resultado_publicado_dao->ListarPorId($id_resultado_publicado);
    }

    function Actualizar($dados_enviados){
        $publicador = ObjectoPublicador();
        $partida_publicada = new PartidaPublicada($dados_enviados["id_partida_publicada"], "", "", "", "", "", $publicador);
        $resultado_publicado = new ResultadoPublicado(
            $dados_enviados["id_resultado_publicado"], 
            $partida_publicada,
            $dados_enviados["golos_equipaA"], 
            $dados_enviados["golos_equipaB"], 
            $dados_enviados["data_publicada"], 
            $dados_enviados["hora_publicada"], 
            $publicador
        );
        $publicador->ActualizarResultado($resultado_publicado);
        LimparCampos();
    }

    function ClicarBotaoEliminar(){
        if(isset($_POST["btn_eliminar"])){
            $retorno_resultado_publicado = ProcurarPartida_publicadaActualizar($_POST["resultado_publicado"]);
            $id_resultado_publicado = $_POST["resultado_publicado"];
            Eliminar($id_resultado_publicado);
        }
    }

    function Eliminar($id_resultado_publicado){
        $publicador = new Publicador();
        $publicador->EliminarResultado($id_resultado_publicado);
    }
    
?>