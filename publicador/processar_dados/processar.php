<?php
    Cadastrar();
    Actualizar();
    Autenticar();
    AlterarSenha();
    EliminarConta();

    function EliminarConta(){
        
        if(isset($_POST["btn_eliminar_conta"])){

            $id_publicador = $_SESSION["id_publicador"];
            $senha = $_POST["senha"];
    
            $publicador_dao = new PublicadorDao();
            $retorno_senha = $publicador_dao->ListarPorIDSenha($id_publicador, $senha);
            
            if($retorno_senha){

                $retorno_sucesso = $publicador_dao->Eliminar($id_publicador);
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

            $id_publicador = $_SESSION["id_publicador"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
    
            $publicador_dao = new PublicadorDao();
            $retorno_senha_antiga = $publicador_dao->ListarPorIDSenha($id_publicador, $senha_antiga);
            
            if($retorno_senha_antiga){

                $retorno_sucesso = $publicador_dao->AlterarSenha($id_publicador, $senha_nova);
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
    
            $publicador = new Publicador();
            $publicador->SetId(0);
            $publicador->SetNome($nome);
            $publicador->SetSobrenome($sobrenome);
            $publicador->SetEmail($email);
            $publicador->SetSenha($senha);
            $publicador->SetNascimento($nascimento);
            $publicador->SetGenero($genero);
            $publicador->SetN_bi($n_bi);
    
            $publicador_dao = new PublicadorDao();
            $retorno_veritificao_bi = $publicador_dao->ListarPorBI($n_bi);
            
            if($retorno_veritificao_bi){

                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
            
            } else{

                $retorno_sucesso = $publicador_dao->Cadastrar($publicador);
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

            $id = $_SESSION["id_publicador"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
    
            $nascimento = $_POST["nascimento"];
            $nascimento = explode("-", $nascimento);
            $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
    
            $genero = $_POST["genero"];
            $n_bi = $_POST["n_bi"];
    
            $publicador = new Publicador();
            $publicador->SetId($id);
            $publicador->SetNome($nome);
            $publicador->SetSobrenome($sobrenome);
            $publicador->SetEmail($email);
            $publicador->SetNascimento($nascimento);
            $publicador->SetGenero($genero);
            $publicador->SetN_bi($n_bi);
    
            $publicador_dao = new PublicadorDao();

            if( $_SESSION["n_bi_publicador"] == $n_bi){

                $retorno_sucesso = $publicador_dao->Actualizar($publicador);
                if($retorno_sucesso){

                    $retorno_novos_dados = $publicador_dao->ListarPorId($_SESSION["id_publicador"]);
                    CriarSessao($retorno_novos_dados);
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
                    
                    ?> 
                        Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <script>
                            setInterval(() => {
                                window.location = "../publicador/meus_dados.php";
                            }, 3000);
                        </script>
                    <?php

                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
                }

            }else{

                $retorno_veritificao_bi = $publicador_dao->ListarPorBI($n_bi);

                if($retorno_veritificao_bi){

                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
                
                } else {

                    $retorno_sucesso = $publicador_dao->Actualizar($publicador);
                    
                    if($retorno_sucesso){
                        $retorno_novos_dados = $publicador_dao->ListarPorId($_SESSION["id_publicador"]);
                        CriarSessao($retorno_novos_dados);
                        echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
                        
                        ?> 
                            Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <script>
                                setInterval(() => {
                                    window.location = "../publicador/meus_dados.php";
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
    
            $publicador_dao = new PublicadorDao();
            $retorno_autenticacao = $publicador_dao->ListarPorBISenha($n_bi, $senha);
            
            if($retorno_autenticacao){
                CriarSessao($retorno_autenticacao);
                ?> <script> window.location = "../publicador"; </script> <?php
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Utilizador Não Encontrado  <b> </font>";
            }
        }
    }

    function CriarSessao($retorno){

        $id = $retorno["id_publicador"];
        $nome = $retorno["nome_publicador"];
        $sobrenome = $retorno["sobrenome_publicador"];
        $email = $retorno["email_publicador"];
        $senha = $retorno["senha_publicador"];
        $nascimento = $retorno["nascimento_publicador"];
        $nascimento = explode("-", $nascimento);
        $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
        $genero = $retorno["genero_publicador"];
        $n_bi = $retorno["n_bi_publicador"];


        $_SESSION["id_logado"] = $id;
        $_SESSION["nome_logado"] = $nome;
        $_SESSION["sobrenome_logado"] = $sobrenome;
        $_SESSION["tipo_acesso_logado"] = "publicador";


        $_SESSION["id_publicador"] = $id;
        $_SESSION["nome_publicador"] = $nome;
        $_SESSION["sobrenome_publicador"] = $sobrenome;
        $_SESSION["email_publicador"] = $email;
        $_SESSION["senha_publicador"] = $senha;
        $_SESSION["nascimento_publicador"] = $nascimento;
        $_SESSION["genero_publicador"] = $genero;
        $_SESSION["n_bi_publicador"] = $n_bi;
    }
?>