<?php
require_once '../vendor/autoload.php';
require_once '../src/config.php';
include "../../config/db/conexao.php";

use App\Controllers\EquipaController;

$app = new Slim\App($configuration);

$app->get('/equipa/listar', 'App\Controllers\EquipaController:Listar');
$app->post('/equipa/cadastrar', 'App\Controllers\EquipaController:Cadastrar');
$app->post('/equipa/actualizar', 'App\Controllers\EquipaController:Actualizar');
$app->post('/equipa/eliminar', 'App\Controllers\EquipaController:Eliminar');
$app->post('/equipa/listar_por_id', 'App\Controllers\EquipaController:ListarPorId');
$app->post('/equipa/listar_por_nome', 'App\Controllers\EquipaController:ListarPorNome');

$app->get('/equipa/listar', 'App\Controllers\EquipaController:Listar');
$app->post('/equipa/cadastrar', 'App\Controllers\EquipaController:Cadastrar');
$app->post('/equipa/actualizar', 'App\Controllers\EquipaController:Actualizar');
$app->post('/equipa/eliminar', 'App\Controllers\EquipaController:Eliminar');
$app->post('/equipa/listar_por_id', 'App\Controllers\EquipaController:ListarPorId');
$app->post('/equipa/listar_por_nome', 'App\Controllers\EquipaController:ListarPorNome');


$app->run();

/*
$error = $app->getContainer();
$error["displayErrorDetails"] = function ($error) {
    return new CustomHandler();
};*/