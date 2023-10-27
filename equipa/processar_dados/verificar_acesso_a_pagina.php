<?php

function VerificarGeral(){
    if(empty($_SESSION["id_gestor"]) && empty($_SESSION["id_administrador"])){ 
        SeNaoGestorSeNaoLogado();
    }
}

function SeNaoGestorSeNaoLogado(){
    if(isset($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaLogado();
    }else{
        ProcessarEncaminharParaAutenticar();
    }
}

function VerificarSeGestor(){
    if(empty($_SESSION["id_gestor"])){ 
        ProcessarEncaminharParaAutenticar();
    }
}

function VerificarUtilizadorLogado(){
    if(isset($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaLogado();
    }
}

function SeNaoUtilizadorLogado(){
    if(empty($_SESSION["id_logado"])){ 
        ProcessarEncaminharParaInicio();
    }
}

function ProcessarEncaminharParaInicio(){
    ?>
        <script>
            window.location = "../inicio";
        </script>
    <?php
}

function ProcessarEncaminharParaAutenticar(){
    ?>
        <script>
            window.location = "../gestor/autenticar.php";
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

