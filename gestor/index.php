<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Página Inicial</title>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Painel de actividades</h3>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6 pt-4">
                <div class="table-responsive">
                    <table class="table table-warning">
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
                <hr class=" d-sm-none" size="6px">
            </div>

            <div class="col-12 col-sm-6 pt-4">
                <div class="table-responsive">
                    <table class="table table-success">
                        <tr style="border: none;">
                            <th class="text-start">Partidas</td>
                        </tr>

                        <tr style="border: none;">
                            <td style="border: none;">Barcelona x Real Madrid</td>
                        </tr>
                    </table>
                </div>
                <hr class=" d-sm-none" size="6px">
            </div>
        </div>

        <hr style="color: #299" size="8px">

        <div class="row">
            <div class="col pt-4">
                <div class="table-responsive">
                    <table class="table table-info">
                        
                        <tr style="border: none;">
                            <th class="text-start">Partidas publicadas</td>
                        </tr>

                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>