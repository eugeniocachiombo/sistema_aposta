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
            $publicador = InstanciarObjectoPublicador($dados_enviados);
            VerificarExistenciaBI( $publicador );
        }
    }

    function CliqueBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id = $_SESSION["id_publicador"];
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
            $publicador = InstanciarObjectoPublicador($dados_enviados);
            VerificarIgualdadeBI($publicador);
        }
    }

    function CliqueBotaoEliminarConta(){  
        if(isset($_POST["btn_eliminar_conta"])){
            $id_publicador = $_SESSION["id_publicador"];
            $senha = $_POST["senha"];
            $dados_enviados = Array(
                "id_publicador" => $id_publicador,
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
            $id_publicador = $_SESSION["id_publicador"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
            $dados_enviados = Array(
                "id_publicador" => $id_publicador,
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
                "id_publicador" => "nulo",
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

    function InstanciarObjectoPublicador($dados_enviados){
        $publicador = new Publicador();
        $publicador->SetId( $dados_enviados["id"] );
        $publicador->SetNome( $dados_enviados["nome"] );
        $publicador->SetSobrenome( $dados_enviados["sobrenome"] );
        $publicador->SetEmail( $dados_enviados["email"] );
        $publicador->SetSenha( $dados_enviados["senha"] );
        $publicador->SetNascimento( $dados_enviados["nascimento"] );
        $publicador->SetGenero( $dados_enviados["genero"] );
        $publicador->SetN_bi( $dados_enviados["n_bi"] );
        return $publicador;
    }

    function VerificarExistenciaBI($publicador){
        $publicador_dao = new PublicadorDao();
        $retorno_listagem = $publicador_dao->ListarPorBI($publicador->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else{
            VerificarExistenciaEmail($publicador);
        }
    }

    function VerificarExistenciaEmail($publicador){
        $publicador_dao = new PublicadorDao();
        $retorno_listagem = $publicador_dao->ListarPorEmail($publicador->GetEmail());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este email  <b> </font>";
        } else{
            Cadastrar($publicador);
        }
    }

    function Cadastrar($publicador){
        $publicador_dao = new PublicadorDao();
        $retorno_sucesso = $publicador_dao->Cadastrar($publicador);
        if($retorno_sucesso){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }

    function VerificarIgualdadeBI($publicador){
        if( $_SESSION["n_bi_publicador"] == $publicador->GetN_bi()){
            $publicador_dao = new PublicadorDao();
            $retorno_sucesso = $publicador_dao->Actualizar($publicador);
            RetornarSucessoActualizar($retorno_sucesso);
        }else{
            BiDiferenteImpedirActualizar($publicador);
        }
    }

    function BiDiferenteImpedirActualizar($publicador){
        $publicador_dao = new PublicadorDao();
        $retorno_listagem = $publicador_dao->ListarPorBI($publicador->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else {
            Actualizar($publicador);
        }
    }

    function Actualizar($publicador){
        $publicador_dao = new PublicadorDao();
        $retorno_sucesso = $publicador_dao->Actualizar($publicador);
        RetornarSucessoActualizar($retorno_sucesso);
    }

    function RetornarSucessoActualizar($retorno_sucesso){
        if($retorno_sucesso){
            $publicador_dao = new PublicadorDao();
            $retorno_novos_dados = $publicador_dao->ListarPorId($_SESSION["id_publicador"]);
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
                    window.location = "../publicador/meus_dados.php";
                }, 3000);
            </script>
        <?php
    }

    function VerificarSenha($dados_enviados){
        $publicador_dao = new PublicadorDao();
        $retorno_verificao_senha = $publicador_dao->ListarPorIDSenha( $dados_enviados["id_publicador"], $dados_enviados["senha"]);
        if($retorno_verificao_senha){
            EliminarConta($dados_enviados);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha incorreta  <b> </font>";
        }
    }

    function EliminarConta($dados_enviados){
        $publicador_dao = new PublicadorDao();
        $retorno_sucesso = $publicador_dao->Eliminar( $dados_enviados["id_publicador"] );
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
        $publicador_dao = new PublicadorDao();
        $retorno_senha_antiga = $publicador_dao->ListarPorIDSenha($dados_enviados["id_publicador"], $dados_enviados["senha_antiga"]);
        if($retorno_senha_antiga){
            $retorno_sucesso = $publicador_dao->AlterarSenha($dados_enviados["id_publicador"], $dados_enviados["senha_nova"]);
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
        $publicador_dao = new PublicadorDao();
        $retorno_dados_utilizador = $publicador_dao->ListarPorBISenha( $dados_enviados["n_bi"], $dados_enviados["senha"] );
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
                window.location = "../publicador";
            </script> 
        <?php
    }

    function CriarSessao($dados_utilizador){
        $data_tratada = TratarData( $dados_utilizador["nascimento_publicador"] );
        $dados_enviados = Array(
            "id" => $dados_utilizador["id_publicador"],
            "nome" => $dados_utilizador["nome_publicador"],
            "sobrenome" => $dados_utilizador["sobrenome_publicador"],
            "email" => $dados_utilizador["email_publicador"],
            "senha" => $dados_utilizador["senha_publicador"],
            "nascimento" => $data_tratada,
            "genero" => $dados_utilizador["genero_publicador"],
            "n_bi" => $dados_utilizador["n_bi_publicador"]
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
        $_SESSION["tipo_acesso_logado"] = "publicador";
    }

    function CriarSessaoPorTipoAcesso($dados_enviados){
        $_SESSION["id_publicador"] = $dados_enviados["id"];
        $_SESSION["nome_publicador"] = $dados_enviados["nome"];
        $_SESSION["sobrenome_publicador"] = $dados_enviados["sobrenome"];
        $_SESSION["email_publicador"] = $dados_enviados["email"];
        $_SESSION["senha_publicador"] = $dados_enviados["senha"];
        $_SESSION["nascimento_publicador"] = $dados_enviados["nascimento"];
        $_SESSION["genero_publicador"] = $dados_enviados["genero"];
        $_SESSION["n_bi_publicador"] = $dados_enviados["n_bi"];
    }
?>