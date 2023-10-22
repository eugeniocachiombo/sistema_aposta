<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Página Inicial</title>

<?php
    if(empty($_SESSION["id"])){ 
        ?>
            <script>
                    window.location = "../gestor/autenticar.php";
            </script>
        <?php
    }
?>

<main class="mb-4 mt-4">
    <div class="container ">
        <div class="row pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> Informações Pessoais</h3>
        </div>

           
            <strong>Nome: </strong> <?php echo $_SESSION["nome"]; ?> <br>
            <strong>Sobrenome: </strong> <?php echo $_SESSION["sobrenome"]; ?> <br>
            <strong>E-mail: </strong> <?php echo $_SESSION["email"]; ?> <br>
            <strong>Data de Nascimento: </strong> <?php echo $_SESSION["nascimento"]; ?> <br>
            <strong>Gênero: </strong> <?php echo $_SESSION["genero"]; ?> <br>
            <strong>Nº do BI: </strong> <?php echo $_SESSION["n_bi"]; ?> <br>

        <div class="row mt-4 pt-2" style="background: khaki">
            <h3> <i class="fas fa-futbol"></i> .... </h3>
        </div>
    </div>
</main>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>