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
            openssl_encrypt("1234", 'aes-256-cbc', 12, 0, openssl_random_pseudo_bytes(16));
            
            $cripto = openssl_decrypt("123", 'aes-256-cbc', 12, 0, openssl_random_pseudo_bytes(16));
            echo "<br> Saida: " . $cripto; 

            echo "<pre>";
            //var_dump($retorno);
            echo "</pre>";
    
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