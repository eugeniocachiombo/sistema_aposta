<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Lista de Equipas</title>

<?php
include "processar_dados/verificar_acesso_a_pagina.php";
SeNaoUtilizadorLogado();
?>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Equipas</h3>
        </div>

        <div class="pt-4" style="min-height: 40vh; font-size: 20px;">
            <div class="table-responsive" style="max-height: 60vh">
                <table class="table table-warning table-striped table-hover">
                    <tr style="border: none;">
                        <th class="text-start">Equipas</th>
                    </tr>

                    <?php 
                        $equipa_dao = new EquipaDao();
                        $retorno = $equipa_dao->Listar();
                        foreach ($retorno as $value) {
                           echo "<tr style='border: none;'>";
                           echo "<td style='border: none;'>" . $value['nome_equipa'] . "</td>";
                           echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>

        <div class="row mt-4 pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> .... </h3>
        </div>
    </div>
</main>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>