<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Lista de Apostas</title>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Apostas</h3>
        </div>

        <div class="pt-4" style="min-height: 40vh; font-size: 20px;">
            <div class="table-responsive" style="max-height: 60vh">
                <table class="table table-primary table-striped table-hover">
                            <tr style="border: none;">
                                <th class="text-start">Apostas</th>
                            </tr>

                            <?php 
                                $aposta_dao = new ApostaDao();
                                $retorno = $aposta_dao->Listar();
                                foreach ($retorno as $value) {

                                    $data_aposta = explode("-", $value['data_aposta']);
                                    $data_aposta = $data_aposta[2] . "/" . $data_aposta[1] . "/" . $data_aposta[0];

                                    $hora_aposta = str_split(strval($value['hora_aposta']), 5);
                                    $hora_aposta = $hora_aposta[0];

                                echo "<tr style='border: none;'>" .
                                            "<td style='border: none;text-align:left'> " 
                                                . "Apostador: <b>" . $value['nome_apostador'] . " " . $value['sobrenome_apostador'] . 
                                                "</b> <br> Equivalência: <b>" . $value['nome_equipaA'] . " " . $value['golos_equipaA'] ." - " . " " . $value['golos_equipaB'] . " " . $value['nome_equipaB'] . 
                                                "</b><br>  Data de aposta: <b>". $data_aposta . " " . $hora_aposta . "</b>" .
                                                "</b> <br>  Quantia Apostada: <b>". $value['valor_apostado'] . " 00,KZ</b>" .
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