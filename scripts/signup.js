//firstname, lastname, email, username, password
const firstName = document.getElementById("firstname");
const middleName = document.getElementById("middlename");
const lastName = document.getElementById("lastname");
const contactNo = document.getElementById("contactNo");
const email = document.getElementById("email");
const userName = document.getElementById("username");
const password = document.getElementById("password");
const confirmPassowrd = document.getElementById("confirm-password");

let count = 0;
firstName.addEventListener("focus", function (event) {
  if (count >= 0 && count < 12) {
    setProgressBar(12);
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

email.addEventListener("focus", function (event) {
  if (count >= 48 && count < 60) {
    setProgressBar(60);
  }
});

userName.addEventListener("focus", function (event) {
  if (count >= 60 && count < 72) {
    setProgressBar(72);
  }
});

password.addEventListener("focus", function (event) {
  if (count >= 72 && count < 84) {
    setProgressBar(84);
  }
});

confirmPassowrd.addEventListener("focus", function (event) {
  if (count >= 84 && count < 100) {
    setProgressBar(100);
  }
});

function setProgressBar(size) {
  document.getElementById("registration-progress").value = size;
  count = size;
}
