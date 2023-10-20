<?php include "../inc/headHTML.html"; ?>
<?php include "../inc/header.html"; ?>
<link rel="stylesheet" href="../assets/css/inputs_autenticacao.css">
<title>Autenticação</title>

<main>
    <form method="post" class="d-flex justify-content-center align-items-center needs-validation" style="height: 60vh">
            
            <div class="col-5 ">
            <i class="fas fa-user w-100" style="font-size: 40px"></i>
            <h1><b>Autenticação</b></h1>
                <div class="col">
                    <label class="w-100 text-start" for="n_bi">Nº BI</label> <br>
                    <input required type="text" class="form-control" name="n_bi" id="n_bi">
                </div>

                <div class="col pt-2">
                    <label class="w-100 text-start" for="n_bi">Senha</label> <br>
                    <input required type="password" class="form-control" name="senha" id="senha">
                </div class="col">

                <div class="col pt-3">
                        <button type="submit" class="form-control button" name="btn_autenticar" id="btn_autenticar">
                            <span id="texto_autenticar">Autenticar</span>
                            <span id="spinner" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        </button>
                </div>
            </div>
    </form>
</main>

<script src="../assets/js/validacao_autenticacao.js"></script>
<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>