orderCoffee = () => {
  const numberCoffee = document.getElementById("number-coffee").value;
  const weightCoffee = document.getElementById("weight-coffee").value;
  const result = document.getElementById("result");

  let amount = 0;

  if (numberCoffee == 1) {
    amount = weightCoffee * 5;
  } else if (numberCoffee == 2) {
    amount = weightCoffee * 7;
  } else if (numberCoffee == 4) {
    amount = weightCoffee * 6;
  } else {
    amount = 0;
  }

  result.innerText = `Koszt zamówienia wynosi ${amount} zł`;
};
