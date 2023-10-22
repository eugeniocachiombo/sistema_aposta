<?php include "../inc/headHTML.php"; ?>
<?php include "../inc/header.php"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<?php include "../app/dao/partida_publicada_dao.php"; ?>
<?php include "../app/dao/resultado_publicado_dao.php"; ?>
<link rel="stylesheet" href="../assets/css/inputs.css">
<title>Página Inicial</title>

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

<?php include "../inc/pagina_inicial_info.php"; ?>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>