<?php
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("/", $uri);
?>

<?php
    if($uri[2] == "gestor"){
            if($uri[3] == "autenticar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    </li>
                </ul>
<?php   
            } else if($uri[3] == "cadastrar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="autenticar.php">Autenticar</a>
                    </li>
                </ul>
<?php   
            } else { 
            ?>
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
                            <li><a class="dropdown-item" href="#">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar</a></li>
                            <li><a class="dropdown-item" href="#">Listar</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar</a></li>
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
<?php   
            }
    }
?>

<?php
    if($uri[2] == "apostador"){
            if($uri[3] == "autenticar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    </li>
                </ul>
<?php   
            } else if($uri[3] == "cadastrar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="autenticar.php">Autenticar</a>
                    </li>
                </ul>
<?php   
            } else { 
            ?>
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
                            <li><a class="dropdown-item" href="#">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar</a></li>
                            <li><a class="dropdown-item" href="#">Listar</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar</a></li>
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
<?php   
            }
    }
?>

<?php
    if($uri[2] == "administrador"){
            if($uri[3] == "autenticar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    </li>
                </ul>
<?php   
            } else if($uri[3] == "cadastrar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="autenticar.php">Autenticar</a>
                    </li>
                </ul>
<?php   
            } else { 
            ?>
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
                            <li><a class="dropdown-item" href="#">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar</a></li>
                            <li><a class="dropdown-item" href="#">Listar</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar</a></li>
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
<?php   
            }
    }
?>

<?php
    if($uri[2] == "publicador"){
            if($uri[3] == "autenticar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                    </li>
                </ul>
<?php   
            } else if($uri[3] == "cadastrar.php"){ 
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../inicio">Página Inicial</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="autenticar.php">Autenticar</a>
                    </li>
                </ul>
<?php   
            } else { 
            ?>
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
                            <li><a class="dropdown-item" href="#">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="#">Actualizar</a></li>
                            <li><a class="dropdown-item" href="#">Listar</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar</a></li>
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
<?php   
            }
    }
?>
