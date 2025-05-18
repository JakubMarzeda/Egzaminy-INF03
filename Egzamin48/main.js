changeBackground = (color) => {
  document.getElementById("right-container").style.backgroundColor = color;
};

changeTextColor = (color) => {
  document.getElementById("right-container").style.color = color;
};

changeFontSize = (value) => {
  document.getElementById("right-container").style.fontSize = value;
};

changeBorder = (isChecked) => {
  if (isChecked) {
    document.getElementById("picture").style.border = "1px solid white";
  } else {
    document.getElementById("picture").style.border = "none";
  }
};

changePointerType = (pointerType) => {
  document.getElementById("listjebacdisakurwezwisa").style.listStyleType =
    pointerType;
};
