<?php $acesso = isset($_SESSION["tipo_acesso_logado"]) ? $_SESSION["tipo_acesso_logado"] : ""; ?>

<ul class="navbar-nav me-auto mb-2 mb-lg-0">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../gestor">Página Inicial</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Perfil
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../gestor/meus_dados.php">Meus Dados</a></li>
            <li><a class="dropdown-item" href="../gestor/editar_dados.php">Editar Dados</a></li>
            <li><a class="dropdown-item" href="../gestor/alterar_senha.php">Alterar Senha</a></li>
            <li><a class="dropdown-item" href="../gestor/eliminar_conta.php">Eliminar Conta</a></li>
        </ul>
    </li>

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
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../terminar_sessao">Terminar Sessão</a>
    </li>
</ul>