let imgId = 1;

setActiveThumbnail = () => {
  const thumbnails = document.querySelectorAll(".miniatura");
  thumbnails.forEach((thumbnail) => {
    thumbnail.classList.remove("active");
  });

  const activeThumbnail = document.querySelector(
    `.miniatura[src="${imgId}.jpg"]`
  );
  if (activeThumbnail) {
    activeThumbnail.classList.add("active");
  }
};

prevImg = () => {
  let bigImg = document.getElementById("big-img");
  imgId -= 1;
  if (imgId <= 0) {
    imgId = 5;
  }
  bigImg.src = `${imgId}.jpg`;
  setActiveThumbnail();
};

nextImg = () => {
  let bigImg = document.getElementById("big-img");
  imgId += 1;
  if (imgId >= 6) {
    imgId = 1;
  }
  bigImg.src = `${imgId}.jpg`;
  setActiveThumbnail();
};

changeImg = (imgSrc, id) => {
  const bigImg = document.getElementById("big-img");
  bigImg.src = imgSrc;
  imgId = id;
  setActiveThumbnail();
};
