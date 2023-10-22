let form = document.querySelector(".needs-validation");
let input_text = document.querySelectorAll("input[type='text']");
let input_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let texto_alterar_senha = document.querySelector("#texto_alterar_senha");
spinner.style = "display: none";
texto_alterar_senha.innerText = "Alterar Senha";

input_submit.addEventListener("click", () => {
    spinner.style = "display: iniline";
    texto_alterar_senha.innerText = "Carregando...";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        texto_alterar_senha.innerText = "Alterar Senha";
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

    form.classList.add("was-validated");
}