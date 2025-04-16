calculate = () => {
    const widthValue = parseFloat(document.getElementById("width-room").value);
    const lengthValue = parseFloat(document.getElementById("length-room").value);
    const laminatePanels = document.getElementById("laminate-panels").checked;
    const vinylPanels = document.getElementById("vinyl-panels").checked;
    const boardPanels = document.getElementById("board-panels").checked;
    const result = document.getElementById("result");
    let installationCost = 0;
    const area = widthValue * lengthValue;
    
    if (widthValue > 0 && lengthValue > 0 && (laminatePanels || vinylPanels || boardPanels)) {
        if (laminatePanels) {
            installationCost = area * 12;
        }
        if (vinylPanels) {
            installationCost = area * 14;
        }
        if (boardPanels) {
            installationCost = area * 18;
        }
        result.innerText = `Pole powierzchni pomieszczenia: ${area}, koszt montażu ${installationCost}`
    } else {
        result.innerText = "Wprowadź poprawne dane";
    }
}