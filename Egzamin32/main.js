const sprawdzDostepnaIlosc = () => {
    const dostepneIlosci = document.getElementsByClassName("ilosc");

    Array.from(dostepneIlosci).forEach(dostepnaIlosc => {
        const ilosc = parseInt(dostepnaIlosc.textContent);

        if (ilosc === 0) {
            dostepnaIlosc.style.backgroundColor = "red";
        } else if (ilosc >= 1 && ilosc <= 5) {
            dostepnaIlosc.style.backgroundColor = "yellow";
        } else {
            dostepnaIlosc.style.backgroundColor = "Honeydew";
        }
    });
}

sprawdzDostepnaIlosc();

let zamowienieId = 0;

update = (button) => {
    const wiersz = button.closest("tr");
    const ilosc = wiersz.querySelector(".ilosc");
    const nowaIlosc = prompt("Podaj nową ilość:");
    ilosc.textContent = nowaIlosc;
    sprawdzDostepnaIlosc();
}

order = (button) => {
    zamowienieId++;
    const wiersz = button.closest("tr");
    const nazwaProduktu = wiersz.cells[0].textContent;
    alert(`Zamówienie nr: ${zamowienieId} Produkt: ${nazwaProduktu}`);
}
