<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Editar Dados</title>

<?php
include "processar_dados/verificar_acesso_a_pagina.php";
VerificarSePublicador();
?>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-pen"></i> Informações Pessoais</h3>
        </div>

        <div class="container">
            <div class="row pt-4">
                <?php include "processar_dados/processar.php";?>
            </div>
        </div>

        <div class="row d-flex justify-content-start align-items-center" style="min-height: 40vh; font-size: 20px;">
            <form action="" method="post" class="d-flex align-items-center needs-validation" style="min-height: 60vh">
                <div class="container d-flex justify-content-center">
                    <div class="row d-table d-md-flex">
                        <div class="col-md-4 mt-2 pe-4 justify-content-center d-flex align-items-center"
                            style="background: khaki">
                            <center>
                                <i class="fas fa-user-pen pt-4" style="font-size: 40px"></i>
                                <br>
                                <h3><b>Actualizar Dados</b></h3>
                                <center>
                        </div>

                        <div class="col ">
                            <div class="col d-table d-md-flex">
                                <div class="col pe-4">
                                    <label class="w-100 text-start pt-3" for="nome">Nome: </label> <br>
                                    <input type="text" required class="form-control " name="nome" id="nome"
                                        value="<?php echo $_SESSION["nome_publicador"]; ?>">

                                    <label class="w-100 text-start pt-3" for="sobrenome">Sobrenome: </label> <br>
                                    <input type="text" required class="form-control" name="sobrenome" id="sobrenome"
                                        value="<?php echo $_SESSION["sobrenome_publicador"]; ?>">
                                </div>

                                <div class="col pe-4">
                                    <label class="w-100 text-start pt-3" for="email">E-mail</label> <br>
                                    <input type="email" required class="form-control" name="email" id="email"
                                        value="<?php echo $_SESSION["email_publicador"]; ?>">

                                    <label class="w-100 text-start pt-3" for="nascimento">Data de Nascimento</label>
                                    <br>
                                    <input patterns="[0-9]{2}-[0-9]{2}-[0-9]{4}" type="text" required
                                        class="form-control" name="nascimento" id="nascimento" placeholder="dd-mm-yyyy"
                                        value="<?php echo $_SESSION["nascimento_publicador"]; ?>">
                                </div>

                                <div class="col pe-4 ">
                                    <label class="w-100 text-start pt-3" for="genero">Gênero</label> <br>
                                    <select class="form-control" required name="genero" id="genero"
                                        style="width: 205px; border: 2px solid cadetblue;">
                                        <option value="">Selecione...</option>
                                        <?php
                                            if($_SESSION["genero_publicador"] == "M"){ ?>
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option> <?php
                                            } else{ ?>
                                        <option value="M">Masculino</option>
                                        <option value="F" selected>Femenino</option> <?php
                                            }
                                        ?>
                                    </select>

                                    <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                                    <input type="text" required class="form-control" name="n_bi" id="n_bi"
                                        value="<?php echo $_SESSION["n_bi_publicador"]; ?>">
                                </div>
                            </div>

                            <hr class="d-none d-md-block">
                            <div class="col col-md-2 mt-4 pe-4">
                                <button type="submit" class="form-control button" name="btn_actualizar"
                                    id="btn_actualizar">
                                    <span id="texto_actualizar">actualizar</span>
                                    <span id="spinner" class="spinner-grow spinner-grow-sm" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mt-4 pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> .... </h3>
        </div>
    </div>
</main>

<script src="../assets/js/validacao_utilizadores_actualizar.js"></script>
<script src="../assets/js/data_utilizadores.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>