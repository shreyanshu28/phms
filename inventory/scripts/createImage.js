const imageBox = document.getElementById("inventory");
const inventory = {
  Camera: "./images/camera-32871_640.png",
  Video: "./images/camera-1867184_1280.jpg",
  Mobile: "./images/smartphone-1894723_640.jpg",
};
const aClassList = [
  "column",
  "is-one-fifth-desktop",
  "is-one-third-tablet",
  "is-full-mobile",
  "m-5",
  "inventory",
  "has-text-centered",
];

//tblProps : add image path
//Make associative array of propname=>image and then display
function createImage(key) {
  let a = document.createElement("a");
  let figure = document.createElement("figure");
  let image = document.createElement("img");
  let figcaption = document.createElement("figcaption");
  let caption = document.createTextNode(key);

  a.setAttribute("href", "../index.php");
  a.classList.add(...aClassList);

  image.src = inventory[key];
  figcaption.appendChild(caption);
  figure.appendChild(image);
  figure.appendChild(figcaption);
  a.appendChild(figure);
  imageBox.appendChild(a);
}

for (key in inventory) {
  createImage(key);
}
