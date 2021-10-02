//firstname, lastname, username, password
const firstName = document.getElementById("firstname");
const middleName = document.getElementById("middlename");
const lastName = document.getElementById("lastname");
const contactNo = document.getElementById("contactNo");
const pincode = document.getElementById("pincode");
const userName = document.getElementById("username");
const password = document.getElementById("password");
const selectCity = document.getElementById("select-city");

let count = 0;
firstName.addEventListener("focus", function (event) {
  if (count >= 0 && count < 12) {
    setProgressBar(12);
  }
});

nameReg = RegExp("^[a-zA-Z]+$");
firstName.addEventListener("keyup", function (event) {
  console.log(nameReg.test(firstName.value));
  if (!nameReg.test(firstName.value)) {
    firstName.classList.remove("is-info");
    firstName.classList.add("is-danger");
  } else {
    firstName.classList.remove("is-danger");
    firstName.classList.add("is-info");
  }
});

middleName.addEventListener("keyup", function (event) {
  console.log(nameReg.test(middleName.value));
  if (!nameReg.test(middleName.value)) {
    middleName.classList.remove("is-info");
    middleName.classList.add("is-danger");
  } else {
    middleName.classList.remove("is-danger");
    middleName.classList.add("is-info");
  }
});

lastName.addEventListener("keyup", function (event) {
  console.log(nameReg.test(lastName.value));
  if (!nameReg.test(lastName.value)) {
    lastName.classList.remove("is-info");
    lastName.classList.add("is-danger");
  } else {
    lastName.classList.remove("is-danger");
    lastName.classList.add("is-info");
  }
});

middleName.addEventListener("keyup", function (event) {
  console.log(nameReg.test(middleName.value));
  if (!nameReg.test(middleName.value)) {
    middleName.classList.remove("is-info");
    middleName.classList.add("is-danger");
  } else {
    middleName.classList.remove("is-danger");
    middleName.classList.add("is-info");
  }
});

firstName.addEventListener("keyup", function (event) {
  if (!(event.target.keyCode >= 48 && event.target.keyCode <= 57)) {
    firstName.value = event.target.value;
  }
});

middleName.addEventListener("focus", function (event) {
  if (count >= 12 && count < 24) {
    setProgressBar(24);
  }
});

lastName.addEventListener("focus", function (event) {
  if (count >= 24 && count < 36) {
    setProgressBar(36);
  }
});

contactNo.addEventListener("focus", function (event) {
  if (count >= 36 && count < 48) {
    setProgressBar(48);
  }
});

userName.addEventListener("focus", function (event) {
  if (count >= 60 && count < 72) {
    setProgressBar(72);
  }
});

password.addEventListener("focus", function (event) {
  if (count >= 72 && count < 84) {
    setProgressBar(100);
  }
});

function setProgressBar(size) {
  document.getElementById("registration-progress").value = size;
  count = size;
}

// If user wants to select city that isn't in database
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
      // remove when city already exists
      city.parentElement.removeChild(city);
    }
    cnt = 0;
  }
});
