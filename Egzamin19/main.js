approve = () => {
    const img = document.getElementById("pszczola");
    const blur = document.getElementById("blur").checked;
    const sepia = document.getElementById("sepia").checked;
    const negatyw = document.getElementById("negatyw").checked;

    let filterStyle = "";
    if (blur) {
        filterStyle += "blur(5px)";
    }
    if (sepia) {
        filterStyle += "sepia(100%)";
    }
    if (negatyw) {
        filterStyle += "invert(100%)";
    }

    img.style.filter = filterStyle.trim();
}

colorfull = () => {
    const img = document.getElementById("pomarancza");
    img.style.filter = "grayscale(0%)";
}

blackAndWhite = () => {
    const img = document.getElementById("pomarancza");
    img.style.filter = "grayscale(100%)";
}

transparent = () => {
    const img = document.getElementById("owoce");
    const transparentValue = document.getElementById("transparent-effect").value;
    img.style.filter = `opacity(${transparentValue}%)`
}

brightness = () => {
    const img = document.getElementById("zolw");
    const brightnessValue = document.getElementById("brightness-effect").value;
    img.style.filter = `brightness(${brightnessValue}%)`;
}