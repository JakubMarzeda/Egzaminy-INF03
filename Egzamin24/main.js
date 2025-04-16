sendMessage = () => {
  const messageValue = document.getElementById("input-message").value;
  const chatContainer = document.getElementById("chat-container");

  if (messageValue) {
    const jolantaContainer = document.createElement("section");
    jolantaContainer.classList.add("jolanta-container");
    const img = document.createElement("img");
    const p = document.createElement("p");
    img.src = "./Jolka.jpg";
    p.innerText = messageValue;
    jolantaContainer.appendChild(img);
    jolantaContainer.appendChild(p);
    chatContainer.appendChild(jolantaContainer);
  }
};

randomMessage = (messages) => {
  return messages[Math.floor(Math.random() * messages.length)];
};

generateRandomMessage = () => {
  const chatContainer = document.getElementById("chat-container");
  const messages = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety",
  ];

  const krzysiekContainer = document.createElement("section");
  krzysiekContainer.classList.add("krzysiek-container");
  const img = document.createElement("img");
  const p = document.createElement("p");
  img.src = "./Krzysiek.jpg";
  p.innerText = randomMessage(messages);
  krzysiekContainer.appendChild(img);
  krzysiekContainer.appendChild(p);
  chatContainer.appendChild(krzysiekContainer);
};
