<?php
    CliqueNoBotaoCadastrar();
    CliqueNoBotaoActualizar();
    CliqueNoBotaoEliminar();

    function CliqueNoBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $nome = $_POST["nome"];
            $equipa = new Equipa(0, $nome);
            Cadastrar($equipa);
        }
    }

    function CliqueNoBotaoActualizar(){
        if(isset($_POST["btn_actualizar"])){
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $equipa = new Equipa($id, $nome);
            Actualizar($equipa);
        }
    }

    function CliqueNoBotaoEliminar(){
        if(isset($_POST["btn_eliminar"])){
            $id = $_POST["id"];
            $nome = "default";
            $equipa = new Equipa($id, $nome);
            Eliminar($equipa);
        }
    }

    function Cadastrar($equipa){
        $gestor = new Gestor();
        $gestor->CadastrarEquipa($equipa);
    }

    function Actualizar($equipa){
        $gestor = new Gestor();
        $gestor->ActualizarEquipa($equipa);
    }

    function Eliminar($equipa){
        $gestor = new Gestor();
        $gestor->EliminarEquipa($equipa);
    }
?>