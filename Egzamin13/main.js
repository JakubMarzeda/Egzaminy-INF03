const peeling = document.getElementById("peeling");
const mask = document.getElementById("maska");
const massage = document.getElementById("masaz-twarzy");
const makeup = document.getElementById("makijaz");
const result = document.getElementById("result");

function calculate() {
    let prize = 0;
    if (peeling.checked) {
        prize += 45;
    }
    if (mask.checked) {
        prize += 30;
    }
    if (massage.checked) {
        prize += 20;
    }
    if (makeup.checked) {
        prize += 50;
    }

    result.innerText = `Cena zabiegów ${prize}`;
}