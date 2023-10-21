let ano = new Date();
let idade_adulta = ano.getFullYear() - 18;
let nascimento = document.querySelector("#nascimento");

nascimento.addEventListener("focus", ()=>{
    flatpickr(nascimento, 
        {
            dateFormat: "d-m-Y",
            minDate: "01.01.1950",
            maxDate: "15.12." + idade_adulta
        });
})
