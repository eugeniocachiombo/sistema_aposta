<?php
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("/", $uri);
?>

<?php
    if($uri[2] == "inicio"){ ?>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../apostador/cadastrar.php">Cadastrar</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../apostador/autenticar.php">Autenticar</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">Proprietários</a>
    </li>
</ul> <?php
    }
?>

<?php
    if($uri[2] == "gestor"){

        if($uri[3] == "autenticar.php"){ 

            include "../gestor/listas_menu/autenticar.php"; 

        } else if($uri[3] == "cadastrar.php"){ 

            include "../gestor/listas_menu/cadastrar.php"; 

        } else { 

            include "../gestor/listas_menu/index.php"; 

        }

    } else if( $uri[2] == "equipa" || $uri[2] == "partida"){

            include "../gestor/listas_menu/index.php"; 
            
    } 
?>

<?php
    if($uri[2] == "apostador"){

        if($uri[3] == "autenticar.php"){ 

            include "../apostador/listas_menu/autenticar.php"; 

        } else if($uri[3] == "cadastrar.php"){ 

            include "../apostador/listas_menu/cadastrar.php"; 

        } else { 

            include "../apostador/listas_menu/index.php"; 

        }

    } else if( $uri[2] == "equipa" || $uri[2] == "partida"){

            include "../apostador/listas_menu/index.php"; 
            
    } 
?>

<?php
    if($uri[2] == "administrador"){

        if($uri[3] == "autenticar.php"){ 

            include "../administrador/listas_menu/autenticar.php"; 

        } else if($uri[3] == "cadastrar.php"){ 

            include "../administrador/listas_menu/cadastrar.php"; 

        } else { 

            include "../administrador/listas_menu/index.php"; 

        }

    } else if( $uri[2] == "equipa" || $uri[2] == "partida"){

            include "../administrador/listas_menu/index.php"; 
            
    } 
?>


<?php
    if($uri[2] == "publicador"){

        if($uri[3] == "autenticar.php"){ 

            include "../publicador/listas_menu/autenticar.php"; 

        } else if($uri[3] == "cadastrar.php"){ 

            include "../publicador/listas_menu/cadastrar.php"; 

        } else { 

            include "../publicador/listas_menu/index.php"; 

        }

    } else if( $uri[2] == "equipa" || $uri[2] == "partida"){

            include "../publicador/listas_menu/index.php"; 
            
    } 
?>

