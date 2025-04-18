reverseString = (text) => {
    let reverseString = "";
    for(let i = text.length - 1; i >= 0; i--) {
        reverseString += text[i];
    }
    return reverseString;
}

addSpacesToString = (text) => {
    let formatedText = ""; // Nowa zmienna bo string w js jest niemutowalny (nie można go zmieniać)
    for(let i = 0; i <= text.length - 1; i++) {
        formatedText += text[i];
        if((i + 1) % 4 === 0 && i !== text.length - 1) {
            formatedText += " ";
        }
    }
    return formatedText;
}

calculateToBinaryNumberSystem = () => {
    const result = document.getElementById("result");
    let decimalNumber = document.getElementById("decimal-number").value;
    let binaryNumber = "";
    while (true) {
        binaryNumber += (decimalNumber % 2).toString();
        decimalNumber = Math.floor(decimalNumber/2);
        if (decimalNumber === 0) {
            formatedBinaryNumber = addSpacesToString(binaryNumber);
            correctBinaryNumber = reverseString(formatedBinaryNumber);
            result.innerHTML = `${correctBinaryNumber}<sub>(2)</sub>`
            break;
        }
    }
    console.log(correctBinaryNumber);
}