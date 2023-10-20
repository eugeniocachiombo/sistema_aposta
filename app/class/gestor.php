<?php

class Gestor extends Pessoa 
{
    function CadastrarEquipa($equipa){
        $equipa_dao = new EquipaDao();
        $equipa_dao->Cadastrar($equipa);
    }

    function CadastrarPartida($partida){
        $partida_dao = new PartidaDao();
        $partida_dao->Cadastrar($partida);
    }
}
