const types = document.getElementById("type");
const videoCount = document.getElementById("videoCount");
const photoCount = document.getElementById("photoCount");
const price = document.getElementById("price");
const modalClick = document.getElementById("modal-click");
const closeModal = document.getElementById("close-modal");

modalClick.addEventListener("click", function () {
  document.getElementById("modal").classList.add("is-active", "is-clipped");
});

closeModal.addEventListener("click", function (event) {
  document.getElementById("modal").classList.remove("is-active", "is-clipped");
});

photoCount.addEventListener("change", function () {
  if (photoCount.value <= 0) {
    photoCount.value = 1;
  }
});

videoCount.addEventListener("change", function () {
  if (videoCount.value <= 0) {
    videoCount.value = 1;
  }
});

price.addEventListener("change", function () {
  if (price.value <= 0) {
    price.value = 1;
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
