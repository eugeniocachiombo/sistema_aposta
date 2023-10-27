<?php
    CliqueNoBotaoCadastrar();
    CliqueNoBotaoActualizar();
    CliqueNoBotaoEliminar();

    function CliqueNoBotaoCadastrar(){
        if(isset($_POST["btn_cadastrar"])){
            $nome = $_POST["nome"];
            $equipa = new Equipa(0, $nome);
            ListarEquipaPeloNomeECadastrar($equipa);
        }
    }

    function ListarEquipaPeloNomeECadastrar($equipa){
        $nome_equipa = $equipa->GetNome();
        $equipa_dao = new EquipaDao();
        $retorno_consulta_nome = $equipa_dao->ListarPorNome($nome_equipa);
        VerificarExistenciaNomeEquipaCadastrar($retorno_consulta_nome, $equipa);
    }

    function VerificarExistenciaNomeEquipaCadastrar($retorno_consulta_nome, $equipa){
        if($retorno_consulta_nome){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe equipa com este nome  <b> </font>";
        }else{
            Cadastrar($equipa);
        }
    }

    function Cadastrar($equipa){
        $gestor = new gestor();
        $gestor->CadastrarEquipa($equipa);
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

    function Actualizar($equipa){
        $gestor = new Gestor();
        $gestor->ActualizarEquipa($equipa);
    }

    function Eliminar($equipa){
        $gestor = new Gestor();
        $gestor->EliminarEquipa($equipa);
    }
?>