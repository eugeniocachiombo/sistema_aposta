<?php
    
    Cadastrar();
    Actualizar();
    Eliminar();

    function Cadastrar(){
        if(isset($_POST["btn_cadastrar"])){

            $gestor = new Gestor();
            $gestor->SetId($_SESSION["id_logado"]);
            $gestor->SetNome($_SESSION["nome_logado"]);
            $gestor->SetSobrenome($_SESSION["sobrenome_logado"]);
            $gestor->SetEmail($_SESSION["email_logado"]);
            $gestor->SetNascimento($_SESSION["nascimento_logado"]);
            $gestor->SetGenero($_SESSION["genero_logado"]);
            $gestor->SetN_bi($_SESSION["n_bi_logado"]);
    
            $id_equipaA = $_POST["equipaA"];
            $id_equipaB = $_POST["equipaB"];
    
            $equipaA = new Equipa($id_equipaA, "default");
            $equipaB = new Equipa($id_equipaB, "default");
            $partida = new Partida(0, $equipaA, $equipaB, $gestor);
            $gestor->CadastrarPartida($partida);
        }
    }

    function Actualizar(){
        if(isset($_POST["btn_actualizar"])){

            $gestor = new Gestor();
            $gestor->SetId($_SESSION["id_logado"]);
            $gestor->SetNome($_SESSION["nome_logado"]);
            $gestor->SetSobrenome($_SESSION["sobrenome_logado"]);
            $gestor->SetEmail($_SESSION["email_logado"]);
            $gestor->SetNascimento($_SESSION["nascimento_logado"]);
            $gestor->SetGenero($_SESSION["genero_logado"]);
            $gestor->SetN_bi($_SESSION["n_bi_logado"]);
            
            $id = $_POST["id"];
            $id_equipaA = $_POST["equipaA"];
            $id_equipaB = $_POST["equipaB"];
    
            $equipaA = new Equipa($id_equipaA, "default");
            $equipaB = new Equipa($id_equipaB, "default");
            $partida = new Partida($id, $equipaA, $equipaB, $gestor);
            $gestor->ActualizarPartida($partida);
        }
    }

    function Eliminar(){
        if(isset($_POST["btn_eliminar"])){

            $gestor = new Gestor();
            $gestor->SetId($_SESSION["id_logado"]);
            $gestor->SetNome($_SESSION["nome_logado"]);
            $gestor->SetSobrenome($_SESSION["sobrenome_logado"]);
            $gestor->SetEmail($_SESSION["email_logado"]);
            $gestor->SetNascimento($_SESSION["nascimento_logado"]);
            $gestor->SetGenero($_SESSION["genero_logado"]);
            $gestor->SetN_bi($_SESSION["n_bi_logado"]);
            
            $id = $_POST["id"];
            $equipaA = new Equipa(0, "default");
            $equipaB = new Equipa(0, "default");
            $partida = new Partida($id, $equipaA, $equipaB, $gestor);
            $gestor->EliminarPartida($partida);
        }
    }
    
?>