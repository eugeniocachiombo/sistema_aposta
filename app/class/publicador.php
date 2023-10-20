<?php

class Publicador extends Pessoa 
{
    function PublicarDataPartida($partida_publicada){
        $partida_publicada_dao = new PartidaPublicadaDao();
        $partida_publicada_dao->Cadastrar($partida_publicada);
    }

    function PublicarResultado($resultado_publicado){
        $resultado_publicado_dao = new ResultadoPublicadoDao();
        $resultado_publicado_dao->Cadastrar($resultado_publicado);
    }
}
