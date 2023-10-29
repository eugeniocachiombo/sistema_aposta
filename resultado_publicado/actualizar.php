<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<?php include "../app/class/partida_publicada.php"; ?>
<?php include "../app/class/resultado_publicado.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Actualizar Resultado Publicado</title>

<?php
include "processar_dados/verificar_acesso_a_pagina.php";
VerificarGeral();
?>

<main class="mt-4 mb-4 ">
    <div class="container ">
        <div class="row pt-2 mb-4" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Resultados Publicados</h3>
        </div>

        <div class="container">
            <div class="row">
                <?php include "processar_dados/processar.php";?>
            </div>
        </div>
        
        <form action="" method="post" class="d-flex align-items-center needs-validation" style="min-height: 60vh">
            <div class="container d-flex justify-content-center">
                <div class="row d-table d-md-flex">
                    <div class="col-md-4 pe-4 justify-content-center d-flex align-items-center"
                        style="background: khaki">
                        <center>
                            <i class="fas fa-refresh pt-4" style="font-size: 40px"></i>
                            <br>
                            <h3><b>Actualizar Resultado</b></h3>
                        <center>
                    </div>

                    <div class="col ">
                        <div class="col d-table d-md-flex">
                            <div class="col pe-4 ">
                                <label class="w-100 text-start pt-3" for="resultado_publicado">Resultado Publicado</label> <br>
                                <select class="form-control" required name="resultado_publicado" id="resultado_publicado"
                                    style="width: 205px; border: 2px solid cadetblue;">
                                    <option value="">Selecione...</option>
                                    <?php 
                                    $resultado_publicado_dao = new ResultadoPublicadoDao();
                                    $retorno = $resultado_publicado_dao->Listar();
                                    foreach ($retorno as $value) {
                                       echo "<option value='" . $value['id_resultado_pub'] . "'>" . $value['nome_equipaA'] . " x " . $value['nome_equipaB'] . "</option>";
                                    }
                                    ?>
                                </select>
                             </div>

                            <div class="col pe-4 ">
                                <label class="w-100 text-start pt-3" for="golos_equipaA">Golos EquipaA</label> <br>
                                <input type="text" required class="form-control"
                                    name="golos_equipaA" id="golos_equipaA"  value="<?php echo isset($_POST["data_partida"]) ? $_POST["data_partida"] : "" ?>">

                                <label class="w-100 text-start pt-3" for="golos_equipaB">Golos EquipaB</label> <br>
                                <input type="text" required class="form-control"
                                    name="golos_equipaB" id="golos_equipaB"  value="<?php echo isset($_POST["hora_partida"]) ? $_POST["hora_partida"] : "" ?>">
                            </div>
                            
                            <div class="col pe-4 d-none">
                                <?php date_default_timezone_set("Africa/Luanda"); ?>
                                <label class="w-100 text-start pt-3" for="data_publicada">Data da Publicada</label> <br>
                                <input patterns="[0-9]{2}-[0-9]{2}-[0-9]{4}" type="text" required class="form-control"
                                    name="data_publicada" id="data_publicada" placeholder="dd-mm-yyyy" value="<?php echo Date("d-m-Y"); ?>" readonly>

                                <label class="w-100 text-start pt-3" for="hora_publicada">Hora Publicada</label> <br>
                                <input patterns="[0-9]{2}-[0-9]{2}-[0-9]{4}" type="text" required class="form-control"
                                    name="hora_publicada" id="hora_publicada" placeholder="00:00" value="<?php echo Date("H:i"); ?>" readonly>
                            </div>
                        </div>

                        <hr class="d-none d-md-block">
                        <div class="col col-md-2 mt-4 pe-4">
                            <button type="submit" class="form-control button" name="btn_actualizar" id="btn_actualizar">
                                <span id="texto_actualizar">Actualizar</span>
                                <span id="spinner" class="spinner-grow spinner-grow-sm" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mt-4 pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> .... </h3>
        </div>
    </div>
</main>

<script src="../assets/js/validacao_resultado_publicado_actualizar.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>