changeImage = (url) => {
    const mainImage = document.getElementById("main-image");
    mainImage.src = url;
    mainImage.alt = url;
}

replaceImage = () => {
    const currentImage = document.getElementById("icon");

    if (currentImage.src.includes("icon-off.png")) {
        currentImage.src = "icon-on.png";
    } else {
        currentImage.src = "icon-off.png";
    }
}