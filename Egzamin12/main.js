
function clearForm() {
    document.getElementById("name").value = "";
    document.getElementById("lastname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("notification").value = "naprawa komputerow";
}

function sendForm() {
    let name = document.getElementById("name").value;
    let lastname = document.getElementById("lastname").value;
    let email = document.getElementById("email").value;
    let notification = document.getElementById("notification").value;
    let result = document.getElementById("result");

    result.innerHTML = "<p>" +  name + " " + lastname + "<br>" + email.toLowerCase() + "<br>Usługa: " + notification + "<p>";
}