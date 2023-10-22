<ul class="navbar-nav me-auto mb-2 mb-lg-0">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../administrador">Página Inicial</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Perfil
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../administrador/meus_dados.php">Meus Dados</a></li>
            <li><a class="dropdown-item" href="../administrador/editar_dados.php">Editar Dados</a></li>
            <li><a class="dropdown-item" href="../administrador/alterar_senha.php">Alterar Senha</a></li>
            <li><a class="dropdown-item" href="../administrador/eliminar_conta.php">Eliminar Conta</a></li>
        </ul>
    </li>

    <?php include "../lista_principal_menu/index.php"; ?>
</ul>