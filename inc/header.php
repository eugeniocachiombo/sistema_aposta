<style>
ul li:hover {
    background: whitesmoke;
    font-weight: bold;
}
</style>

<div class="d-flex align-items-center pt-2">
    <div class="container-fluid" style="">
        <div class="row   ">
            <div class="col ">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
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
            
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class=" navbar-light bg-white" style="min-width: 205px"> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                             <?php include "rotas_nav.php"; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<header class="d-flex align-items-center">
    <div class="container d-flex d-md-block w-100 pt-3 pb-3 ">
        <div class="col-2 col-md-12 text-md-center d-flex justify-content-center align-items-center">
            <i class="fas fa-volleyball" style="font-size: 80px; color: black;"></i>
        </div>

        <div class="col display-6 d-none d-md-flex align-items-center">
            <p class=" w-100 text-md-center " style="font-family: verdana"><b>Sistema de Aposta</b></p>
        </div>

        <div class="col display-6 d-flex d-md-none align-items-end ">
            <p class=" w-100 text-md-center ms-3 " style="font-size: 22px; font-family: verdana"><b>Sistema de Aposta</b></p>
        </div>
    </div>
</header>