<?php $tipo_acesso = isset($_SESSION["tipo_acesso_logado"]) ? $_SESSION["tipo_acesso_logado"] : ""; ?>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Painel de actividades</h3>
        </div>

        <?php if($tipo_acesso == "administrador" || $tipo_acesso == "gestor" || $tipo_acesso == "publicador"){ ?>

        <div class="row pt-4">
            <p>Registos a respeito de cadastro de equipas e partidas</p>
            <div class="col-12 col-sm-6 ">
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
                <hr class=" d-sm-none" size="6px">
            </div>

            <div class="col-12 col-sm-6 ">
                <div class="table-responsive" style="max-height: 60vh">
                    <table class="table table-success table-striped table-hover">
                        <tr style="border: none;">
                            <th class="text-start">Partidas</td>
                        </tr>

                        <?php 
                            $partida_dao = new PartidaDao();
                            $retorno = $partida_dao->Listar();
                            foreach ($retorno as $value) {
                               echo "<tr style='border: none;'>";
                                echo "<td style='border: none;'>" . $value["nome_equipaA"] . " x " . $value["nome_equipaB"] ."</td>";
                               echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <hr class=" d-sm-none" size="6px">
            </div>
        </div>

        <hr style="color: #299" size="8px" class=''>

        <div class="row w-40 pt-4 pb-2">
            <div class="col ">
                <i class="fas fa-futbol text-dark" style="font-size: 50px"></i>
            </div>

            <div class="col text-center d-flex justify-content-center align-items-center">
                <h4>Apostar para ganhar!</h4>
            </div>

            <div class="col text-end ">
                <i class="fas fa-futbol text-dark" style="font-size: 50px"></i>
            </div>
        </div>

        <hr style="color: #299" size="8px" class=''>

        <?php } ?>

        <div class="row pt-4">
            <p>Registos a respeito de partidas publicadas</p>
            <div class="col ">
                <div class="table-responsive" style="max-height: 60vh">
                    <table class="table table-info table-striped table-hover">

                        <tr style="border: none;">
                            <th class="text-start">Partidas publicadas</td>
                        </tr>

                        <?php 
                            $partida_publicada_dao = new PartidaPublicadaDao();
                            $retorno = $partida_publicada_dao->Listar();
                            foreach ($retorno as $value) {

                                $data_publicada = explode("-", $value['data_publicada']);
                                $data_publicada = $data_publicada[2] . "/" . $data_publicada[1] . "/" . $data_publicada[0];

                                $hora_publicada = str_split(strval($value['hora_publicada']), 5);
                                $hora_publicada = $hora_publicada[0];

                                $data_partida = explode("-", $value['data_partida']);
                                $data_partida = $data_partida[2] . "/" . $data_partida[1] . "/" . $data_partida[0];
                                
                                $hora_partida = str_split($value['hora_partida'], 5);
                                $hora_partida = $hora_partida[0];

                               echo "<tr style='border: none;'>" .
                                        "<td style='border: none;text-align:left'> <b>" 
                                            . $value['nome_equipaA'] . " x " . $value['nome_equipaB'] . 
                                            "</b> <br class='d-blcok d-sm-none'>  Data do jogo: <b>". $data_partida . " " . $hora_partida . "</b>" .
                                            "</b> <br class='d-block d-sm-none'>  Publicado: <b>". $data_publicada . " " . $hora_publicada . "</b>" .
                                            "</b> <br class='d-block d-sm-none'> por: <b>". $value['nome_publicador'] . " " . $value['sobrenome_publicador'] . "</b>" .
                                        "</td>" .
                                     "</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <hr style="color: #299" size="8px" class=''>

        <div class="row w-40 pt-4 pb-2">
            <div class="col ">
                <i class="fas fa-futbol text-dark" style="font-size: 50px"></i>
            </div>

            <div class="col text-center d-flex justify-content-center align-items-center">
                <h4>Apostar para ganhar!</h4>
            </div>

            <div class="col text-end ">
                <i class="fas fa-futbol text-dark" style="font-size: 50px"></i>
            </div>
        </div>

        <hr style="color: #299" size="8px" class=''>

        <div class="row pt-4">
            <p>Registos a respeito de apostas e resultados obtidos nas sessões</p>
            
            <?php if( $tipo_acesso == "administrador" ){ ?>

                <div class="col-12 col-sm-6 ">
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
                    <hr class=" d-sm-none" size="6px">
                </div>

            <?php } ?>

            <div class="col-12 col-sm-6 ">
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
                                            "</b><br> Publicador: <b>" . $value['nome_publicador'] . " " . $value['sobrenome_publicador'] . 
                                            "</b><br>  Data publicada: <b>". $data_publicada . " " . $hora_publicada . "</b>" .
                                        "</td>" .
                                     "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <hr class=" d-sm-none" size="6px">
            </div>

            <?php if( $tipo_acesso == "apostador" ){ ?>

                <div class="col-12 col-sm-6 ">
                    <div class="table-responsive" style="max-height: 60vh">
                        <table class="table table-primary table-striped table-hover">
                            <tr style="border: none;">
                                <th class="text-start">Minhas Vitórias</th>
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
                                                            "<h3 class='text-success'> Você venceu esta aposta, sua recompensa é de " . ( $value['valor_apostado'] * 2) . ",00KZ </h3>" .
                                                        "</td>" .
                                                "</tr>";
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    <hr class=" d-sm-none" size="6px">
                </div>

            <?php } ?>
        </div>

        <div class="row mt-4 pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> .... </h3>
        </div>
    </div>
</main>