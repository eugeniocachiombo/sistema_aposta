<ul class="navbar-nav me-auto mb-2 mb-lg-0">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../<?php echo $uri[2]; ?>">Página Inicial</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Perfil
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="meus_dados.php">Meus Dados</a></li>
            <li><a class="dropdown-item" href="editar_dados.php">Editar Dados</a></li>
            <li><a class="dropdown-item" href="alterar_senha.php">Alterar Senha</a></li>
            <li><a class="dropdown-item" href="eliminar_conta.php">Eliminar Conta</a></li>
        </ul>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Equipa
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../equipa/cadastrar.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="../equipa/actualizar.php">Actualizar</a></li>
            <li><a class="dropdown-item" href="../equipa/listar.php">Listar</a></li>
            <li><a class="dropdown-item" href="../equipa/eliminar.php">Eliminar</a></li>
        </ul>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Partida
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Criar</a></li>
            <li><a class="dropdown-item" href="#">Actualizar</a></li>
            <li><a class="dropdown-item" href="#">Listar</a></li>
            <li><a class="dropdown-item" href="#">Eliminar</a></li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="terminar_sessao.php">Terminar Sessão</a>
    </li>
</ul>