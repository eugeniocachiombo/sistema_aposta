<?php

$uri = $_SERVER["REQUEST_URI"];
$uri_repartido = explode("/", $uri);
$caminho_actual = $uri_repartido[1] == "sistema_aposta" ? $uri_repartido[2] :  $uri_repartido[1];
$parametro_caminho = $uri_repartido[1] == "sistema_aposta" ? $uri_repartido[3] :  $uri_repartido[2];
VerificarPaginaActual($caminho_actual, $parametro_caminho);

function VerificarPaginaActual($caminho, $parametro){
    switch ($caminho) {
        case 'inicio':
            PaginaInicio();
            break;

        case 'gestor':
            PaginaGestor($parametro);
            break;

        case 'apostador':
            PaginaApostador($parametro);
            break;

        case 'administrador':
            PaginaAdministrador($parametro);
            break;

        case 'publicador':
            PaginaPublicador($parametro);
            break;

        case 'equipa':
            PaginaAccao();
            break;

        case 'partida':
            PaginaAccao();
            break;

        case 'partida_publicada':
            PaginaAccao();
            break;

        case 'resultado_publicado':
            PaginaAccao();
            break;

        case 'aposta':
            PaginaAccao();
            break;
        
        default:
            PaginaInicio();
            break;
    }
}

function PaginaInicio(){
    include "../inicio/listas_menu/index.php";
}

function PaginaGestor($parametro){
    switch ($parametro) {
        case 'autenticar.php':
            include "../gestor/listas_menu/autenticar.php"; 
            break;

        case 'cadastrar.php':
            include "../gestor/listas_menu/cadastrar.php"; 
            break;
        
        default:
            include "../gestor/listas_menu/index.php"; 
            break;
    }
}

function PaginaApostador($parametro){
    switch ($parametro) {
        case 'autenticar.php':
            include "../apostador/listas_menu/autenticar.php"; 
            break;

        case 'cadastrar.php':
            include "../apostador/listas_menu/cadastrar.php"; 
            break;
        
        default:
            include "../apostador/listas_menu/index.php"; 
            break;
    }
}

function PaginaAdministrador($parametro){
    switch ($parametro) {
        case 'autenticar.php':
            include "../administrador/listas_menu/autenticar.php"; 
            break;

        case 'cadastrar.php':
            include "../administrador/listas_menu/cadastrar.php"; 
            break;
        
        default:
            include "../administrador/listas_menu/index.php"; 
            break;
    }
}

function PaginaPublicador($parametro){
    switch ($parametro) {
        case 'autenticar.php':
            include "../publicador/listas_menu/autenticar.php"; 
            break;

        case 'cadastrar.php':
            include "../publicador/listas_menu/cadastrar.php"; 
            break;
        
        default:
            include "../publicador/listas_menu/index.php"; 
            break;
    }
}

function PaginaAccao(){
    include "../". $_SESSION["tipo_acesso_logado"] ."/listas_menu/index.php";
}

