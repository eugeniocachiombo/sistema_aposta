<?php
    
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
        $retorno = $publicador_dao->Cadastrar($publicador);
        
        if($retorno){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }
?>