<?php
    Cadastrar();
    Actualizar();
    Autenticar();
    AlterarSenha();
    EliminarConta();

    function EliminarConta(){
        
        if(isset($_POST["btn_eliminar_conta"])){

            $id_apostador = $_SESSION["id_apostador"];
            $senha = $_POST["senha"];
    
            $apostador_dao = new ApostadorDao();
            $retorno_senha = $apostador_dao->ListarPorIDSenha($id_apostador, $senha);
            
            if($retorno_senha){

                $retorno_sucesso = $apostador_dao->Eliminar($id_apostador);
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

            $id_apostador = $_SESSION["id_apostador"];
            $senha_antiga = $_POST["senha_antiga"];
            $senha_nova = $_POST["senha_nova"];
    
            $apostador_dao = new ApostadorDao();
            $retorno_senha_antiga = $apostador_dao->ListarPorIDSenha($id_apostador, $senha_antiga);
            
            if($retorno_senha_antiga){

                $retorno_sucesso = $apostador_dao->AlterarSenha($id_apostador, $senha_nova);
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
    
            $apostador = new Apostador();
            $apostador->SetId(0);
            $apostador->SetNome($nome);
            $apostador->SetSobrenome($sobrenome);
            $apostador->SetEmail($email);
            $apostador->SetSenha($senha);
            $apostador->SetNascimento($nascimento);
            $apostador->SetGenero($genero);
            $apostador->SetN_bi($n_bi);
    
            $apostador_dao = new ApostadorDao();
            $retorno_veritificao_bi = $apostador_dao->ListarPorBI($n_bi);
            
            if($retorno_veritificao_bi){

                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
            
            } else{

                $retorno_sucesso = $apostador_dao->Cadastrar($apostador);
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

            $id = $_SESSION["id_apostador"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
    
            $nascimento = $_POST["nascimento"];
            $nascimento = explode("-", $nascimento);
            $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
    
            $genero = $_POST["genero"];
            $n_bi = $_POST["n_bi"];
    
            $apostador = new Apostador();
            $apostador->SetId($id);
            $apostador->SetNome($nome);
            $apostador->SetSobrenome($sobrenome);
            $apostador->SetEmail($email);
            $apostador->SetNascimento($nascimento);
            $apostador->SetGenero($genero);
            $apostador->SetN_bi($n_bi);
    
            $apostador_dao = new ApostadorDao();

            if( $_SESSION["n_bi_apostador"] == $n_bi){

                $retorno_sucesso = $apostador_dao->Actualizar($apostador);
                if($retorno_sucesso){

                    $retorno_novos_dados = $apostador_dao->ListarPorId($_SESSION["id_apostador"]);
                    CriarSessao($retorno_novos_dados);
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
                    
                    ?> 
                        Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <script>
                            setInterval(() => {
                                window.location = "../apostador/meus_dados.php";
                            }, 3000);
                        </script>
                    <?php

                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
                }

            }else{

                $retorno_veritificao_bi = $apostador_dao->ListarPorBI($n_bi);

                if($retorno_veritificao_bi){

                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
                
                } else {

                    $retorno_sucesso = $apostador_dao->Actualizar($apostador);
                    
                    if($retorno_sucesso){
                        $retorno_novos_dados = $apostador_dao->ListarPorId($_SESSION["id_apostador"]);
                        CriarSessao($retorno_novos_dados);
                        echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Dados actualizados com sucesso  <b> </font>";
                        
                        ?> 
                            Encaminhado para meus dados... <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <script>
                                setInterval(() => {
                                    window.location = "../apostador/meus_dados.php";
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
    
            $apostador_dao = new ApostadorDao();
            $retorno_autenticacao = $apostador_dao->ListarPorBISenha($n_bi, $senha);
            
            if($retorno_autenticacao){
                CriarSessao($retorno_autenticacao);
                ?> <script> window.location = "../apostador"; </script> <?php
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Utilizador Não Encontrado  <b> </font>";
            }
        }
    }

    function CriarSessao($retorno){

        $id = $retorno["id_apostador"];
        $nome = $retorno["nome_apostador"];
        $sobrenome = $retorno["sobrenome_apostador"];
        $email = $retorno["email_apostador"];
        $senha = $retorno["senha_apostador"];
        $nascimento = $retorno["nascimento_apostador"];
        $nascimento = explode("-", $nascimento);
        $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
        $genero = $retorno["genero_apostador"];
        $n_bi = $retorno["n_bi_apostador"];


        $_SESSION["id_logado"] = $id;
        $_SESSION["nome_logado"] = $nome;
        $_SESSION["sobrenome_logado"] = $sobrenome;
        $_SESSION["email_logado"] = $email;
        $_SESSION["senha_logado"] = $senha;
        $_SESSION["nascimento_logado"] = $nascimento;
        $_SESSION["genero_logado"] = $genero;
        $_SESSION["n_bi_logado"] = $n_bi;
        $_SESSION["tipo_acesso_logado"] = "apostador";


        $_SESSION["id_apostador"] = $id;
        $_SESSION["nome_apostador"] = $nome;
        $_SESSION["sobrenome_apostador"] = $sobrenome;
        $_SESSION["email_apostador"] = $email;
        $_SESSION["senha_apostador"] = $senha;
        $_SESSION["nascimento_apostador"] = $nascimento;
        $_SESSION["genero_apostador"] = $genero;
        $_SESSION["n_bi_apostador"] = $n_bi;
    }
?>