<?php
    
    ClicarBotaoCadastrar();
    ClicarBotaoEliminar();

    function ClicarBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $dados_enviados = Array (
                "id_aposta" => 0,
                "id_partida_publicada" => $_POST["partida_publicada"],
                "golos_equipaA" => $_POST["golos_equipaA"],
                "golos_equipaB" => $_POST["golos_equipaB"],
                "data_aposta" => TratarData($_POST["data_aposta"]),
                "hora_aposta" => $_POST["hora_aposta"],
                "valor_apostado" => $_POST["valor_apostado"]
            );
            VerificarSePartidaPublicadaExiste($dados_enviados);
        }
    }

    function TratarData($data){
        $repartir_data = explode("-", $data);
        $data_tratada = $repartir_data[2] . "-" . $repartir_data[1] . "-" . $repartir_data[0];
        return $data_tratada;
    }

    function ObjectoApostador(){
        $apostador = new Apostador();
        $apostador->SetId($_SESSION["id_apostador"]);
        $apostador->SetNome($_SESSION["nome_apostador"]);
        $apostador->SetSobrenome($_SESSION["sobrenome_apostador"]);
        $apostador->SetEmail($_SESSION["email_apostador"]);
        $apostador->SetNascimento($_SESSION["nascimento_apostador"]);
        $apostador->SetGenero($_SESSION["genero_apostador"]);
        $apostador->SetN_bi($_SESSION["n_bi_apostador"]);
        return $apostador;
    }

    function VerificarSePartidaPublicadaExiste($dados_enviados){
        $aposta_dao = new ApostaDao();
        $retorno_listagem = $aposta_dao->ListarPorIdPartidaPublicada($dados_enviados["id_partida_publicada"]);
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Esta aposta já foi feita  <b> </font>";
        } else{
            Cadastrar($dados_enviados);
        }
    }

    function Cadastrar($dados_enviados){
        $apostador = ObjectoApostador();
        $partida_publicada = new PartidaPublicada($dados_enviados["id_partida_publicada"], "", "", "", "", "", $apostador);
        $aposta = new Aposta(
            $dados_enviados["id_aposta"],
            $apostador, 
            $partida_publicada, 
            $dados_enviados["golos_equipaA"], 
            $dados_enviados["golos_equipaB"], 
            $dados_enviados["data_aposta"], 
            $dados_enviados["hora_aposta"],
            $dados_enviados["valor_apostado"]
        );
        $apostador->CadastrarApostar($aposta);
        LimparCampos();
    }

    function LimparCampos(){
        $_POST["golos_equipaA"] = "";
        $_POST["golos_equipaB"] = ""; 
    }

    function ClicarBotaoEliminar(){
        if(isset($_POST["btn_eliminar"])){
            $id_aposta = $_POST["aposta"];
            Eliminar($id_aposta);
        }
    }

    function Eliminar($id_aposta){
        $apostador = new Apostador();
        $apostador->EliminarAposta($id_aposta);
    }
    
?>