<div class="d-flex align-items-center p-2">
    <div class="col d-flex">
        
        <div class="col d-none d-md-flex align-items-end">
            Menu
        </div>

        <div class="col d-block d-md-none">
            <i class="fas fa-bars" style="font-size: 22px"></i>
        </div>
    </div>

    <div class="col-8 text-end">
        <i class="fas fa-user" style="font-size: 20px"></i>
        <?php 
            if(isset($_SESSION["id"])){
                echo $_SESSION["nome"] . " " .  $_SESSION["sobrenome"]; 
            } 
        ?>
    </div>
</div>

<header class="d-flex align-items-center">
    <div class="container d-flex d-md-block w-100 pt-3 pb-3">
        <div class="col-2 col-md-12 text-md-center">
            <i class="fas fa-volleyball" style="font-size: 80px; color: white;"></i>
        </div>
    
        <div class="col display-6 d-flex align-items-end">
            <p class=" w-100 text-md-center ms-1"><b>Sistema de Aposta S.A</b></p>
        </div>
    </div>
</header>