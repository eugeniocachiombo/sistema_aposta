<?php

class Gestor extends Pessoa 
{
    function CadastrarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno_nome = $equipa_dao->ListarPorNome($equipa->GetNome());
        
        if($retorno_nome){
            
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe equipa com este nome  <b> </font>";
        
        }else{

            $retorno_cadastro = $equipa_dao->Cadastrar($equipa);
            if($retorno_cadastro){
                echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
            }

        }
    }

    function ActualizarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno_nome = $equipa_dao->ListarPorNome($equipa->GetNome());
        
        if($retorno_nome){

            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe equipa com este nome  <b> </font>";
        
        }else{

            $retorno = $equipa_dao->Actualizar($equipa);
            if($retorno){
                echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Actualizado com sucesso  <b> </font>";
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
            }

        }
    }

    function EliminarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $retorno = $equipa_dao->Eliminar($equipa->GetId());

        if($retorno){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Eliminado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao eliminar  <b> </font>";
        }
    }

    function CadastrarPartida($partida){
        
        $equipaA = $partida->GetEquipaA()->GetId();
        $equipaB = $partida->GetEquipaB()->GetId();
        
        $partida_dao = new PartidaDao();
        $retorno = $partida_dao->ListarPorEuipas($equipaA, $equipaB);
        
        if($retorno){
            
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe partida com estas equipas  <b> </font>";
        
        }else{

            $retorno_cadastro = $partida_dao->Cadastrar($partida);
            if($retorno_cadastro){
                echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Criado com sucesso  <b> </font>";
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao criar  <b> </font>";
            }

        }
    }

    function ActualizarPartida($partida){
        $partida_dao = new PartidaDao();
        $retorno_nome = $partida_dao->ListarPorNome($partida->GetNome());
        
        if($retorno_nome){

            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Já existe partida com este nome  <b> </font>";
        
        }else{

            $retorno = $partida_dao->Actualizar($partida);
            if($retorno){
                echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Actualizado com sucesso  <b> </font>";
            }else{
                echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao actualizar  <b> </font>";
            }

        }
    }

    function EliminarPartida($partida){
        $partida_dao = new PartidaDao();
        $retorno = $partida_dao->Eliminar($partida->GetId());

        if($retorno){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Eliminado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao eliminar  <b> </font>";
        }
    }
    
}