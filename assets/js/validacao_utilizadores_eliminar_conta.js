let form = document.querySelector(".needs-validation");
let input_text = document.querySelector("input[type='password']");
let input_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let texto_eliminar_conta = document.querySelector("#texto_eliminar_conta");
spinner.style = "display: none";
texto_eliminar_conta.innerText = "Eliminar Conta";

input_submit.addEventListener("click", () => {
    spinner.style = "display: iniline";
    texto_eliminar_conta.innerText = "Carregando...";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        texto_eliminar_conta.innerText = "Eliminar Conta";
    }, 2000);
});

function ValidarComClick() {

    if (input_text.checkValidity()) {
        input_text.classList.add("is-valid");
    } else {
        input_text.classList.add("is-invalid");
    }

    form.classList.add("was-validated");
}