//firstname, lastname, email, username, password
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const email = document.getElementById("email");
const username = document.getElementById("username");
const password = document.getElementById("password");

let count = 0;
firstname.addEventListener("focus", function (event) {
  if (count >= 0 && count < 20) {
    setProgressBar(20);
  }
});

lastname.addEventListener("focus", function (event) {
  if (count >= 20 && count < 40) {
    setProgressBar(40);
  }
});

email.addEventListener("focus", function (event) {
  if (count >= 40 && count < 60) {
    setProgressBar(60);
  }
});

username.addEventListener("focus", function (event) {
  if (count >= 60 && count < 80) {
    setProgressBar(80);
  }
});

password.addEventListener("focus", function (event) {
  if (count >= 80 && count < 100) {
    setProgressBar(100);
  }
});

function setProgressBar(size) {
  document.getElementById("registration-progress").value = size;
  count = size;
}
