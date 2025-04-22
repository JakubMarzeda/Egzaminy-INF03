order = () => {
    const shapeNumber = document.getElementById("shape").value;
    const result = document.getElementById("your-order");

    if (shapeNumber == 1) {
        result.innerText = "Twoje zamówienie to cukierek cytryna";
    } else if (shapeNumber == 2) {
        result.innerText = "Twoje zamówienie to cukierek liść";
    } else if (shapeNumber == 3) {
        result.innerText = "Twoje zamówienie to cukierek banan";
    }

    const r = parseInt(document.getElementById("r").value);
    const g = parseInt(document.getElementById("g").value);
    const b = parseInt(document.getElementById("b").value);
    const colorButton = document.getElementById("color-button");
    colorButton.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
}