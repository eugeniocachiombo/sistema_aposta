<?php
    Cadastrar();
    Actualizar();
    Autenticar();
    AlterarSenha();
    EliminarConta();

    function EliminarConta(){
        
        if(isset($_POST["btn_eliminar_conta"])){

            $id_administrador = $_SESSION["id_administrador"];
            $senha = $_POST["senha"];
    
            $administrador_dao = new AdministradorDao();
            $retorno_senha = $administrador_dao->ListarPorIDSenha($id_administrador, $senha);
            
            if($retorno_senha){

                $retorno_sucesso = $administrador_dao->Eliminar($id_administrador);
                if($retorno_sucesso){
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Conta eliminada com sucesso  <b> </font>";
                    session_destroy();
                    ?> 
                            Encaminhado para Inicio... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <script>
                                setInterval(() => {
                                    window.location = "../inicio";
                                }, 3000);
                            </script>
                    <?php
                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao tentar eliminar conta  <b> </font>";
                } 

            }else{

                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha incorreta  <b> </font>";
            
            }
        }
    }

    function AlterarSenha(){
        if(isset($_POST["btn_alterar_senha"])){

            $id_administrador = $_SESSION["id_administrador"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
    
            $administrador_dao = new AdministradorDao();
            $retorno_senha_antiga = $administrador_dao->ListarPorIDSenha($id_administrador, $senha_antiga);
            
            if($retorno_senha_antiga){

                $retorno_sucesso = $administrador_dao->AlterarSenha($id_administrador, $senha_nova);
                if($retorno_sucesso){
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Senha alterada com sucesso  <b> </font>";
                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao alterar senha  <b> </font>";
                }

            }else{

                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro!... senha antiga incorreta  <b> </font>";
            
            }      
        }
    }

    function Cadastrar(){
        if(isset($_POST["btn_cadastrar"])){

            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
    
            $nascimento = $_POST["nascimento"];
            $nascimento = explode("-", $nascimento);
            $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
    
            $genero = $_POST["genero"];
            $n_bi = $_POST["n_bi"];
    
            $administrador = new Administrador();
            $administrador->SetId(0);
            $administrador->SetNome($nome);
            $administrador->SetSobrenome($sobrenome);
            $administrador->SetEmail($email);
            $administrador->SetSenha($senha);
            $administrador->SetNascimento($nascimento);
            $administrador->SetGenero($genero);
            $administrador->SetN_bi($n_bi);
    
            $administrador_dao = new AdministradorDao();
            $retorno_veritificao_bi = $administrador_dao->ListarPorBI($n_bi);
            
            if($retorno_veritificao_bi){

                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
            
            } else{

                $retorno_sucesso = $administrador_dao->Cadastrar($administrador);
                if($retorno_sucesso){
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
                }

            }
            
        }
    }

    function Actualizar(){
        if(isset($_POST["btn_actualizar"])){

            $id = $_SESSION["id_administrador"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
    
            $nascimento = $_POST["nascimento"];
            $nascimento = explode("-", $nascimento);
            $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
    
            $genero = $_POST["genero"];
            $n_bi = $_POST["n_bi"];
    
            $administrador = new Administrador();
            $administrador->SetId($id);
            $administrador->SetNome($nome);
            $administrador->SetSobrenome($sobrenome);
            $administrador->SetEmail($email);
            $administrador->SetNascimento($nascimento);
            $administrador->SetGenero($genero);
            $administrador->SetN_bi($n_bi);
    
            $administrador_dao = new AdministradorDao();

            if( $_SESSION["n_bi_administrador"] == $n_bi){

                $retorno_sucesso = $administrador_dao->Actualizar($administrador);
                if($retorno_sucesso){

                    $retorno_novos_dados = $administrador_dao->ListarPorId($_SESSION["id_administrador"]);
                    CriarSessao($retorno_novos_dados);
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
                    
                    ?> 
                        Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <script>
                            setInterval(() => {
                                window.location = "../administrador/meus_dados.php";
                            }, 3000);
                        </script>
                    <?php

                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
                }

            }else{

                $retorno_veritificao_bi = $administrador_dao->ListarPorBI($n_bi);

                if($retorno_veritificao_bi){

                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
                
                } else {

                    $retorno_sucesso = $administrador_dao->Actualizar($administrador);
                    
                    if($retorno_sucesso){
                        $retorno_novos_dados = $administrador_dao->ListarPorId($_SESSION["id_administrador"]);
                        CriarSessao($retorno_novos_dados);
                        echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
                        
                        ?> 
                            Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <script>
                                setInterval(() => {
                                    window.location = "../administrador/meus_dados.php";
                                }, 3000);
                            </script>
                        <?php
                    }

                }
            }
            
        }
    }

    function Autenticar(){
        if(isset($_POST["btn_autenticar"])){

            $n_bi = $_POST["n_bi"];
            $senha = $_POST["senha"];
    
            $administrador_dao = new AdministradorDao();
            $retorno_autenticacao = $administrador_dao->ListarPorBISenha($n_bi, $senha);
            
            if($retorno_autenticacao){
                CriarSessao($retorno_autenticacao);
                ?> <script> window.location = "../administrador"; </script> <?php
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Utilizador Não Encontrado  <b> </font>";
            }
        }
    }

    function CriarSessao($retorno){

        $id = $retorno["id_administrador"];
        $nome = $retorno["nome_administrador"];
        $sobrenome = $retorno["sobrenome_administrador"];
        $email = $retorno["email_administrador"];
        $senha = $retorno["senha_administrador"];
        $nascimento = $retorno["nascimento_administrador"];
        $nascimento = explode("-", $nascimento);
        $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
        $genero = $retorno["genero_administrador"];
        $n_bi = $retorno["n_bi_administrador"];


        $_SESSION["id_logado"] = $id;
        $_SESSION["nome_logado"] = $nome;
        $_SESSION["sobrenome_logado"] = $sobrenome;
        $_SESSION["email_logado"] = $email;
        $_SESSION["senha_logado"] = $senha;
        $_SESSION["nascimento_logado"] = $nascimento;
        $_SESSION["genero_logado"] = $genero;
        $_SESSION["n_bi_logado"] = $n_bi;
        $_SESSION["tipo_acesso_logado"] = "administrador";


        $_SESSION["id_administrador"] = $id;
        $_SESSION["nome_administrador"] = $nome;
        $_SESSION["sobrenome_administrador"] = $sobrenome;
        $_SESSION["email_administrador"] = $email;
        $_SESSION["senha_administrador"] = $senha;
        $_SESSION["nascimento_administrador"] = $nascimento;
        $_SESSION["genero_administrador"] = $genero;
        $_SESSION["n_bi_administrador"] = $n_bi;
    }
?>