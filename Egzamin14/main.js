function showSecondBlock() {
    document.getElementById("first-block").style.display = "none";
    document.getElementById("second-block").style.marginLeft = "25%";
    document.getElementById("second-block").style.display = "block";
    document.getElementById("third-block").style.display = "none";

}

function showThirdBlock() {
    document.getElementById("first-block").style.display = "none";
    document.getElementById("second-block").style.display = "none";
    document.getElementById("third-block").style.marginLeft = "50%";
    document.getElementById("third-block").style.display = "block";
}

function approve() {
    const name = document.getElementById("name").value;
    const lastname = document.getElementById("lastname").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;

    if (password == confirmPassword) {
        console.log(`Witaj ${name} ${lastname}`)
    } else {
        alert("Podane hasła różnią się")
    }
}