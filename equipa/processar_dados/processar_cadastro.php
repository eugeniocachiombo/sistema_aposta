<?php
    
    if(isset($_POST["btn_cadastrar"])){

        $gestor = new Gestor();
        $gestor->SetId($_SESSION["id"]);
        $gestor->SetNome($_SESSION["nome"]);
        $gestor->SetSobrenome($_SESSION["sobrenome"]);
        $gestor->SetEmail($_SESSION["email"]);
        $gestor->SetSenha($_SESSION["senha"]);
        $gestor->SetNascimento($_SESSION["nascimento"]);
        $gestor->SetGenero($_SESSION["genero"]);
        $gestor->SetN_bi($_SESSION["n_bi"]);

        $nome = $_POST["nome"];
        $equipa = new Equipa(0, $nome);
        $gestor->CadastrarEquipa($equipa);
        
    }
?>