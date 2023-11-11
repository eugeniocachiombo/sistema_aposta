<?php

namespace App\Models;

class PartidaPublicadaModel {

    private $id;
    private $partida;
    private $data_partida;
    private $hora_partida;
    private $data_publicada;
    private $hora_publicada;
    private $publicador;

    function __construct($id, $partida, $data_partida, $hora_partida, $data_publicada, $hora_publicada, $publicador) {
        $this->id = $id;
        $this->partida = $partida;
        $this->data_partida = $data_partida;
        $this->hora_partida = $hora_partida;
        $this->data_publicada = $data_publicada;
        $this->hora_publicada = $hora_publicada;
        $this->publicador = $publicador;
    }

    function GetId() {
        return $this->id;
    }

    function GetPartida() {
        return $this->partida;
    }

    function GetData_partida() {
        return $this->data_partida;
    }

    function GetHora_partida() {
        return $this->hora_partida;
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

    function SetPartida($partida) {
        $this->partida = $partida;
    }

    function SetData_partida($data_partida) {
        $this->data_partida = $data_partida;
    }

    function SetHora_partida($hora_partida) {
        $this->hora_partida = $hora_partida;
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