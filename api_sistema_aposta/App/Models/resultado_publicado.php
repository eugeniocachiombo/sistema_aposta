<?php

class ResultadoPublicado 
{
    private $id;
    private $partida_pub;
    private $golos_equipaA;
    private $golos_equipaB;
    private $data_publicada;
    private $hora_publicada;
    private $publicador;
    
    function __construct($id, $partida_pub, $golos_equipaA, $golos_equipaB, $data_publicada, $hora_publicada, $publicador) {
        $this->id = $id;
        $this->partida_pub = $partida_pub;
        $this->golos_equipaA = $golos_equipaA;
        $this->golos_equipaB = $golos_equipaB;
        $this->data_publicada = $data_publicada;
        $this->hora_publicada = $hora_publicada;
        $this->publicador = $publicador;
    }
    
    function GetId() {
        return $this->id;
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

    function GetData_publicada() {
        return $this->data_publicada;
    }

    function GetHora_publicada() {
        return $this->hora_publicada;
    }

    function GetPublicador() {
        return $this->publicador;
    }

    function SetId($id) {
        $this->id = $id;
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

    function SetData_publicada($data_publicada) {
        $this->data_publicada = $data_publicada;
    }

    function SetHora_publicada($hora_publicada) {
        $this->hora_publicada = $hora_publicada;
    }

    function SetPublicador($publicador) {
        $this->publicador = $publicador;
    }

}
