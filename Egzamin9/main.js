const firstPersonQuote = document.getElementById("osoba-1");
const secondPersonQuote = document.getElementById("osoba-2");
const thirdPersonQuote = document.getElementById("osoba-3");


function toggleQuote(person) {
    if (person == "person1") {
        firstPersonQuote.style.display = "block";
        secondPersonQuote.style.display = "none";
        thirdPersonQuote.style.display = "none";
    }

    if (person == "person2") {
        firstPersonQuote.style.display = "none";
        secondPersonQuote.style.display = "block";
        thirdPersonQuote.style.display = "none";
    }

    if (person == "person3") {
        firstPersonQuote.style.display = "none";
        secondPersonQuote.style.display = "none";
        thirdPersonQuote.style.display = "block";
    }
}

document.getElementById("first-person").addEventListener("click", function() {
    toggleQuote("person1")
})

document.getElementById("second-person").addEventListener("click", function() {
    toggleQuote("person2")
})

document.getElementById("third-person").addEventListener("click", function() {
    toggleQuote("person3")
})
