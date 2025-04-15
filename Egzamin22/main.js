reset = () => {
  document.getElementById("name").value = "";
  document.getElementById("lastname").value = "";
  document.getElementById("email").value = "";
  document.getElementById("textarea").value = "";
};

send = () => {
  const result = document.getElementById("result");
  const agreement = document.getElementById("agreement").checked;
  const name = document.getElementById("name").value;
  const lastname = document.getElementById("lastname").value;
  const textarea = document.getElementById("textarea").value;

  if (agreement) {
    result.style.color = "navy";
    result.innerHTML = `${name.toUpperCase()} ${lastname.toUpperCase()} <br> Treść twojej sprawy: ${textarea}`;
  } else {
    result.style.color = "red";
    result.innerText = "Musisz zapoznać się z regulaminem";
  }
};
