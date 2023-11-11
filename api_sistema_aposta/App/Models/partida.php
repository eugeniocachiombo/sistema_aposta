<?php


class Partida {
    
    private $id;
    private $equipaA;
    private $equipaB;
    private $gestor;
    
    function __construct($id, $equipaA, $equipaB, $gestor) {
        $this->id = $id;
        $this->equipaA = $equipaA;
        $this->equipaB = $equipaB;
        $this->gestor = $gestor;
    }
    
    function GetId() {
        return $this->id;
    }

    function GetEquipaA() {
        return $this->equipaA;
    }

    function GetEquipaB() {
        return $this->equipaB;
    }

    function GetGestor() {
        return $this->gestor;
    }

    function SetId($id) {
        $this->id = $id;
    }

    function SetEquipaA($equipaA) {
        $this->equipaA = $equipaA;
    }

    function SetEquipaB($equipaB) {
        $this->equipaB = $equipaB;
    }

    function SetGestor($gestor) {
        $this->gestor = $gestor;
    }
    
}
