let form = document.querySelector(".needs-validation");
let input_text = document.querySelector("input[type='text']");
let select = document.querySelectorAll("select");
let input_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let texto_actualizar = document.querySelector("#texto_actualizar");

spinner.style = "display: none";
texto_actualizar.innerText = "Actualizar";

input_submit.addEventListener("click", () => {
    spinner.style = "display: iniline";
    texto_actualizar.innerText = "Carregando...";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        texto_actualizar.innerText = "Actualizar";
    }, 2000);
});

function ValidarComClick() {

    if (input_text.checkValidity()) {
        input_text.classList.add("is-valid");
    } else {
        input_text.classList.add("is-invalid");
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