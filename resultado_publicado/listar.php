<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Lista de Resultados Publicados</title>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Resultados Publicados</h3>
        </div>

        <div class="pt-4" style="min-height: 40vh; font-size: 20px;">
            <div class="table-responsive" style="max-height: 60vh">
                <table class="table table-secondary table-striped table-hover">
                            <tr style="border: none;">
                                <th class="text-start">Resultados</td>
                            </tr>

                            <?php 
                                $resultado_publicado_dao = new ResultadoPublicadoDao();
                                $retorno = $resultado_publicado_dao->Listar();
                                foreach ($retorno as $value) {

                                    $data_publicada = explode("-", $value['data_publicada']);
                                    $data_publicada = $data_publicada[2] . "/" . $data_publicada[1] . "/" . $data_publicada[0];

                                    $hora_publicada = str_split(strval($value['hora_publicada']), 5);
                                    $hora_publicada = $hora_publicada[0];

                                echo "<tr style='border: none; '>" .
                                            "<td style='border: none; text-align:left; padding-bottom: 30px'> " .
                                                "Equivalência: <b>" . $value['nome_equipaA'] . " " . $value['golos_equipaA'] ." - " . " " . $value['golos_equipaB'] . " " . $value['nome_equipaB'] .
                                                "</b><br> Publicadodor: <b>" . $value['nome_publicador'] . " " . $value['sobrenome_publicador'] . 
                                                "</b><br>  Data publicada: <b>". $data_publicada . " " . $hora_publicada . "</b>" .
                                            "</td>" .
                                        "</tr>";
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