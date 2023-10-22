<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Cadastrar Equipa</title>

<?php
    if(empty($_SESSION["id_gestor"])){ 
        ?>
            <script>
                 window.location = "../gestor/autenticar.php";
            </script>
        <?php
    }
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
                <div class="col-md-8 pe-4 justify-content-center d-flex align-items-center" style="background: khaki">
                    <center>
                        <i class="fas fa-users pt-4" style="font-size: 40px"></i>
                        <br>
                        <h3><b>Equipa</b></h3>
                    <center>
                </div>

                <div class="col ">
                    <div class="col d-table d-md-flex">
                        <div class="col pe-4">

                            <label class="w-100 text-start pt-3" for="nome">Nome: </label> <br>
                            <input type="text" required class="form-control " name="nome" id="nome">
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

<script src="../assets/js/validacao_equipa.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>