<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Minhas Vitórias</title>

<?php
if(empty($_SESSION["id_logado"])){ 
    ?>
        <script>
                window.location = "../inicio";
        </script>
    <?php
}
?>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Vitórias</h3>
        </div>

        <div class="pt-4" style="min-height: 40vh; font-size: 20px;">
            <div class="table-responsive" style="max-height: 60vh">
                <table class="table table-primary table-striped table-hover">
                            <tr style="border: none;">
                                <th class="text-start">Vitórias</th>
                            </tr>

                            <?php 
                                $aposta_dao = new ApostaDao();
                                $retorno_aposta = $aposta_dao->ListarPorApostador($_SESSION['id_apostador']);
                                
                                foreach ($retorno_aposta as $value) {
                                    $id_apostador = $value["id_apostador"];
                                    $golos_equipaA = $value["golos_equipaA"];
                                    $golos_equipaB = $value["golos_equipaB"];

                                    $retorno_dados_aposta = $aposta_dao->Listar();
                                    foreach ($retorno_dados_aposta as $value) {

                                        if(
                                            $id_apostador == $value["id_apostador"] && 
                                            $golos_equipaA == $value["golos_equipaA"] && 
                                            $golos_equipaB == $value["golos_equipaB"]
                                        ){

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
                                                            "<h3 class='text-success'> Você Venceu esta aposta, sua recompensa é de " . ( $value['valor_apostado'] * 2) . ",00KZ </h3>" .
                                                        "</td>" .
                                                "</tr>";
                                        }
                                    }
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