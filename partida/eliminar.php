<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Eliminar Partida</title>


<?php
    if(empty($_SESSION["id_gestor"])){ 
        if(isset($_SESSION["id_logado"])){ 
            ?>
                <script>
                        window.location = "../" + "<?php echo $_SESSION["tipo_acesso_logado"]; ?>";
                </script>
            <?php
        }else{
        ?>
            <script>
                    window.location = "../gestor/autenticar.php";
            </script>
        <?php
        }
    }
?>


<main class="mt-4 mb-4 ">
    <div class="container ">
        <div class="row pt-2 mb-4" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Registo de Partidas</h3>
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
                            <h3><b>Eliminar Partida</b></h3>
                            <center>
                    </div>

                    <div class="col ">
                        <div class="col d-table d-md-flex">
                            <div class="col pe-4 ">

                                <label class="w-100 text-start pt-3" for="id">Partida</label> <br>
                                <select class="form-control" required name="id" id="id"
                                    style="width: 205px; border: 2px solid cadetblue;">
                                    <option value="">Selecione...</option>
                                    <?php 
                                    $partida_dao = new PartidaDao();
                                    $retorno = $partida_dao->Listar();
                                    foreach ($retorno as $value) {
                                       echo "<option value='" . $value['id_partida'] . "'>" . $value['nome_equipaA'] ." x ". $value['nome_equipaB'] . "</option>";
                                    }
                                ?>
                                </select>
                            </div>

                            <div class="col pe-4 d-none">
                                <label class="w-100 text-start pt-3" for="id_gestor">Acesso</label> <br>
                                <select class="form-control" disabled name="id_gestor" id="id_gestor"
                                    style="width: 205px; border: 2px solid cadetblue;">
                                    <option value="">Selecione...</option>
                                    <option selected value="<?php echo $_SESSION["id"]?>">
                                        <?php echo $_SESSION["nome"] . " " . $_SESSION["sobrenome"] ?></option>
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

<script src="../assets/js/validacao_partida_eliminar.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>