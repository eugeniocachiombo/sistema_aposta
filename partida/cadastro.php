<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.html"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Cadastro de Partida</title>

<main class="mt-4 mb-4 ">

    <div class="container">
        <div class="row">
            <?php include "processar_dados/processar_cadastro.php";?>
        </div>
    </div>

    <form action="" method="post" class="d-flex align-items-center needs-validation" style="min-height: 60vh">

        <div class="container d-flex justify-content-center">
            <div class="row d-table d-md-flex">
                <div class="col-md-4 pe-4 justify-content-center d-flex align-items-center" style="background: khaki">
                    <center>
                        <i class="fas fa-futbol pt-4" style="font-size: 40px"></i>
                        <br>
                        <h3><b>Partida</b></h3>
                        <center>
                </div>

                <div class="col ">
                    <div class="col d-table d-md-flex">
                        <div class="col pe-4 ">

                            <label class="w-100 text-start pt-3" for="equipaA">Equipa A</label> <br>
                            <select class="form-control" required name="equipaA" id="equipaA"
                                style="width: 205px; border: 2px solid cadetblue;">
                                <option value="">Selecione...</option>
                                <?php 
                                    $equipa_dao = new EquipaDao();
                                    $retorno = $equipa_dao->Listar();
                                    foreach ($retorno as $value) {
                                       echo "<option value='" . $value['id_equipa'] . "'>" . $value['nome_equipa'] . "</option>";
                                    }
                                ?>
                            </select> 

                            <label class="w-100 text-start pt-3" for="equipaB">Equipa B</label> <br>
                            <select class="form-control" required name="equipaB" id="equipaB"
                                style="width: 205px; border: 2px solid cadetblue;">
                                <option value="">Selecione...</option>
                                <?php 
                                    $equipa_dao = new EquipaDao();
                                    $retorno = $equipa_dao->Listar();
                                    foreach ($retorno as $value) {
                                       echo "<option value='" . $value['id_equipa'] . "'>" . $value['nome_equipa'] . "</option>";
                                    }
                                ?>
                            </select>

                        </div>

                        <div class="col pe-4 d-none">
                            <label class="w-100 text-start pt-3" for="id_gestor">Acesso</label> <br>
                            <select class="form-control" disabled name="id_gestor" id="id_gestor"
                                style="width: 205px; border: 2px solid cadetblue;">
                                <option value="">Selecione...</option>
                                <option selected value="<?php echo $_SESSION["id"]?>"><?php echo $_SESSION["nome"] . " " . $_SESSION["sobrenome"] ?></option>
                            </select>
                        </div>
                    </div>

                    <hr class="d-none d-md-block">
                    <div class="col col-md-2 mt-4 pe-4">
                        <button type="submit" class="form-control button" name="btn_cadastrar" id="btn_cadastrar">
                            <span id="texto_cadastrar">Cadastrar</span>
                            <span id="spinner" class="spinner-grow spinner-grow-sm" role="status"
                                aria-hidden="true"></span>
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </form>
</main>

<script src="../assets/js/validacao_utilizadores.js"></script>
<script src="../assets/js/data_utilizadores.js"></script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>