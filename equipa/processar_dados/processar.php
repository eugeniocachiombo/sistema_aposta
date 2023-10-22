<?php
    Cadastrar();
    Actualizar();
    Eliminar();

    function Cadastrar(){
        if(isset($_POST["btn_cadastrar"])){

            $nome = $_POST["nome"];
            $equipa = new Equipa(0, $nome);
    
            $gestor = new Gestor();
            $gestor->CadastrarEquipa($equipa);
        }
    }

    function Actualizar(){
        if(isset($_POST["btn_actualizar"])){

            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $equipa = new Equipa($id, $nome);
    
            $gestor = new Gestor();
            $gestor->ActualizarEquipa($equipa);
        }
    }

    function Eliminar(){
        if(isset($_POST["btn_eliminar"])){

            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $equipa = new Equipa($id, "default");
    
            $gestor = new Gestor();
            $gestor->EliminarEquipa($equipa);
        }
    }
?>