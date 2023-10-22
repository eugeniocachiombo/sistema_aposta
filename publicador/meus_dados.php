<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Meus Dados</title>

<?php
    if(empty($_SESSION["id_publicador"])){ 
        ?>
            <script>
                    window.location = "../publicador/autenticar.php";
            </script>
        <?php
    }
?>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Informações Pessoais</h3>
        </div>

        <div class="d-flex justify-content-start align-items-center" style="min-height: 40vh; font-size: 20px;">
            <div>
                <br>
                <strong> <i class="fas fa-user"></i> <?php echo $_SESSION["nome_publicador"] . " " . $_SESSION["sobrenome_publicador"]; ?> </strong> <br> <hr>
                <strong> <i class="fas fa-at"></i> E-mail: </strong> <?php echo $_SESSION["email_publicador"]; ?> <br>  
                <strong> <i class="fas fa-calendar"></i> Nascido: </strong> <?php echo $_SESSION["nascimento_publicador"]; ?> <br> 
                <strong> <i class="fas fa-venus"></i> Gênero: </strong> <?php echo ($_SESSION["genero_publicador"] == "M") ? "Masculino" : "Femenino"; ?> <br> 
                <strong> <i class="fas fa-address-card"></i> BI Nº: </strong> <?php echo $_SESSION["n_bi_publicador"]; ?> 
            </div>
        </div>
           
        <div class="row mt-4 pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> .... </h3>
        </div>
    </div>
</main>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>