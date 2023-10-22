<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Página Inicial</title>

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
            <h3> <i class="fas fa-futbol"></i> Informações Pessoais</h3>
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
                                    <input type="text" required class="form-control " name="nome" id="nome">

                                    <label class="w-100 text-start pt-3" for="sobrenome">Sobrenome: </label> <br>
                                    <input type="text" required class="form-control" name="sobrenome" id="sobrenome">

                                </div>

                                <div class="col pe-4">

                                    <label class="w-100 text-start pt-3" for="email">E-mail</label> <br>
                                    <input type="email" required class="form-control" name="email" id="email">

                                    <label class="w-100 text-start pt-3" for="nascimento">Data de Nascimento</label>
                                    <br>
                                    <input patterns="[0-9]{2}-[0-9]{2}-[0-9]{4}" type="text" required
                                        class="form-control" name="nascimento" id="nascimento" placeholder="dd-mm-yyyy">

                                </div>

                                <div class="col pe-4 ">

                                    <label class="w-100 text-start pt-3" for="genero">Gênero</label> <br>
                                    <select class="form-control" required name="genero" id="genero"
                                        style="width: 205px; border: 2px solid cadetblue;">
                                        <option value="">Selecione...</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>

                                    <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                                    <input type="text" required class="form-control" name="n_bi" id="n_bi">

                                </div>
                            </div>

                            <hr class="d-none d-md-block">
                            <div class="col col-md-2 mt-4 pe-4">
                                <button type="submit" class="form-control button" name="btn_cadastrar"
                                    id="btn_cadastrar">
                                    <span id="texto_cadastrar">Cadastrar</span>
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

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>