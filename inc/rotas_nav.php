<?php

$uri = $_SERVER["REQUEST_URI"];
$divir_uri = explode("/", $uri);
$uri_filtrado = array_values(array_filter($divir_uri));
$caminho_actual = $divir_uri[0] == "sistema_aposta" ? $uri_filtrado[1] :  $uri_filtrado[0];
$parametro_caminho = $divir_uri[0] == "sistema_aposta" ? $uri_filtrado[2] :  $uri_filtrado[1];
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

