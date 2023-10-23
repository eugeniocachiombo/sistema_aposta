<style>
    ul li:hover{
        background: whitesmoke;
        font-weight: bold;
    }   

    .txt_publicar:hover {
        background: white;
    }
</style>

<div class="d-flex align-items-center p-2">
    <div class="container-fluid" style="padding-left: -10px">
    <div class="row   ">
        <div class="col ">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php include "rotas_nav.php"; ?>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col d-flex justify-content-end align-items-center" style="min-width: 250px">
            
                <i class="fas fa-user me-2" style="font-size: 20px"></i>
                <?php 
                    if(isset($_SESSION["id_logado"])){
                        echo $_SESSION["nome_logado"] . " " .  $_SESSION["sobrenome_logado"]; 
                    } 
                ?>
            
        </div>
    </div>
    </div>
</div>

<header class="d-flex align-items-center">
    <div class="container d-flex d-md-block w-100 pt-3 pb-3">
        <div class="col-2 col-md-12 text-md-center">
            <i class="fas fa-volleyball" style="font-size: 80px; color: black;"></i>
        </div>

        <div class="col display-6 d-flex align-items-end" style="">
            <p class=" w-100 d-none d-md-block text-md-center  "><b>Sistema de Aposta S.A</b></p>
            <p class=" w-100 d-block d-md-none text-md-center ms-2  "><b>Sistema de Aposta S.A</b></p>
        </div>
    </div>
</header>