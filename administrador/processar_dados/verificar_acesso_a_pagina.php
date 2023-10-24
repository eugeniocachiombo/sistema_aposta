<?php

function VerificarGeral(){
    if(empty($_SESSION["id_administrador"])){ 
        SeNaoAdministradorSeNaoLogado();
    }
}

function SeNaoAdministradorSeNaoLogado(){
    if(isset($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaLogado();
    }else{
        ProcessarEncaminharParaAutenticar();
    }
}

function VerificarSeAdministrador(){
    if(empty($_SESSION["id_administrador"])){ 
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
            window.location = "../administrador/autenticar.php";
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

