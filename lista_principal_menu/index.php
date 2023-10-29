<?php $acesso = isset($_SESSION["tipo_acesso_logado"]) ? $_SESSION["tipo_acesso_logado"] : ""; ?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Equipa
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "gestor" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item" href="../equipa/cadastrar.php">Cadastrar</a></li>
        <li><a class="dropdown-item" href="../equipa/actualizar.php">Actualizar</a></li>
        <li><a class="dropdown-item" href="../equipa/eliminar.php">Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../equipa/listar.php">Listar</a></li>
    </ul>
</li>


<li class="nav-item dropdown">
    <?php if( $acesso != "apostador" ){ ?>
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Partida
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "gestor" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item" href="../partida/cadastrar.php">Criar</a></li>
        <li><a class="dropdown-item" href="../partida/actualizar.php">Actualizar</a></li>
        <li><a class="dropdown-item" href="../partida/eliminar.php">Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../partida/listar.php">Listar</a></li>
    </ul>
    <?php } ?>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle txt_publicar" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Partidas Publicadas
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "publicador" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item " href="../partida_publicada/cadastrar.php">Publicar </a></li>
        <li><a class="dropdown-item " href="../partida_publicada/actualizar.php">Actualizar </a></li>
        <li><a class="dropdown-item " href="../partida_publicada/eliminar.php">Eliminar </a></li>
        <?php } ?>
        <li><a class="dropdown-item " href="../partida_publicada/listar.php">Listar</a></li>
    </ul>
</li>


<?php if( $acesso == "administrador" || $acesso == "apostador" ){ ?>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Aposta
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "apostador"  ){ ?>
        <li><a class="dropdown-item" href="../aposta/cadastrar.php">Apostar</a></li>
        <li><a class="dropdown-item" href="../aposta/eliminar.php">Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../aposta/listar.php">Listar</a></li>
    </ul>
</li>
<?php } ?>

<li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Resultados
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "publicador" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item" href="../resultado_publicado/cadastrar.php">Publicar</a></li>
        <li><a class="dropdown-item" href="../resultado_publicado/actualizar.php">Actualizar</a></li>
        <li><a class="dropdown-item" href="../resultado_publicado/eliminar.php">Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../resultado_publicado/listar.php">Listar</a></li>
    </ul>
</li>

<li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        Minhas Vitórias
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "publicador" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item" href="../resultado_publicado/cadastrar.php">Publicar</a></li>
        <li><a class="dropdown-item" href="../resultado_publicado/actualizar.php">Actualizar</a></li>
        <li><a class="dropdown-item" href="../resultado_publicado/eliminar.php">Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../resultado_publicado/listar.php">Listar</a></li>
    </ul>
</li>


<li class="nav-item" style="min-width: 160px">
    <a class="nav-link" href="../terminar_sessao">Terminar Sessão</a>
</li>