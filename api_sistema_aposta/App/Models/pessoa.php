<?php

abstract class Pessoa{
    
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $nascimento;
    private $genero;
    private $n_bi;
    
    function GetId() {
        return $this->id;
    }

    function GetNome() {
        return $this->nome;
    }

    function GetSobrenome() {
        return $this->sobrenome;
    }

    function GetEmail() {
        return $this->email;
    }

    function GetSenha() {
        return $this->senha;
    }

    function GetNascimento() {
        return $this->nascimento;
    }

    function GetGenero() {
        return $this->genero;
    }

    function GetN_bi() {
        return $this->n_bi;
    }

    function SetId($id) {
        $this->id = $id;
    }

    function SetNome($nome) {
        $this->nome = $nome;
    }

    function SetSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function SetEmail($email) {
        $this->email = $email;
    }

    function SetSenha($senha) {
        $this->senha = $senha;
    }

    function SetNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    function SetGenero($genero) {
        $this->genero = $genero;
    }

    function SetN_bi($n_bi) {
        $this->n_bi = $n_bi;
    }

}
