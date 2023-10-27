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
            $gestor = InstanciarObjectoGestor($dados_enviados);
            VerificarExistenciaBI( $gestor );
        }
    }

    function CliqueBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id = $_SESSION["id_gestor"];
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
            $gestor = InstanciarObjectoGestor($dados_enviados);
            VerificarIgualdadeBI($gestor);
        }
    }

    function CliqueBotaoEliminarConta(){  
        if(isset($_POST["btn_eliminar_conta"])){
            $id_gestor = $_SESSION["id_gestor"];
            $senha = $_POST["senha"];
            $dados_enviados = Array(
                "id_gestor" => $id_gestor,
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
            $id_gestor = $_SESSION["id_gestor"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
            $dados_enviados = Array(
                "id_gestor" => $id_gestor,
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
                "id_gestor" => "nulo",
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

    function InstanciarObjectoGestor($dados_enviados){
        $gestor = new Gestor();
        $gestor->SetId( $dados_enviados["id"] );
        $gestor->SetNome( $dados_enviados["nome"] );
        $gestor->SetSobrenome( $dados_enviados["sobrenome"] );
        $gestor->SetEmail( $dados_enviados["email"] );
        $gestor->SetSenha( $dados_enviados["senha"] );
        $gestor->SetNascimento( $dados_enviados["nascimento"] );
        $gestor->SetGenero( $dados_enviados["genero"] );
        $gestor->SetN_bi( $dados_enviados["n_bi"] );
        return $gestor;
    }

    function VerificarExistenciaBI($gestor){
        $gestor_dao = new GestorDao();
        $retorno_listagem = $gestor_dao->ListarPorBI($gestor->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else{
            VerificarExistenciaEmail($gestor);
        }
    }

    function VerificarExistenciaEmail($gestor){
        $gestor_dao = new GestorDao();
        $retorno_listagem = $gestor_dao->ListarPorEmail($gestor->GetEmail());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este email  <b> </font>";
        } else{
            Cadastrar($gestor);
        }
    }

    function Cadastrar($gestor){
        $gestor_dao = new GestorDao();
        $retorno_sucesso = $gestor_dao->Cadastrar($gestor);
        if($retorno_sucesso){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
            LimparCampos();
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }

    function LimparCampos(){
        $_POST["id"] = "";
        $_POST["nome"] = "";
        $_POST["sobrenome"] = "";
        $_POST["email"] = "";
        $_POST["senha"] = "";
        $_POST["nascimento"] = "";
        $_POST["genero"] = "";
        $_POST["n_bi"] = "";
    }

    function VerificarIgualdadeBI($gestor){
        if( $_SESSION["n_bi_gestor"] == $gestor->GetN_bi()){
            $gestor_dao = new GestorDao();
            $retorno_sucesso = $gestor_dao->Actualizar($gestor);
            RetornarSucessoActualizar($retorno_sucesso);
        }else{
            BiDiferenteImpedirActualizar($gestor);
        }
    }

    function BiDiferenteImpedirActualizar($gestor){
        $gestor_dao = new GestorDao();
        $retorno_listagem = $gestor_dao->ListarPorBI($gestor->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else {
            Actualizar($gestor);
        }
    }

    function Actualizar($gestor){
        $gestor_dao = new GestorDao();
        $retorno_sucesso = $gestor_dao->Actualizar($gestor);
        RetornarSucessoActualizar($retorno_sucesso);
    }

    function RetornarSucessoActualizar($retorno_sucesso){
        if($retorno_sucesso){
            $gestor_dao = new GestorDao();
            $retorno_novos_dados = $gestor_dao->ListarPorId($_SESSION["id_gestor"]);
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
                    window.location = "../gestor/meus_dados.php";
                }, 3000);
            </script>
        <?php
    }

    function VerificarSenha($dados_enviados){
        $gestor_dao = new GestorDao();
        $retorno_verificao_senha = $gestor_dao->ListarPorIDSenha( $dados_enviados["id_gestor"], $dados_enviados["senha"]);
        if($retorno_verificao_senha){
            EliminarConta($dados_enviados);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha incorreta  <b> </font>";
        }
    }

    function EliminarConta($dados_enviados){
        $gestor_dao = new GestorDao();
        $retorno_sucesso = $gestor_dao->Eliminar( $dados_enviados["id_gestor"] );
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
        $gestor_dao = new GestorDao();
        $retorno_senha_antiga = $gestor_dao->ListarPorIDSenha($dados_enviados["id_gestor"], $dados_enviados["senha_antiga"]);
        if($retorno_senha_antiga){
            $retorno_sucesso = $gestor_dao->AlterarSenha($dados_enviados["id_gestor"], $dados_enviados["senha_nova"]);
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
        $gestor_dao = new GestorDao();
        $retorno_dados_utilizador = $gestor_dao->ListarPorBISenha( $dados_enviados["n_bi"], $dados_enviados["senha"] );
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
                window.location = "../gestor";
            </script> 
        <?php
    }

    function CriarSessao($dados_utilizador){
        $data_tratada = TratarData( $dados_utilizador["nascimento_gestor"] );
        $dados_enviados = Array(
            "id" => $dados_utilizador["id_gestor"],
            "nome" => $dados_utilizador["nome_gestor"],
            "sobrenome" => $dados_utilizador["sobrenome_gestor"],
            "email" => $dados_utilizador["email_gestor"],
            "senha" => $dados_utilizador["senha_gestor"],
            "nascimento" => $data_tratada,
            "genero" => $dados_utilizador["genero_gestor"],
            "n_bi" => $dados_utilizador["n_bi_gestor"]
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
        $_SESSION["tipo_acesso_logado"] = "gestor";
    }

    function CriarSessaoPorTipoAcesso($dados_enviados){
        $_SESSION["id_gestor"] = $dados_enviados["id"];
        $_SESSION["nome_gestor"] = $dados_enviados["nome"];
        $_SESSION["sobrenome_gestor"] = $dados_enviados["sobrenome"];
        $_SESSION["email_gestor"] = $dados_enviados["email"];
        $_SESSION["senha_gestor"] = $dados_enviados["senha"];
        $_SESSION["nascimento_gestor"] = $dados_enviados["nascimento"];
        $_SESSION["genero_gestor"] = $dados_enviados["genero"];
        $_SESSION["n_bi_gestor"] = $dados_enviados["n_bi"];
    }
?>