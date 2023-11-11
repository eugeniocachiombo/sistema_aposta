<?php
require_once '../vendor/autoload.php';
require_once '../src/config.php';
include "../../config/db/conexao.php";

use App\Controllers\EquipaController;
use App\Controllers\ApostaController;
use App\Controllers\ApostadorController;
use App\Controllers\AdministradorController;
use App\Controllers\GestorController;
use App\Controllers\PublicadorController;

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

$app->get('/apostador/listar', 'App\Controllers\ApostadorController:Listar');
$app->post('/apostador/cadastrar', 'App\Controllers\ApostadorController:Cadastrar');
$app->post('/apostador/actualizar', 'App\Controllers\ApostadorController:Actualizar');
$app->post('/apostador/eliminar', 'App\Controllers\ApostadorController:Eliminar');
$app->post('/apostador/alterar_senha', 'App\Controllers\ApostadorController:AlterarSenha');
$app->post('/apostador/listar_por_id', 'App\Controllers\ApostadorController:ListarPorId');
$app->post('/apostador/listar_por_email', 'App\Controllers\ApostadorController:ListarPorEmail');
$app->post('/apostador/listar_por_bi_senha', 'App\Controllers\ApostadorController:ListarPorBISenha');
$app->post('/apostador/listar_por_id_senha', 'App\Controllers\ApostadorController:ListarPorIDSenha');
$app->post('/apostador/listar_por_bi', 'App\Controllers\ApostadorController:ListarPorBI');

$app->get('/administrador/listar', 'App\Controllers\AdministradorController:Listar');
$app->post('/administrador/cadastrar', 'App\Controllers\AdministradorController:Cadastrar');
$app->post('/administrador/actualizar', 'App\Controllers\AdministradorController:Actualizar');
$app->post('/administrador/eliminar', 'App\Controllers\AdministradorController:Eliminar');
$app->post('/administrador/alterar_senha', 'App\Controllers\AdministradorController:AlterarSenha');
$app->post('/administrador/listar_por_id', 'App\Controllers\AdministradorController:ListarPorId');
$app->post('/administrador/listar_por_email', 'App\Controllers\AdministradorController:ListarPorEmail');
$app->post('/administrador/listar_por_bi_senha', 'App\Controllers\AdministradorController:ListarPorBISenha');
$app->post('/administrador/listar_por_id_senha', 'App\Controllers\AdministradorController:ListarPorIDSenha');
$app->post('/administrador/listar_por_bi', 'App\Controllers\AdministradorController:ListarPorBI');

$app->get('/gestor/listar', 'App\Controllers\GestorController:Listar');
$app->post('/gestor/cadastrar', 'App\Controllers\GestorController:Cadastrar');
$app->post('/gestor/actualizar', 'App\Controllers\GestorController:Actualizar');
$app->post('/gestor/eliminar', 'App\Controllers\GestorController:Eliminar');
$app->post('/gestor/alterar_senha', 'App\Controllers\GestorController:AlterarSenha');
$app->post('/gestor/listar_por_id', 'App\Controllers\GestorController:ListarPorId');
$app->post('/gestor/listar_por_email', 'App\Controllers\GestorController:ListarPorEmail');
$app->post('/gestor/listar_por_bi_senha', 'App\Controllers\GestorController:ListarPorBISenha');
$app->post('/gestor/listar_por_id_senha', 'App\Controllers\GestorController:ListarPorIDSenha');
$app->post('/gestor/listar_por_bi', 'App\Controllers\GestorController:ListarPorBI');

$app->get('/publicador/listar', 'App\Controllers\PublicadorController:Listar');
$app->post('/publicador/cadastrar', 'App\Controllers\PublicadorController:Cadastrar');
$app->post('/publicador/actualizar', 'App\Controllers\PublicadorController:Actualizar');
$app->post('/publicador/eliminar', 'App\Controllers\PublicadorController:Eliminar');
$app->post('/publicador/alterar_senha', 'App\Controllers\PublicadorController:AlterarSenha');
$app->post('/publicador/listar_por_id', 'App\Controllers\PublicadorController:ListarPorId');
$app->post('/publicador/listar_por_email', 'App\Controllers\PublicadorController:ListarPorEmail');
$app->post('/publicador/listar_por_bi_senha', 'App\Controllers\PublicadorController:ListarPorBISenha');
$app->post('/publicador/listar_por_id_senha', 'App\Controllers\PublicadorController:ListarPorIDSenha');
$app->post('/publicador/listar_por_bi', 'App\Controllers\PublicadorController:ListarPorBI');

$app->run();