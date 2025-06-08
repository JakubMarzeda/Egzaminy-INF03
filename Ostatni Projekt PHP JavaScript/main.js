clickedButton = () => {
    alert("Button clicked!");
}

doubleClickedButton = () => {
    alert("Button double-clicked!");
}

mouseOverButton = () => {
    alert("Mouse over button!");
}

mouseOutButton = () => {
    alert("Mouse out of button!");
}

mouseMoveButton = () => {
    alert("Mouse moved over button!");
}

mouseDownButton = () => {
    alert("Mouse button pressed down on button!");
}

mouseUpButton = () => {
    alert("Mouse button released over button!");
}

focusInput = () => {
    alert("Input field focused!");
}

blurInput = () => {
    alert("Input field lost focus!");
}

changeInput = () => {
    alert("Input field value changed!");
}

changeSelect = () => {
    alert("Select field value changed!");
}

keyDownInput = () => {
    alert("Key pressed down in input field!");
}

keyUpInput = () => {
    alert("Key released in input field!");
}

submitButton = (event) => {
    event.preventDefault();
    alert("Form submitted!");
}

resetButton = () => {
    alert("Form reset!");
}