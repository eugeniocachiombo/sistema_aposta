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
        $retorno = $administrador_dao->Cadastrar($administrador);
        
        if($retorno){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }
?>