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

        $id_equipaA = $_POST["equipaA"];
        $id_equipaB = $_POST["equipaB"];

        $equipaA = new Equipa($id_equipaA, "default");
        $equipaB = new Equipa($id_equipaB, "default");
        $partida = new Partida(0, $equipaA, $equipaB, $gestor);
        $gestor->CadastrarPartida($partida);
    }
?>