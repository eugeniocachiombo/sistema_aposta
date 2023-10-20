let form = document.querySelector(".needs-validation");
let input_text = document.querySelector("input[type='text']");
let input_password = document.querySelector("input[type='password']");
let input_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let texto_autenticar = document.querySelector("#texto_autenticar");
spinner.style = "display: none";
texto_autenticar.innerText = "Autenticar";

input_submit.addEventListener("click", () => {
    spinner.style = "display: iniline";
    texto_autenticar.innerText = "Carregando...";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        texto_autenticar.innerText = "Autenticar";
    }, 2000);
});

function ValidarComClick() {
    if (input_text.checkValidity()) {
        input_text.classList.add("is-valid");
    } else {
        input_text.classList.add("is-invalid");
    }

    if (input_password.checkValidity()) {
        input_password.classList.add("is-valid");
    } else {
        input_password.classList.add("is-invalid");
    }

    form.classList.add("was-validated");
}