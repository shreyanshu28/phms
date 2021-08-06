const password = document.getElementById("password");
const usernameClass = document.getElementById("username");

usernameClass.addEventListener("focus", function (event) {
  setProgressBar(50);
});

password.addEventListener("focus", function (event) {
  let count = 0;
  const username = document.getElementById("username").value;

  //display error message
  if (username === "") {
    usernameClass.classList.remove("is-primary");
    usernameClass.classList.add("is-danger");
    console.log("Error");

    if (!count) {
      createUsernameEmptyMessage();
      count++;
    }
  } else {
    removeUsernameEmptyMessage();
    count = 0;
  }
});

function createUsernameEmptyMessage() {
  const usernameError = document.getElementById("userInput");
  const emptyUsername = document.createElement("p");
  emptyUsername.id = "empty-username";
  emptyUsername.classList.add("notifictation", "is-danger");
  const emptyUsernameMessage = document.createTextNode(
    "Username cannot be empty"
  );
  emptyUsername.appendChild(emptyUsernameMessage);
  usernameError.appendChild(emptyUsername);
  setProgressBar(0);
}

function removeUsernameEmptyMessage() {
  setProgressBar(100);
  const usernameError = document.getElementById("empty-username");
  usernameClass.classList.remove("is-danger");
  usernameClass.classList.add("is-primary");
  usernameError.remove();
}
function setProgressBar(size) {
  document.getElementById("login-progress").value = size;
}
