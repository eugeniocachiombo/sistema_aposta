<?php include "../inc/headHTML.html"; ?>
<?php include "../inc/header.html"; ?>
<?php include "../init/autoload.php"; ?>
<?php include "../config/db/conexao.php"; ?>
<title>Cadastro de Gestor</title>



<main class="mt-4 mb-4 " data-bs-theme="dark">

    <div class="container">
        <div class="row">
            <?php include "processar_dados/processar_cadastro.php";?>
        </div>
    </div>

    <form action="" method="post" class="d-flex align-items-center needs-validation" style="min-height: 60vh">

        <div class="container d-flex justify-content-center">
            <div class="row d-table d-md-flex">
                <div class="col-md-4 pe-4 justify-content-center d-flex align-items-center" style="background: khaki">
                    <center>
                        <i class="fas fa-user-plus pt-4" style="font-size: 40px"></i>
                        <br>
                        <h3><b>Cadastramento</b></h3>
                        <center>
                </div>

                <div class="col ">
                    <div class="col d-table d-md-flex">
                        <div class="col pe-4">

                            <label class="w-100 text-start pt-3" for="nome">Nome: </label> <br>
                            <input title="Campo obrigatório" type="text" required class="form-control " name="nome"
                                id="nome">

                            <label class="w-100 text-start pt-3" for="sobrenome">Sobrenome: </label> <br>
                            <input title="Campo obrigatório" type="text" required class="form-control" name="sobrenome"
                                id="sobrenome">

                        </div>

                        <div class="col pe-4">

                            <label class="w-100 text-start pt-3" for="email">E-mail</label> <br>
                            <input title="Campo obrigatório" type="email" required class="form-control" name="email"
                                id="email">

                            <label class="w-100 text-start pt-3" for="n_bi">Senha</label> <br>
                            <input title="Campo obrigatório" type="password" required class="form-control" name="senha"
                                id="senha">

                        </div>

                        <div class="col pe-4 ">

                            <label class="w-100 text-start pt-3" for="nascimento">Data de Nascimento</label> <br>
                            <input title="Campo obrigatório" type="text" required class="form-control" name="nascimento"
                                id="nascimento" placeholder="dd-mm-yyyy">

                            <label class="w-100 text-start pt-3" for="genero">Gênero</label> <br>
                            <select class="form-control" required name="genero" id="genero" 
                            style="width: 205px; border: 2px solid cadetblue;" >
                                <option value="">Selecione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>

                        </div>

                        <div class="col pe-4">
                            <label class="w-100 text-start pt-3" for="n_bi">Nº BI</label> <br>
                            <input title="Campo obrigatório" type="text" required class="form-control" name="n_bi"
                                id="n_bi">

                            <label class="w-100 text-start pt-3" for="acesso">Tipo de Acesso</label> <br>
                            <select class="form-control" disabled name="acesso" id="acesso" style="width: 205px; border: 2px solid cadetblue;">
                                <option value="">Selecione...</option>
                                <option selected value="gestor">Gestor</option>
                            </select>
                        </div>
                    </div>

                    <hr class="d-none d-md-block">
                    <div class="col col-md-2 mt-4 pe-4">
                        <input type="submit" class="form-control" name="btn_cadastrar" id="btn_cadastrar"
                            value="Cadastrar">
                    </div>
                </div>

            </div>
        </div>
    </form>
</main>

<script>
let form = document.querySelector(".needs-validation");
let input_text = document.querySelectorAll("input[type='text']");
let input_email = document.querySelector("input[type='email']");
let input_password = document.querySelector("input[type='password']");
let select = document.querySelectorAll("select");
let input_submit = document.querySelector("input[type='submit']");


document.addEventListener("DOMContentLoaded", ()=>{
    ValidarComClick();
});

function ValidarComClick() {
    input_submit.addEventListener("click", () => {

        input_text.forEach(element => {
            if (element.checkValidity()) {
                element.classList.add("is-valid");
            } else {
                element.classList.add("is-invalid");
            }
        });

        if (input_email.checkValidity()) {
            input_email.classList.add("is-valid");
        } else {
            input_email.classList.add("is-invalid");
        }

        if (input_password.checkValidity()) {
            input_password.classList.add("is-valid");
        } else {
            input_password.classList.add("is-invalid");
        }

        select.forEach(element => {
            if (element.checkValidity()) {
                element.classList.add("is-valid");
            } else {
                element.classList.add("is-invalid");
            }
        });

        form.classList.add("was-validated");
    });
}


flatpickr("#nascimento", {dateFormat: "d-m-Y",});
</script>

<?php include "../inc/footer.html"; ?>
<?php include "../inc/footHTML.html"; ?>