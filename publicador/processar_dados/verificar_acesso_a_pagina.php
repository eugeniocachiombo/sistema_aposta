<?php

function VerificarGeral(){
    if(empty($_SESSION["id_publicador"])){ 
        SeNaoPublicadorSeNaoLogado();
    }
}

function SeNaoPublicadorSeNaoLogado(){
    if(isset($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaLogado();
    }else{
        ProcessarEncaminharParaAutenticar();
    }
}

function VerificarSePublicador(){
    if(empty($_SESSION["id_publicador"])){ 
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
            window.location = "../publicador/autenticar.php";
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

