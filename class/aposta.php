<?php

class Aposta {

    private $id;
    private $apostador;
    private $partida_pub;
    private $golos_equipaA;
    private $golos_equipaB;
    private $data_aposta;
    private $hora_aposta;
    private $valor_apostado;
    
    function __construct($id, $apostador, $partida_pub, $golos_equipaA, $golos_equipaB, $data_aposta, $hora_aposta, $valor_apostado) {
        $this->id = $id;
        $this->apostador = $apostador;
        $this->partida_pub = $partida_pub;
        $this->golos_equipaA = $golos_equipaA;
        $this->golos_equipaB = $golos_equipaB;
        $this->data_aposta = $data_aposta;
        $this->hora_aposta = $hora_aposta;
        $this->valor_apostado = $valor_apostado;
    }
    
    function GetId() {
        return $this->id;
    }

    function GetApostador() {
        return $this->apostador;
    }

    function GetPartida_pub() {
        return $this->partida_pub;
    }

    function GetGolos_equipaA() {
        return $this->golos_equipaA;
    }

    function GetGolos_equipaB() {
        return $this->golos_equipaB;
    }

    function GetData_aposta() {
        return $this->data_aposta;
    }

    function GetHora_aposta() {
        return $this->hora_aposta;
    }

    function GetValor_apostado() {
        return $this->valor_apostado;
    }

    function SetId($id) {
        $this->id = $id;
    }

    function SetApostador($apostador) {
        $this->apostador = $apostador;
    }

    function SetPartida_pub($partida_pub) {
        $this->partida_pub = $partida_pub;
    }

    function SetGolos_equipaA($golos_equipaA) {
        $this->golos_equipaA = $golos_equipaA;
    }

    function SetGolos_equipaB($golos_equipaB) {
        $this->golos_equipaB = $golos_equipaB;
    }

    function SetData_aposta($data_aposta) {
        $this->data_aposta = $data_aposta;
    }

    function SetHora_aposta($hora_aposta) {
        $this->hora_aposta = $hora_aposta;
    }

    function SetValor_apostado($valor_apostado) {
        $this->valor_apostado = $valor_apostado;
    }

}
