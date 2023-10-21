<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.html"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Página Inicial</title>

<main>
    Nome: <?php echo $_SESSION["nome"] . " " .  $_SESSION["sobrenome"]; ?>
</main>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>