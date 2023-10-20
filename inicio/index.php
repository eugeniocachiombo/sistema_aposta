<?php

include "../init/autoload.php";

$gestor = new Gestor();
$gestor->SetId(1);
$gestor->SetNome("Eugénio");
$gestor->SetSobrenome("Cachiombo");
$gestor->SetEmail("eugeniocachiombo@gmail.com");
$gestor->SetSenha("123456");
$gestor->SetNascimento("1999-04-27");
$gestor->SetGenero("M");
$gestor->SetN_bi("123456789LA987");
$gestor->CadastrarEquipa();
$gestor->CadastrarPartida();

echo "Gestor Info";
echo "<pre>";
print_r($gestor);
echo "<pre>";
echo "<hr>";