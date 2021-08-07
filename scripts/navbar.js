const burger = document.getElementById("navbar-burger");
const menuItems = document.getElementById("navbar-main");
let burgerClicked = true;
burger.addEventListener("click", function (event) {
  if (burgerClicked) {
    menuItems.classList.add("is-active");
    burger.classList.add("is-active");
    burgerClicked = false;
  } else {
    menuItems.classList.remove("is-active");
    burger.classList.remove("is-active");
    burgerClicked = true;
  }
});
