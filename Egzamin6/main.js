const firstContainer = document.getElementById("first-container");
const secondContainer = document.getElementById("second-container");
const thirdContainer = document.getElementById("third-container");


function showFirstContainer() {
    firstContainer.style.display = 'block';
    secondContainer.style.display = 'none';
    thirdContainer.style.display = 'none';
}

function showSecondContainer() {
    firstContainer.style.display = 'none';
    secondContainer.style.display = 'block';
    thirdContainer.style.display = 'none';
}

function showThirdContainer() {
    firstContainer.style.display = 'none';
    secondContainer.style.display = 'none';
    thirdContainer.style.display = 'flex';
    thirdContainer.style.flexDirection = 'column';
    thirdContainer.style.gap = "5px";
}


function handleConfirmData() {
    const name = document.getElementById("name").value;
    const lastname = document.getElementById("lastname").value;
    const date = document.getElementById("date").value;
    const street = document.getElementById("street").value;
    const streetNumber = document.getElementById("street-number").value;
    const city = document.getElementById("city").value;
    const phoneNumber = document.getElementById("tel-input").value;
    const isChecked = document.getElementById("checkbox").checked ? "Yes" : "No";

    console.log(name, lastname, date, street, streetNumber, city, phoneNumber, isChecked);
}

let currentWidth = 4;

const formInputs = document.getElementsByClassName("form-input");

Array.from(formInputs).forEach(input => {
    input.addEventListener("blur", function() {
        const progressBar = document.getElementById("progress-bar");

        if (currentWidth > 100)  {
            currentWidth = 100;
        }

        currentWidth += 12
        console.log(currentWidth);
        progressBar.style.width = currentWidth + "%";

    })
})