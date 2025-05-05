generateColors = () => {
    const h = document.getElementById("h").value;
    const topTh = document.getElementById("top-th");
    const bottomLeft = document.getElementById("bottom-left-th");
    const bottomMiddle1 = document.getElementById("bottom-middle-1-th");
    const bottomMiddle2 = document.getElementById("bottom-middle-2-th");
    const bottomRight = document.getElementById("bottom-right-th");
    const l = 50;
    topTh.style.backgroundColor = `hsl(${h}, 100%, ${l}%)`;
    bottomLeft.style.backgroundColor = `hsl(${h}, 80%, ${l}%)`;
    bottomMiddle1.style.backgroundColor = `hsl(${h}, 60%, ${l}%)`;
    bottomMiddle2.style.backgroundColor = `hsl(${h}, 40%, ${l}%)`;
    bottomRight.style.backgroundColor = `hsl(${h}, 20%, ${l}%)`;
}