const types = document.getElementById("type");

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
