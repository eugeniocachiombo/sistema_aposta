<?php include "../inc/headHTML.html"; ?>
<?php include "../inc/header.html"; ?>
<title>Cadastro de utilizador</title>

<main class="mt-4 mb-4 ">
    <form action="" method="post" class="d-flex align-items-center" style="min-height: 60vh">

        <div class="container d-flex justify-content-center">
            <div class="row d-table d-md-flex">

                <div class="col-md-4 pe-4 justify-content-center d-flex align-items-center" style="background: khaki">
                    <center>
                            <i class="fas fa-user-plus pt-4" style="font-size: 40px"></i>
                            <br><h3><b>Cadastramento</b></h3>
                    <center>
                </div>

                <div class="col ">
                    <div class="col d-table d-md-flex">
                        <div class="col pe-4 ">

                            <label class="w-100 text-start pt-3" for="nome">Nome: </label> <br>
                            <input type="text" class="form-control" name="nome" id="nome">

                            <label class="w-100 text-start pt-3" for="sobrenome">Sobrenome: </label> <br>
                            <input type="text" class="form-control" name="sobrenome" id="sobrenome">

                        </div>

                        <div class="col pe-4">

                            <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                            <input type="text" class="form-control" name="n_bi" id="n_bi">

                            <label class="w-100 text-start pt-3" for="n_bi">Senha</label> <br>
                            <input type="password" class="form-control" name="senha" id="senha">

                        </div>

                        <div class="col pe-4 ">

                            <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                            <input type="text" class="form-control" name="n_bi" id="n_bi">

                            <label class="w-100 text-start pt-3" for="n_bi">Senha</label> <br>
                            <input type="password" class="form-control" name="senha" id="senha">

                        </div>

                        <div class="col pe-4">

                            <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                            <input type="text" class="form-control" name="n_bi" id="n_bi">

                            <label class="w-100 text-start pt-3" for="n_bi">Senha</label> <br>
                            <input type="password" class="form-control" name="senha" id="senha">

                        </div>
                    </div>

                    <div class="col col-md-3 mt-4 pe-4">
                            <input type="submit" class="form-control" name="btn_cadastrar" id="btn_cadastrar"
                                value="Cadastrar">
                    </div>
                </div>

            </div>
        </div>
    </form>
</main>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>