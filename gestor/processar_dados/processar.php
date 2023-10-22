<?php
    Cadastrar();
    Autenticar();

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
    
            $gestor = new Gestor();
            $gestor->SetId(0);
            $gestor->SetNome($nome);
            $gestor->SetSobrenome($sobrenome);
            $gestor->SetEmail($email);
            $gestor->SetSenha($senha);
            $gestor->SetNascimento($nascimento);
            $gestor->SetGenero($genero);
            $gestor->SetN_bi($n_bi);
    
            $gestor_dao = new GestorDao();
            $retorno_veritificao_bi = $gestor_dao->ListarPorBI($n_bi);
            
            if($retorno_veritificao_bi){

                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe um utilizador com este número de BI  <b> </font>";
            
            } else{

                $retorno_sucesso = $gestor_dao->Cadastrar($gestor);
                if($retorno_sucesso){
                    echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
                }else{
                    echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
                }

            }
            
        }
    }

    function Autenticar(){
        if(isset($_POST["btn_autenticar"])){

            $n_bi = $_POST["n_bi"];
            $senha = $_POST["senha"];
    
            $gestor_dao = new GestorDao();
            $retorno_autenticacao = $gestor_dao->ListarPorBISenha($n_bi, $senha);
            
            if($retorno_autenticacao){
                CriarSessao($retorno_autenticacao);
                ?> <script> window.location = "../gestor"; </script> <?php
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Utilizador Não Encontrado  <b> </font>";
            }
        }
    }

    function CriarSessao($retorno){

        $id = $retorno["id_gestor"];
        $nome = $retorno["nome_gestor"];
        $sobrenome = $retorno["sobrenome_gestor"];
        $email = $retorno["email_gestor"];
        $senha = $retorno["senha_gestor"];
        $nascimento = $retorno["nascimento_gestor"];
        $nascimento = explode("-", $nascimento);
        $nascimento = $nascimento[2] . "-" . $nascimento[1] . "-" . $nascimento[0];
        $genero = $retorno["genero_gestor"];
        $n_bi = $retorno["n_bi_gestor"];


        $_SESSION["id_logado"] = $id;
        $_SESSION["nome_logado"] = $nome;
        $_SESSION["sobrenome_logado"] = $sobrenome;


        $_SESSION["id_gestor"] = $id;
        $_SESSION["nome_gestor"] = $nome;
        $_SESSION["sobrenome_gestor"] = $sobrenome;
        $_SESSION["email_gestor"] = $email;
        $_SESSION["senha_gestor"] = $senha;
        $_SESSION["nascimento_gestor"] = $nascimento;
        $_SESSION["genero_gestor"] = $genero;
        $_SESSION["n_bi_gestor"] = $n_bi;
    }
?>