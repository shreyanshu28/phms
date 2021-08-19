const imageBox = document.getElementById("placeholder");
const imageSrc = [
  "./images/camera-32871_640.png",
  "./images/camera-1867184_1280.jpg",
  "./images/smartphone-1894723_640.jpg",
];
let count = 0;

function createImage() {
  let figure = document.createElement("figure");
  let image = document.createElement("img");
  let figcaption = document.createElement("figcaption");
  let caption = document.createTextNode("This is a caption");

  figure.classList.add("column");
  figure.classList.add("is-one-fifth-desktop");
  figure.classList.add("is-one-third-tablet");
  figure.classList.add("is-full-mobile");
  figure.classList.add("m-5");

  //image.classList.add("image is-square");
  image.src = imageSrc[count];
  figcaption.appendChild(caption);
  figure.appendChild(image);
  figure.appendChild(figcaption);
  imageBox.appendChild(figure);
  count++;
}

for (i = 0; i < 3; i++) {
  createImage();
}
