<?php
    CliqueBotaoCadastrar();
    CliqueBotaoActualizar();
    CliqueBotaoEliminarConta();
    CliqueBotaoAlterarSenha();
    CliqueBotaoAutenticar();

    function CliqueBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $data_tratada = TratarData( $_POST["nascimento"] );
            $dados_enviados = Array(
                "id" => 0,
                "nome" => $_POST["nome"],
                "sobrenome" => $_POST["sobrenome"],
                "email" => $_POST["email"],
                "senha" => $_POST["senha"],
                "nascimento" => $data_tratada,
                "genero" => $_POST["genero"],
                "n_bi" => $_POST["n_bi"]
            );
            $apostador = InstanciarObjectoApostador($dados_enviados);
            VerificarExistenciaBI( $apostador );
        }
    }

    function CliqueBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id = $_SESSION["id_apostador"];
            $data_tratada = TratarData( $_POST["nascimento"] );
            $dados_enviados = Array(
                "id" => $id,
                "nome" => $_POST["nome"],
                "sobrenome" => $_POST["sobrenome"],
                "email" => $_POST["email"],
                "nascimento" => $data_tratada,
                "genero" => $_POST["genero"],
                "n_bi" => $_POST["n_bi"]
            );
            $apostador = InstanciarObjectoApostador($dados_enviados);
            VerificarIgualdadeBI($apostador);
        }
    }

    function CliqueBotaoEliminarConta(){  
        if(isset($_POST["btn_eliminar_conta"])){
            $id_apostador = $_SESSION["id_apostador"];
            $senha = $_POST["senha"];
            $dados_enviados = Array(
                "id_apostador" => $id_apostador,
                "nome" => "nulo",
                "sobrenome" => "nulo",
                "email" => "nulo",
                "senha" => $senha,
                "nascimento" => "nulo",
                "genero" => "nulo",
                "n_bi" => "nulo"
            );
            VerificarSenha($dados_enviados);
        }
    }

    function CliqueBotaoAlterarSenha(){
        if(isset($_POST["btn_alterar_senha"])){
            $id_apostador = $_SESSION["id_apostador"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
            $dados_enviados = Array(
                "id_apostador" => $id_apostador,
                "nome" => "nulo",
                "sobrenome" => "nulo",
                "email" => "nulo",
                "senha_antiga" => $senha_antiga,
                "senha_nova" => $senha_nova,
                "nascimento" => "nulo",
                "genero" => "nulo",
                "n_bi" => "nulo"
            );
            VerificarSenhaAntiga($dados_enviados);   
        }
    }

    function CliqueBotaoAutenticar(){
        if(isset($_POST["btn_autenticar"])){
            $n_bi = $_POST["n_bi"];
            $senha = $_POST["senha"];
            $dados_enviados = Array(
                "id_apostador" => "nulo",
                "nome" => "nulo",
                "sobrenome" => "nulo",
                "email" => "nulo",
                "senha" => $senha,
                "nascimento" => "nulo",
                "genero" => "nulo",
                "n_bi" => $n_bi
            );
            VerificarUtilizadorBISenha($dados_enviados);
        }
    }

    function TratarData($data){
        $repartir_data = explode("-", $data);
        $data_tratada = $repartir_data[2] . "-" . $repartir_data[1] . "-" . $repartir_data[0];
        return $data_tratada;
    }

    function InstanciarObjectoApostador($dados_enviados){
        $apostador = new Apostador();
        $apostador->SetId( $dados_enviados["id"] );
        $apostador->SetNome( $dados_enviados["nome"] );
        $apostador->SetSobrenome( $dados_enviados["sobrenome"] );
        $apostador->SetEmail( $dados_enviados["email"] );
        $apostador->SetNascimento( $dados_enviados["nascimento"] );
        $apostador->SetGenero( $dados_enviados["genero"] );
        $apostador->SetN_bi( $dados_enviados["n_bi"] );
        return $apostador;
    }

    function VerificarExistenciaBI($apostador){
        $apostador_dao = new ApostadorDao();
        $retorno_listagem = $apostador_dao->ListarPorBI($apostador->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else{
            Cadastrar($apostador);
        }
    }

    function Cadastrar($apostador){
        $apostador_dao = new ApostadorDao();
        $retorno_sucesso = $apostador_dao->Cadastrar($apostador);
        if($retorno_sucesso){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }

    function VerificarIgualdadeBI($apostador){
        if( $_SESSION["n_bi_apostador"] == $apostador->GetN_bi()){
            $apostador_dao = new ApostadorDao();
            $retorno_sucesso = $apostador_dao->Actualizar($apostador);
            RetornarSucessoActualizar($retorno_sucesso);
        }else{
            BiDiferenteImpedirActualizar($apostador);
        }
    }

    function BiDiferenteImpedirActualizar($apostador){
        $apostador_dao = new ApostadorDao();
        $retorno_listagem = $apostador_dao->ListarPorBI($apostador->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else {
            Actualizar($apostador);
        }
    }

    function Actualizar($apostador){
        $apostador_dao = new ApostadorDao();
        $retorno_sucesso = $apostador_dao->Actualizar($apostador);
        RetornarSucessoActualizar($retorno_sucesso);
    }

    function RetornarSucessoActualizar($retorno_sucesso){
        if($retorno_sucesso){
            $apostador_dao = new ApostadorDao();
            $retorno_novos_dados = $apostador_dao->ListarPorId($_SESSION["id_apostador"]);
            CriarSessao($retorno_novos_dados);
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
            ProcessarEncaminharParaMeusDados();
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
        }
    }

    function ProcessarEncaminharParaMeusDados(){
        ?>
            Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            <script>
                setInterval(() => {
                    window.location = "../apostador/meus_dados.php";
                }, 3000);
            </script>
        <?php
    }

    function VerificarSenha($dados_enviados){
        $apostador_dao = new ApostadorDao();
        $retorno_verificao_senha = $apostador_dao->ListarPorIDSenha( $dados_enviados["id_apostador"], $dados_enviados["senha"]);
        if($retorno_verificao_senha){
            EliminarConta($dados_enviados);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha incorreta  <b> </font>";
        }
    }

    function EliminarConta($dados_enviados){
        $apostador_dao = new ApostadorDao();
        $retorno_sucesso = $apostador_dao->Eliminar( $dados_enviados["id_apostador"] );
        RetornarSucessoEliminarConta($retorno_sucesso);
    }

    function RetornarSucessoEliminarConta($retorno_sucesso){
        if($retorno_sucesso){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Conta eliminada com sucesso  <b> </font>";
            session_destroy();
            ProcessarEncaminharParaInicio();
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao tentar eliminar conta  <b> </font>";
        } 
    }

    function ProcessarEncaminharParaInicio(){
        ?>
            Encaminhado para Inicio... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            <script>
                setInterval(() => {
                    window.location = "../inicio";
                }, 3000);
            </script>
        <?php
    }

    function VerificarSenhaAntiga($dados_enviados){
        $apostador_dao = new ApostadorDao();
        $retorno_senha_antiga = $apostador_dao->ListarPorIDSenha($dados_enviados["id_apostador"], $dados_enviados["senha_antiga"]);
        if($retorno_senha_antiga){
            $retorno_sucesso = $apostador_dao->AlterarSenha($dados_enviados["id_apostador"], $dados_enviados["senha_nova"]);
            RetornarSucessoAlterarSenha($retorno_sucesso);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha antiga incorreta  <b> </font>";
        } 
    }

    function RetornarSucessoAlterarSenha($retorno_sucesso){
        if($retorno_sucesso){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Senha alterada com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao alterar senha  <b> </font>";
        }
    }

    function VerificarUtilizadorBISenha($dados_enviados){
        $apostador_dao = new ApostadorDao();
        $retorno_dados_utilizador = $apostador_dao->ListarPorBISenha( $dados_enviados["n_bi"], $dados_enviados["senha"] );
        if($retorno_dados_utilizador){
            CriarSessao($retorno_dados_utilizador);
            ProcessarEncaminharParaIndex();
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Utilizador Não Encontrado  <b> </font>";
        }
    }

    function ProcessarEncaminharParaIndex(){
        ?> 
            <script>
                window.location = "../apostador";
            </script> 
        <?php
    }

    function CriarSessao($dados_utilizador){
        $data_tratada = TratarData( $dados_utilizador["nascimento_apostador"] );
        $dados_enviados = Array(
            "id" => $dados_utilizador["id_apostador"],
            "nome" => $dados_utilizador["nome_apostador"],
            "sobrenome" => $dados_utilizador["sobrenome_apostador"],
            "email" => $dados_utilizador["email_apostador"],
            "senha" => $dados_utilizador["senha_apostador"],
            "nascimento" => $data_tratada,
            "genero" => $dados_utilizador["genero_apostador"],
            "n_bi" => $dados_utilizador["n_bi_apostador"]
        );
        CriarSessaoLogado($dados_enviados);
        CriarSessaoPorTipoAcesso($dados_enviados);
    }

    function CriarSessaoLogado($dados_enviados) {
        $_SESSION["id_logado"] = $dados_enviados["id"];
        $_SESSION["nome_logado"] = $dados_enviados["nome"];
        $_SESSION["sobrenome_logado"] = $dados_enviados["sobrenome"];
        $_SESSION["email_logado"] = $dados_enviados["email"];
        $_SESSION["senha_logado"] = $dados_enviados["senha"];
        $_SESSION["nascimento_logado"] = $dados_enviados["nascimento"];
        $_SESSION["genero_logado"] = $dados_enviados["genero"];
        $_SESSION["n_bi_logado"] = $dados_enviados["n_bi"];
        $_SESSION["tipo_acesso_logado"] = "apostador";
    }

    function CriarSessaoPorTipoAcesso($dados_enviados){
        $_SESSION["id_apostador"] = $dados_enviados["id"];
        $_SESSION["nome_apostador"] = $dados_enviados["nome"];
        $_SESSION["sobrenome_apostador"] = $dados_enviados["sobrenome"];
        $_SESSION["email_apostador"] = $dados_enviados["email"];
        $_SESSION["senha_apostador"] = $dados_enviados["senha"];
        $_SESSION["nascimento_apostador"] = $dados_enviados["nascimento"];
        $_SESSION["genero_apostador"] = $dados_enviados["genero"];
        $_SESSION["n_bi_apostador"] = $dados_enviados["n_bi"];
    }
?>