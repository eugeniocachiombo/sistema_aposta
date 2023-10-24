<?php

$uri = $_SERVER["REQUEST_URI"];
$divir_uri = explode("/", $uri);
$caminho_actual = $divir_uri[2];
$parametro_caminho = $divir_uri[3];
VerificarPaginaActual($caminho_actual);

function VerificarPaginaActual($caminho){
    switch ($caminho) {
        case 'inicio':
            PaginaInicio();
            break;

        case 'gestor':
            PaginaGestor();
            break;

        case 'apostador':
            PaginaApostador();
            break;

        case 'administrador':
            PaginaAdministrador();
            break;

        case 'publicador':
            PaginaPublicador();
            break;

        case 'equipa':
            PaginaPublicador();
            break;
        
        default:
            PaginaInicio();
            break;
    }
}

function PaginaInicio(){
    include "../inicio/listas_menu/index.php";
}

function PaginaGestor(){
    switch ($parametro_caminho) {
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

function PaginaApostador(){
    switch ($parametro_caminho) {
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

function PaginaAdministrador(){
    switch ($parametro_caminho) {
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

function VerificarPaginaParametro(){
    include "../". $_SESSION["tipo_acesso_logado"] ."/listas_menu/index.php";
}

//
  /*  if( $caminho == "equipa" || $caminho == "partida" 
    || $caminho == "partida_publicada" || $caminho == "resultado_publicado"
    || $caminho == "aposta"
    ){

          
    
    } */
