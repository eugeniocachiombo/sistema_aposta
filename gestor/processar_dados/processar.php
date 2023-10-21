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
                echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Encontrado  <b> </font>";
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Utilizador Não Encontrado  <b> </font>";
            }
        }
    }
?>