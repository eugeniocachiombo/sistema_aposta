let form = document.querySelector(".needs-validation");
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
    form.classList.add("was-validated");
}