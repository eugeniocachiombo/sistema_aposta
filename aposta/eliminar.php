<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/class/partida_publicada.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Eliminar Aposta</title>

<?php
include "processar_dados/verificar_acesso_a_pagina.php";
VerificarGeral();
?>

<main class="mt-4 mb-4 ">
    <div class="container ">
        <div class="row pt-2 mb-4" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Apostas</h3>
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
                            <i class="fas fa-trash pt-4" style="font-size: 40px"></i>
                            <br>
                            <h3><b>Eliminar Aposta</b></h3>
                        <center>
                    </div>

                    <div class="col ">
                        <div class="col d-table d-md-flex">
                            <div class="col pe-4 ">
                                <label class="w-100 text-start pt-3" for="aposta">Aposta</label> <br>
                                <select class="form-control" required name="aposta" id="aposta"
                                    style="width: 205px; border: 2px solid cadetblue;">
                                    <option value="">Selecione...</option>
                                    <?php 
                                    $aposta_dao = new ApostaDao();
                                    $retorno_apostador = $aposta_dao->ListarPorApostador($_SESSION["id_apostador"]);
                                    foreach ($retorno_apostador as $value) {
                                        $retorno_dados_aposta = $aposta_dao->ListarPorId($value['id_aposta']);
                                        foreach ($retorno_dados_aposta as $value) {
                                        $data_tratada = explode("-", $value['data_aposta']);
                                        echo "<option value='" . $value['id_aposta'] . "'>" . $value['nome_equipaA'] . " x " . $value['nome_equipaB']  . " </option>";
                                        }
                                    }
                                    ?>
                                </select>
                             </div>
                        </div>

                        <hr class="d-none d-md-block">
                        <div class="col col-md-2 mt-4 pe-4">
                            <button type="submit" class="form-control button" name="btn_eliminar" id="btn_eliminar">
                                <span id="texto_eliminar">Eliminar</span>
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

<script src="../assets/js/validacao_aposta_eliminar.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>