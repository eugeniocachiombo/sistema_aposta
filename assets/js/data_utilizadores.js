let data = new Date();
let ano_actual = data.getFullYear();
let idade_adulta = ano_actual - 18;
let nascimento = document.querySelector("#nascimento");


console.log(ano_actual);
nascimento.addEventListener("focus", ()=>{
    flatpickr(nascimento, 
        {
            dateFormat: "d-m-Y",
            minDate: "01.01.1950",
            maxDate: "15.12." + idade_adulta
        });
});
