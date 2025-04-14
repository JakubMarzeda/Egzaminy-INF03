const result = document.getElementById("wynik");
const shortHaircut = document.getElementById("krotkie");
const middleHaircut = document.getElementById("srednie");
const halfLongHaircut = document.getElementById("poldlugie");
const longHairCut = document.getElementById("dlugie")


function odkryj() {
    let cena = 0;
    if (shortHaircut.checked) {
        cena = 25 - 10;
    }

    if (middleHaircut.checked) {
        cena = 30 - 10;
    }

    if (halfLongHaircut.checked) {
        cena = 40 - 10;
    }
    
    if (longHairCut.checked) {
        cena = 50 - 10;
    }

    result.innerText = `Cena promocyjna: ${cena}`;
}