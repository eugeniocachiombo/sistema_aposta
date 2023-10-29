<?php

class Apostador extends Pessoa 
{
    function CadastrarApostar($aposta){
        $aposta_dao = new ApostaDao();
        $retorno_cadastro = $aposta_dao->Cadastrar($aposta);
        $this->RetornarSucessoCadastro($retorno_cadastro);
    }

    function EliminarAposta($aposta){
        $retorno_eliminar = $this->aposta_dao->Eliminar($aposta);
        $this->RetornarSucessoEliminar($retorno_eliminar);
    }

    function RetornarSucessoCadastro($retorno_cadastro){
        if($retorno_cadastro){
            echo "<font class='bg-success text-white text-center p-2 mb-2'> <b> Cadastrado com sucesso  <b> </font>";
        }else{
            echo "<font class='bg-danger text-white text-center p-2 mb-2'> <b> Erro ao cadastrar  <b> </font>";
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
