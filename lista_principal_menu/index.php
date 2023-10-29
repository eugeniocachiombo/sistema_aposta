<?php $acesso = isset($_SESSION["tipo_acesso_logado"]) ? $_SESSION["tipo_acesso_logado"] : ""; ?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-users" ></i> Equipa
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "gestor" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item" href="../equipa/cadastrar.php"><i class="fas fa-plus"></i> Cadastrar</a></li>
        <li><a class="dropdown-item" href="../equipa/actualizar.php"><i class="fas fa-refresh"></i> Actualizar</a></li>
        <li><a class="dropdown-item" href="../equipa/eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../equipa/listar.php"><i class="fas fa-list"></i> Listar</a></li>
    </ul>
</li>


<li class="nav-item dropdown">
    <?php if( $acesso != "apostador" ){ ?>
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-futbol"></i> Partida
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "gestor" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item" href="../partida/cadastrar.php"><i class="fas fa-plus"></i> Criar</a></li>
        <li><a class="dropdown-item" href="../partida/actualizar.php"><i class="fas fa-refresh"></i> Actualizar</a></li>
        <li><a class="dropdown-item" href="../partida/eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../partida/listar.php"><i class="fas fa-list"></i> Listar</a></li>
    </ul>
    <?php } ?>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle txt_publicar" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-flag"></i> Partidas Publicadas
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "publicador" || $acesso == "administrador" ){ ?>
        <li><a class="dropdown-item " href="../partida_publicada/cadastrar.php"><i class="fas fa-flag"></i> Publicar </a></li>
        <li><a class="dropdown-item " href="../partida_publicada/actualizar.php"><i class="fas fa-refresh"></i> Actualizar </a></li>
        <li><a class="dropdown-item " href="../partida_publicada/eliminar.php"><i class="fas fa-trash"></i> Eliminar </a></li>
        <?php } ?>
        <li><a class="dropdown-item " href="../partida_publicada/listar.php"><i class="fas fa-list"></i> Listar</a></li>
    </ul>
</li>


<?php if( $acesso == "administrador" || $acesso == "apostador" ){ ?>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-dollar-sign"></i> Aposta
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "apostador"  ){ ?>
            <li><a class="dropdown-item" href="../aposta/cadastrar.php"><i class="fas fa-sack-dollar"></i> Apostar</a></li>
            <li><a class="dropdown-item" href="../aposta/minhas_apostas.php"><i class="fas fa-scale-unbalanced"></i> Minhas Apostas</a></li>
            <li><a class="dropdown-item" href="../aposta/eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
        <?php } ?>

        <?php if( $acesso == "administrador" ){ ?>
            <li><a class="dropdown-item" href="../aposta/listar.php"><i class="fas fa-list"></i> Listar</a></li>
        <?php } ?>
    </ul>
</li>
<?php } ?>

<li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-flag-checkered"></i> Resultados
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "publicador" || $acesso == "administrador" ){ ?>
                <li><a class="dropdown-item" href="../resultado_publicado/cadastrar.php"><i class="fas fa-flag"></i> Publicar</a></li>
                <li><a class="dropdown-item" href="../resultado_publicado/actualizar.php"><i class="fas fa-refresh"></i> Actualizar</a></li>
                <li><a class="dropdown-item" href="../resultado_publicado/eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
        <?php } ?>
        <li><a class="dropdown-item" href="../resultado_publicado/listar.php"><i class="fas fa-list"></i> Listar</a></li>
    </ul>
</li>

<?php if( $acesso == "apostador" || $acesso == "administrador" ){ ?>
<li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-medal"></i> Vitórias
    </a>

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if( $acesso == "apostador"  ){ ?>
            <li><a class="dropdown-item" href="../apostador/minhas_vitorias.php"><i class="fas fa-trophy"></i> Minhas vitórias</a></li>
        <?php } ?>

        <?php if( $acesso == "administrador" ){ ?>
            <li><a class="dropdown-item" href="../administrador/vencedores.php"><i class="fas fa-trophy"></i> Vencedores</a></li>
        <?php } ?>
    </ul>
</li>
<?php } ?>

<li class="nav-item" style="min-width: 160px">
    <a class="nav-link" href="../terminar_sessao"><i class="fas fa-right-from-bracket"></i> Terminar Sessão</a>
</li>