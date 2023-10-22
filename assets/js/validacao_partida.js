let form = document.querySelector(".needs-validation");
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

    select.forEach(element => {
        if (element.checkValidity()) {
            element.classList.add("is-valid");
        } else {
            element.classList.add("is-invalid");
        }
    });

    form.classList.add("was-validated");
}