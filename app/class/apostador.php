<?php

class Apostador extends Pessoa 
{
    function Apostar($aposta){
        $aposta_dao = new ApostaDao();
        $aposta_dao->Cadastrar($aposta);
    }
}
