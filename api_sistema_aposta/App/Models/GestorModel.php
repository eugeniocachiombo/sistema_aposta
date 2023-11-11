<?php

namespace App\Models;
use App\Models\Pessoa;

class GestorModel extends Pessoa 
{
    function CadastrarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno_cadastro = $equipa_dao->Cadastrar($equipa);
        $this->RetornarSucessoCadastro($retorno_cadastro);
    }

    function ActualizarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno_cadastro = $equipa_dao->Actualizar($equipa);
        $this->RetornarSucessoActualizar($retorno_cadastro);
    }

    function EliminarEquipa($equipa){
        $id_equipa = $equipa->GetId();
        $equipa_dao = new EquipaDao();
        $retorno_eliminar = $equipa_dao->Eliminar($id_equipa);
        $this->RetornarSucessoEliminar($retorno_eliminar);
    }

    function CadastrarPartida($partida){
        $partida_dao = new PartidaDao();
        $retorno_cadastro = $partida_dao->Cadastrar($partida);
        $this->RetornarSucessoCadastro($retorno_cadastro);
    }

    function ActualizarPartida($partida){
        $partida_dao = new PartidaDao();
        $retorno_actualizar = $partida_dao->Actualizar($partida);
        $this->RetornarSucessoActualizar($retorno_actualizar);
    }

    function EliminarPartida($partida){
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