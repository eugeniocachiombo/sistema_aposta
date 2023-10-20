<?php

include "../init/autoload.php";

$equipa = new Equipa(20, "Real Madrid");

echo "<pre>";
var_dump($equipa);
echo "<pre>";
echo "<hr>";

$gestor = new Gestor();
$gestor->SetId(1);
$gestor->SetNome("Eugénio");
$gestor->SetSobrenome("Cachiombo");
$gestor->SetEmail("eugeniocachiombo@gmail.com");
$gestor->SetSenha("123456");
$gestor->SetNascimento("1999-04-27");
$gestor->SetGenero("M");
$gestor->SetN_bi("123456789LA987");

echo "<pre>";
var_dump($gestor);
echo "<pre>";
echo "<hr>";