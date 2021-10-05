const types = document.getElementById("type");
const qtyListener = document.getElementById("qty");
const priceListener = document.getElementById("price");

priceListener.addEventListener("change", function () {
  if (priceListener.value < 0) {
    priceListener.value = 0;
  }
});

qtyListener.addEventListener("change", function () {
  if (qtyListener.value < 1) {
    qtyListener.value = 1;
  }
});

// If user wants to select type that isn't in database
let cnt = 0;
types.addEventListener("change", function (event) {
  // to add new types input if not already
  if (types.value === "1" && cnt === 0) {
    type = document.createElement("input");

    type.type = "text";
    type.name = "txtType";
    type.placeholder = "Type";
    type.id = "new-type";
    type.value = null;

    type.classList.add("input");
    type.classList.add("is-info");

    // option -> select -> div.select -> div.control
    types.parentElement.parentElement.appendChild(type);
    cnt = 1;
  } else {
    if (cnt !== 0) {
      // remove when type already exists
      type.parentElement.removeChild(type);
    }
    cnt = 0;
  }
});
