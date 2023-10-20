<?php

class Rendimento {
    
    private $id;
    private $valor_apostado;
    private $valor_ganho;
    
    function __construct($id, $valor_apostado, $valor_ganho) {
        $this->id = $id;
        $this->valor_apostado = $valor_apostado;
        $this->valor_ganho = $valor_ganho;
    }
    
    function GetId() {
        return $this->id;
    }

    function GetValor_apostado() {
        return $this->valor_apostado;
    }

    function GetValor_ganho() {
        return $this->valor_ganho;
    }

    function SetId($id) {
        $this->id = $id;
    }

    function SetValor_apostado($valor_apostado) {
        $this->valor_apostado = $valor_apostado;
    }

    function SetValor_ganho($valor_ganho) {
        $this->valor_ganho = $valor_ganho;
    }
}