<?php

class Gestor extends Pessoa 
{
    function CadastrarEquipa(){
        $partida = new Partida(1, "Real", "Barcelona", $this->GetNome());
        $partida_dao = new PartidaDao();
        $partida_dao->Cadastrar($partida);
    }

    function CadastrarPartida(){

    }
}
