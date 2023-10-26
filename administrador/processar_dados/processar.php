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
            $administrador = InstanciarObjectoAdministrador($dados_enviados);
            VerificarExistenciaBI( $administrador );
        }
    }

    function CliqueBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id = $_SESSION["id_administrador"];
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
            $administrador = InstanciarObjectoAdministrador($dados_enviados);
            VerificarIgualdadeBI($administrador);
        }
    }

    function CliqueBotaoEliminarConta(){  
        if(isset($_POST["btn_eliminar_conta"])){
            $id_administrador = $_SESSION["id_administrador"];
            $senha = $_POST["senha"];
            $dados_enviados = Array(
                "id_administrador" => $id_administrador,
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
            $id_administrador = $_SESSION["id_administrador"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
            $dados_enviados = Array(
                "id_administrador" => $id_administrador,
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
                "id_administrador" => "nulo",
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

    function InstanciarObjectoAdministrador($dados_enviados){
        $administrador = new Administrador();
        $administrador->SetId( $dados_enviados["id"] );
        $administrador->SetNome( $dados_enviados["nome"] );
        $administrador->SetSobrenome( $dados_enviados["sobrenome"] );
        $administrador->SetEmail( $dados_enviados["email"] );
        $administrador->SetSenha( $dados_enviados["senha"] );
        $administrador->SetNascimento( $dados_enviados["nascimento"] );
        $administrador->SetGenero( $dados_enviados["genero"] );
        $administrador->SetN_bi( $dados_enviados["n_bi"] );
        return $administrador;
    }

    function VerificarExistenciaBI($administrador){
        $administrador_dao = new AdministradorDao();
        $retorno_listagem = $administrador_dao->ListarPorBI($administrador->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else{
            VerificarExistenciaEmail($administrador);
        }
    }

    function VerificarExistenciaEmail($administrador){
        $administrador_dao = new AdministradorDao();
        $retorno_listagem = $administrador_dao->ListarPorEmail($administrador->GetEmail());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este email  <b> </font>";
        } else{
            Cadastrar($administrador);
        }
    }

    function Cadastrar($administrador){
        $administrador_dao = new AdministradorDao();
        $retorno_sucesso = $administrador_dao->Cadastrar($administrador);
        if($retorno_sucesso){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }

    function VerificarIgualdadeBI($administrador){
        if( $_SESSION["n_bi_administrador"] == $administrador->GetN_bi()){
            $administrador_dao = new AdministradorDao();
            $retorno_sucesso = $administrador_dao->Actualizar($administrador);
            RetornarSucessoActualizar($retorno_sucesso);
        }else{
            BiDiferenteImpedirActualizar($administrador);
        }
    }

    function BiDiferenteImpedirActualizar($administrador){
        $administrador_dao = new AdministradorDao();
        $retorno_listagem = $administrador_dao->ListarPorBI($administrador->GetN_bi());
        if($retorno_listagem){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
        } else {
            Actualizar($administrador);
        }
    }

    function Actualizar($administrador){
        $administrador_dao = new AdministradorDao();
        $retorno_sucesso = $administrador_dao->Actualizar($administrador);
        RetornarSucessoActualizar($retorno_sucesso);
    }

    function RetornarSucessoActualizar($retorno_sucesso){
        if($retorno_sucesso){
            $administrador_dao = new AdministradorDao();
            $retorno_novos_dados = $administrador_dao->ListarPorId($_SESSION["id_administrador"]);
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
                    window.location = "../administrador/meus_dados.php";
                }, 3000);
            </script>
        <?php
    }

    function VerificarSenha($dados_enviados){
        $administrador_dao = new AdministradorDao();
        $retorno_verificao_senha = $administrador_dao->ListarPorIDSenha( $dados_enviados["id_administrador"], $dados_enviados["senha"]);
        if($retorno_verificao_senha){
            EliminarConta($dados_enviados);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha incorreta  <b> </font>";
        }
    }

    function EliminarConta($dados_enviados){
        $administrador_dao = new AdministradorDao();
        $retorno_sucesso = $administrador_dao->Eliminar( $dados_enviados["id_administrador"] );
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
        $administrador_dao = new AdministradorDao();
        $retorno_senha_antiga = $administrador_dao->ListarPorIDSenha($dados_enviados["id_administrador"], $dados_enviados["senha_antiga"]);
        if($retorno_senha_antiga){
            $retorno_sucesso = $administrador_dao->AlterarSenha($dados_enviados["id_administrador"], $dados_enviados["senha_nova"]);
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
        $administrador_dao = new AdministradorDao();
        $retorno_dados_utilizador = $administrador_dao->ListarPorBISenha( $dados_enviados["n_bi"], $dados_enviados["senha"] );
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
                window.location = "../administrador";
            </script> 
        <?php
    }

    function CriarSessao($dados_utilizador){
        $data_tratada = TratarData( $dados_utilizador["nascimento_administrador"] );
        $dados_enviados = Array(
            "id" => $dados_utilizador["id_administrador"],
            "nome" => $dados_utilizador["nome_administrador"],
            "sobrenome" => $dados_utilizador["sobrenome_administrador"],
            "email" => $dados_utilizador["email_administrador"],
            "senha" => $dados_utilizador["senha_administrador"],
            "nascimento" => $data_tratada,
            "genero" => $dados_utilizador["genero_administrador"],
            "n_bi" => $dados_utilizador["n_bi_administrador"]
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
        $_SESSION["tipo_acesso_logado"] = "administrador";
    }

    function CriarSessaoPorTipoAcesso($dados_enviados){
        $_SESSION["id_administrador"] = $dados_enviados["id"];
        $_SESSION["nome_administrador"] = $dados_enviados["nome"];
        $_SESSION["sobrenome_administrador"] = $dados_enviados["sobrenome"];
        $_SESSION["email_administrador"] = $dados_enviados["email"];
        $_SESSION["senha_administrador"] = $dados_enviados["senha"];
        $_SESSION["nascimento_administrador"] = $dados_enviados["nascimento"];
        $_SESSION["genero_administrador"] = $dados_enviados["genero"];
        $_SESSION["n_bi_administrador"] = $dados_enviados["n_bi"];
    }
?>