<?php
require_once '../vendor/autoload.php';
require_once '../src/config.php';
include "../../config/db/conexao.php";

use App\Controllers\EquipaController;
use App\Controllers\ApostaController;

$app = new Slim\App($configuration);

$app->get('/equipa/listar', 'App\Controllers\EquipaController:Listar');
$app->post('/equipa/cadastrar', 'App\Controllers\EquipaController:Cadastrar');
$app->post('/equipa/actualizar', 'App\Controllers\EquipaController:Actualizar');
$app->post('/equipa/eliminar', 'App\Controllers\EquipaController:Eliminar');
$app->post('/equipa/listar_por_id', 'App\Controllers\EquipaController:ListarPorId');
$app->post('/equipa/listar_por_nome', 'App\Controllers\EquipaController:ListarPorNome');

$app->get('/aposta/listar', 'App\Controllers\ApostaController:Listar');
$app->post('/aposta/cadastrar', 'App\Controllers\ApostaController:Cadastrar');
$app->post('/aposta/actualizar', 'App\Controllers\ApostaController:Actualizar');
$app->post('/aposta/eliminar', 'App\Controllers\ApostaController:Eliminar');
$app->post('/aposta/listar_por_id', 'App\Controllers\ApostaController:ListarPorId');
$app->post('/aposta/listar_por_apostador', 'App\Controllers\ApostaController:ListarPorApostador');
$app->post('/aposta/listar_por_id_partida_publicada', 'App\Controllers\ApostaController:ListarPorIdPartidaPublicada');
$app->post('/aposta/listar_por_id_partida_publicada_apostador', 'App\Controllers\ApostaController:ListarPorIdPartidaPublicadaApostador');

$app->run();