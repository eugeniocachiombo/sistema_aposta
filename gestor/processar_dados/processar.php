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
            $retorno = $gestor_dao->Cadastrar($gestor);
            
            if($retorno){
                echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
            }
        }
    }

    function Autenticar(){
        if(isset($_POST["btn_autenticar"])){

            $n_bi = $_POST["n_bi"];
            $senha = $_POST["senha"];
    
            $gestor_dao = new GestorDao();
            $retorno = $gestor_dao->ListarPorBISenha($n_bi, $senha);
            
            if($retorno){
                CriarSessao($retorno);
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


        $_SESSION["id"] = $nome;
        $_SESSION["nome"] = $nome;
        $_SESSION["sobrenome"] = $sobrenome;
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        $_SESSION["nascimento"] = $nascimento;
        $_SESSION["genero"] = $genero;
        $_SESSION["n_bi"] = $n_bi;
    }
?>