<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Cadastro de Gestor</title>

<?php
include "processar_dados/verificar_acesso_a_pagina.php";
VerificarUtilizadorLogado();
?>

<main class="mt-4 mb-4 " data-bs-theme="dark">
    <div class="container">
        <div class="row">
            <?php include "processar_dados/processar.php";?>
        </div>
    </div>

    <form action="" method="post" class="d-flex align-items-center needs-validation" style="min-height: 60vh">
        <div class="container d-flex justify-content-center">
            <div class="row d-table d-md-flex">
                <div class="col-md-4 pe-4 justify-content-center d-flex align-items-center" style="background: khaki">
                    <center>
                        <i class="fas fa-user-plus pt-4" style="font-size: 40px"></i>
                        <br>
                        <h3><b>Cadastramento</b></h3>
                        <center>
                </div>

                <div class="col ">
                    <div class="col d-table d-md-flex">
                        <div class="col pe-4">
                            <label class="w-100 text-start pt-3" for="nome">Nome: </label> <br>
                            <input type="text" required class="form-control " name="nome" id="nome" value="<?php echo isset($_POST["nome"]) ? $_POST["nome"] : "" ?>" >

                            <label class="w-100 text-start pt-3" for="sobrenome">Sobrenome: </label> <br>
                            <input type="text" required class="form-control" name="sobrenome" id="sobrenome" value="<?php echo isset($_POST["sobrenome"]) ? $_POST["sobrenome"] : "" ?>" >
                        </div>

                        <div class="col pe-4">
                            <label class="w-100 text-start pt-3" for="email">E-mail</label> <br>
                            <input type="email" required class="form-control" name="email" id="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : "" ?>" >

                            <label class="w-100 text-start pt-3" for="n_bi">Senha</label> <br>
                            <input type="password" required class="form-control" name="senha" id="senha" value="<?php echo isset($_POST["senha"]) ? $_POST["senha"] : "" ?>" >
                        </div>

                        <div class="col pe-4 ">
                            <label class="w-100 text-start pt-3" for="nascimento">Data de Nascimento</label> <br>
                            <input patterns="[0-9]{2}-[0-9]{2}-[0-9]{4}" type="text" required class="form-control"
                                name="nascimento" id="nascimento" placeholder="dd-mm-yyyy" value="<?php echo isset($_POST["nascimento"]) ? $_POST["nascimento"] : "" ?>">

                            <label class="w-100 text-start pt-3" for="genero">Gênero</label> <br>
                            <select class="form-control" required name="genero" id="genero"
                                style="width: 205px; border: 2px solid cadetblue;">
                                <option value="">Selecione...</option>
                                <?php
                                    if($_POST["genero"] == "M"){ ?>
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option> <?php
                                    } else if($_POST["genero"] == "F"){ ?>
                                        <option value="M">Masculino</option>
                                        <option value="F" selected>Femenino</option> <?php
                                    } else { ?>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option> <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col pe-4">
                            <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                            <input type="text" required class="form-control" name="n_bi" id="n_bi" value="<?php echo isset($_POST["nascimento"]) ? $_POST["nascimento"] : "" ?>">

                            <label class="w-100 text-start pt-3" for="acesso">Tipo de Acesso</label> <br>
                            <select class="form-control" disabled name="acesso" id="acesso"
                                style="width: 205px; border: 2px solid cadetblue;">
                                <option value="">Selecione...</option>
                                <option selected value="Gestor">Gestor</option>
                            </select>
                        </div>
                    </div>

                    <hr class="d-none d-md-block">
                    <div class="col col-md-2 mt-4 pe-4">
                        <button type="submit" class="form-control button" name="btn_cadastrar" id="btn_cadastrar">
                            <span id="texto_cadastrar">Cadastrar</span>
                            <span id="spinner" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="../assets/js/validacao_utilizadores.js"></script>
<script src="../assets/js/data_utilizadores.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>