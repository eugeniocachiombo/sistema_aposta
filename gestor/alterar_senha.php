<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Alterar Senha</title>

<?php
    if(empty($_SESSION["id_gestor"])){ 
        ?>
<script>
window.location = "../gestor/autenticar.php";
</script>
<?php
    }
?>

<main class="mb-4 mt-4">

    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-shield-halved"></i> Segurança</h3>
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
                                <i class="fas fa-key pt-4" style="font-size: 40px"></i>
                                <br>
                                <h3><b>Alterar a Senha</b></h3>
                                <center>
                        </div>

                        <div class="col ">
                            <div class="col d-table d-md-flex">
                                <div class="col pe-4">

                                    <label class="w-100 text-start pt-3" for="senha_antiga">Antiga Senha: </label> <br>
                                    <input type="text" required class="form-control " name="senha_antiga" id="senha_antiga" >
                                </div>

                                <div class="col pe-4">

                                    <label class="w-100 text-start pt-3" for="senha_nova">Nova Senha:</label> <br>
                                    <input type="text" required class="form-control" name="senha_nova" id="senha_nova">
                                </div>
                            </div>

                            <hr class="d-none d-md-block">
                            <div class="col col-md-2 mt-4 pe-4">
                                <button type="submit" class="form-control button" name="btn_alterar_senha"
                                    id="btn_alterar_senha">
                                    <span id="texto_alterar_senha">Alterar Senha</span>
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

<script src="../assets/js/validacao_utilizadores_alterar_senha.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>