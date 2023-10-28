<?php

class Publicador extends Pessoa 
{
    function PublicarPartida($partida_publicada){
        $partida_publicada_dao = new PartidaPublicadaDao();
        $retorno_cadastro = $partida_publicada_dao->Cadastrar($partida_publicada);
        $this->RetornarSucessoCadastro($retorno_cadastro);
    }

    function PublicarResultado($resultado_publicado){
        $resultado_publicado_dao = new ResultadoPublicadoDao();
        $resultado_publicado_dao->Cadastrar($resultado_publicado);
        
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
