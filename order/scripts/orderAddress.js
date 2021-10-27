const selectCity = document.getElementById("select-city");

let cnt = 0;
selectCity.addEventListener("change", function (event) {
  // to add new selectCity input if not already
  if (selectCity.value === "1" && cnt === 0) {
    city = document.createElement("input");

    city.type = "text";
    city.name = "txtCity";
    city.placeholder = "City";
    city.id = "city";
    city.value = null;

    city.classList.add("input");
    city.classList.add("is-info");
    city.classList.add("is-medium");

    // option -> select -> div.select -> div.control
    selectCity.parentElement.parentElement.appendChild(city);
    cnt = 1;
  } else {
    if (cnt !== 0) {
      console.log("ku");
      // remove when city already exists
      city.parentElement.removeChild(city);
    }
    cnt = 0;
  }
});
