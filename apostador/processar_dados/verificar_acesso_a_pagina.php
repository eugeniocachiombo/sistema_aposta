<?php

function VerificarGeral(){
    if(empty($_SESSION["id_apostador"])){ 
        SeNaoApostadorSeNaoLogado();
    }
}

function SeNaoApostadorSeNaoLogado(){
    if(isset($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaLogado();
    }else{
        ProcessarEncaminharParaAutenticar();
    }
}

function VerificarSeApostador(){
    if(empty($_SESSION["id_apostador"])){ 
        ProcessarEncaminharParaAutenticar();
    }
}

function VerificarUtilizadorLogado(){
    if(isset($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaLogado();
    }
}

function ProcessarEncaminharParaAutenticar(){
    ?>
        <script>
            window.location = "../apostador/autenticar.php";
        </script>
    <?php
}

function ProcessarEncaminharParaLogado(){
    ?>
        <script>
            window.location = "../" + "<?php echo $_SESSION["tipo_acesso_logado"]; ?>";
        </script>
    <?php
}

