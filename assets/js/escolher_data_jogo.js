let data = new Date();
let dia_actual = data.getDate();
let mes_actual = data.getMonth();
let ano_actual = data.getFullYear();
let data_partida = document.querySelector("#data_partida");
let hora_partida = document.querySelector("#hora_partida");
let data_formatada = dia_actual + "-" + (mes_actual + 1) + "-" + ano_actual;

data_partida.addEventListener("focus", () => {
    flatpickr(data_partida,
        {
            dateFormat: "d-m-Y",
            minDate: data_formatada
        });
});

hora_partida.addEventListener("focus", () => {
    flatpickr(hora_partida,
        {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
});

data_partida.addEventListener("blur", () => {
    data_partida.value == "" ? data_partida.value = "00-00-0000" : data_partida.value = data_partida.value;
});

hora_partida.addEventListener("blur", () => {
    hora_partida.value == "" ? hora_partida.value = "00:00" : hora_partida.value = hora_partida.value;
});