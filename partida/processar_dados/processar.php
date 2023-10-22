<?php
    
    Cadastrar();
    Actualizar();
    Eliminar();

    function Cadastrar(){
        if(isset($_POST["btn_cadastrar"])){

            $gestor = new Gestor();
            $gestor->SetId($_SESSION["id_gestor"]);
            $gestor->SetNome($_SESSION["nome_gestor"]);
            $gestor->SetSobrenome($_SESSION["sobrenome_gestor"]);
            $gestor->SetEmail($_SESSION["email_gestor"]);
            $gestor->SetNascimento($_SESSION["nascimento_gestor"]);
            $gestor->SetGenero($_SESSION["genero_gestor"]);
            $gestor->SetN_bi($_SESSION["n_bi_gestor"]);
    
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
            $gestor->SetId($_SESSION["id_gestor"]);
            $gestor->SetNome($_SESSION["nome_gestor"]);
            $gestor->SetSobrenome($_SESSION["sobrenome_gestor"]);
            $gestor->SetEmail($_SESSION["email_gestor"]);
            $gestor->SetNascimento($_SESSION["nascimento_gestor"]);
            $gestor->SetGenero($_SESSION["genero_gestor"]);
            $gestor->SetN_bi($_SESSION["n_bi_gestor"]);
            
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
            $gestor->SetId($_SESSION["id_gestor"]);
            $gestor->SetNome($_SESSION["nome_gestor"]);
            $gestor->SetSobrenome($_SESSION["sobrenome_gestor"]);
            $gestor->SetEmail($_SESSION["email_gestor"]);
            $gestor->SetNascimento($_SESSION["nascimento_gestor"]);
            $gestor->SetGenero($_SESSION["genero_gestor"]);
            $gestor->SetN_bi($_SESSION["n_bi_gestor"]);
            
            $id = $_POST["equipaA"];
            $id_equipaA = "default";
            $id_equipaB = "default";
    
            $equipaA = new Equipa($id_equipaA, "default");
            $equipaB = new Equipa($id_equipaB, "default");
            $partida = new Partida($id, $equipaA, $equipaB, $gestor);
            $gestor->EliminarPartida($partida);
        }
    }
    
?>