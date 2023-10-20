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
        $retorno = $apostador_dao->Cadastrar($apostador);
        
        if($retorno){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }
?>