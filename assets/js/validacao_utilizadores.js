let form = document.querySelector(".needs-validation");
let input_text = document.querySelectorAll("input[type='text']");
let input_email = document.querySelector("input[type='email']");
let input_password = document.querySelector("input[type='password']");
let select = document.querySelectorAll("select");
let input_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let texto_cadastrar = document.querySelector("#texto_cadastrar");
spinner.style = "display: none";
texto_cadastrar.innerText = "Cadastrar";

input_submit.addEventListener("click", () => {
    spinner.style = "display: iniline";
    texto_cadastrar.innerText = "Carregando...";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        texto_cadastrar.innerText = "Cadastrar";
    }, 2000);
});

function ValidarComClick() {
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
}