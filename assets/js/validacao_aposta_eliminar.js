let form = document.querySelector(".needs-validation");
let select = document.querySelector("select");
let input_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let texto_eliminar = document.querySelector("#texto_eliminar");
spinner.style = "display: none";
texto_eliminar.innerText = "Eliminar";

input_submit.addEventListener("click", () => {
    spinner.style = "display: iniline";
    texto_eliminar.innerText = "Carregando...";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        texto_eliminar.innerText = "Eliminar";
    }, 2000);
});

function ValidarComClick() {
    
    if (select.checkValidity()) {
        select.classList.add("is-valid");
    } else {
        select.classList.add("is-invalid");
    }

    form.classList.add("was-validated");
}