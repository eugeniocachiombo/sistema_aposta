<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Página Inicial</title>

<main class="mb-4 mt-4">
    <div class="container border">
        <div class="row border pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Painel de actividades</h3>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Equipas</th>
                        </tr>

                        <?php 
                            $equipa_dao = new EquipaDao();
                            $retorno = $equipa_dao->Listar();
                            foreach ($retorno as $value) {
                               echo "<tr>";
                               echo "<td>" . $value['nome_equipa'] . "</td>";
                               echo "</tr>";
                            }
                        ?>

                    </table>
                </div>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>Partidas</td>
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