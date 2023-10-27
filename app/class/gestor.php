<?php

class Gestor extends Pessoa 
{
    function CadastrarEquipa($equipa){
        $retorno_consulta_nome = $this->ListarEquipaPeloNome($equipa);
        $this->VerificarExistenciaNomeEquipaCadastrar($retorno_consulta_nome, $equipa);
    }

    function ActualizarEquipa($equipa){
        $retorno_consulta_nome = $this->ListarEquipaPeloNome($equipa);
        $this->VerificarExistenciaNomeEquipaActualizar($retorno_consulta_nome, $equipa);
    }

    function EliminarEquipa($equipa){
        $this->TentarEliminarEquipa($equipa);
    }

    function ListarEquipaPeloNome($equipa){
        $nome_equipa = $equipa->GetNome();
        $equipa_dao = new EquipaDao();
        return $equipa_dao->ListarPorNome($nome_equipa);
    }

    function VerificarExistenciaNomeEquipaCadastrar($retorno_consulta_nome, $equipa){
        if($retorno_consulta_nome){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe equipa com este nome  <b> </font>";
        }else{
            $this->TentarCadastrarEquipa($equipa);
        }
    }

    function TentarCadastrarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno_cadastro = $equipa_dao->Cadastrar($equipa);
        $this->RetornarSucessoCadastro($retorno_cadastro);
    }
    
    function VerificarExistenciaNomeEquipaActualizar($retorno_consulta_nome, $equipa){
        if($retorno_consulta_nome){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe equipa com este nome  <b> </font>";
        }else{
            $this->TentarActualizarEquipa($equipa);
        }
    }

    function TentarActualizarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno_actualizar = $equipa_dao->Actualizar($equipa);
        $this->RetornarSucessoActualizar($retorno_actualizar);
    }

    function TentarEliminarEquipa($equipa){
        $id_equipa = $equipa->GetId();
        $equipa_dao = new EquipaDao();
        $retorno_eliminar = $equipa_dao->Eliminar($id_equipa);
        $this->RetornarSucessoEliminar($retorno_eliminar);
    }

    function CadastrarPartida($partida){
        $equipaA = $partida->GetEquipaA()->GetId();
        $equipaB = $partida->GetEquipaB()->GetId();
        $retorno_consulta_equipas = $this->ListarPelasEquipas($equipaA, $equipaB);
        $this->VerificarExistenciaPartidaCadastrar($retorno_consulta_equipas, $partida);
    }

    function ActualizarPartida($partida){
        $equipaA = $partida->GetEquipaA()->GetId();
        $equipaB = $partida->GetEquipaB()->GetId();
        $retorno_consulta_equipas = $this->ListarPelasEquipas($equipaA, $equipaB);
        $id_consulta = $retorno_consulta_equipas["id_partida"];
        $this->VerificarIdsEntrePartidas($id_consulta, $partida);
    }

    function EliminarPartida($partida){
        $this->TentarEliminarPartida($partida);
    }
    
    function ListarPelasEquipas($equipaA, $equipaB){
        $partida_dao = new PartidaDao();
        $retorno_consulta_equipas = $partida_dao->ListarPorEquipas($equipaA, $equipaB);
        return $retorno_consulta_equipas;
    }

    function VerificarExistenciaPartidaCadastrar($retorno_consulta_equipas, $partida){
        if($retorno_consulta_equipas){
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe partida com estas equipas  <b> </font>";
        }else{
            $this->TentarCadastrarPartida($partida);
        }
    }

    function TentarCadastrarPartida($partida){
        $partida_dao = new PartidaDao();
        $retorno_cadastro = $partida_dao->Cadastrar($partida);
        $this->RetornarSucessoCadastro($retorno_cadastro);
    }

    function VerificarIdsEntrePartidas($id_consulta, $partida){
        $id_partida = $partida->GetId();
        if( $id_consulta == $id_partida){
            $this->TentarActualizarPartida($partida);
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Impossível actualizar a partida  <b> </font>";
        }
    }

    function TentarActualizarPartida($partida){
        $partida_dao = new PartidaDao();
        $retorno_actualizar = $partida_dao->Actualizar($partida);
        $this->RetornarSucessoActualizar($retorno_actualizar);
    }

    function TentarEliminarPartida($partida){
        $id_partida = $partida->GetId();
        $partida_dao = new PartidaDao();
        $retorno_eliminar = $partida_dao->Eliminar($id_partida);
        $this->RetornarSucessoEliminar($retorno_eliminar);
    }

    function RetornarSucessoCadastro($retorno_cadastro){
        if($retorno_cadastro){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
        }
    }

    function RetornarSucessoActualizar($retorno_actualizar){
        if($retorno_actualizar){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Actualizado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
        }
    }
    
    function RetornarSucessoEliminar($retorno_eliminar){
        if($retorno_eliminar){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Eliminado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao eliminar  <b> </font>";
        }
    }
}