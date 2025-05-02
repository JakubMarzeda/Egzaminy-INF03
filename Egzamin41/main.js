calculate = () => {
    const fuelType = document.getElementById("fuel-type").value;
    const countLiters = document.getElementById("count-liters").value;
    const resultText = document.getElementById("result");
    let result = 0;
    let price = 0;
    if (fuelType == 1) {
        price = 4;
        result = countLiters * price;
    }
    else if (fuelType == 2) {
        price = 3.5;
        result = countLiters * price;
    }
    else {
        result = 0;
    }

    resultText.innerText = `koszt paliwa: ${result} zł`;
}