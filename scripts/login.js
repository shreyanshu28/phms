const password = document.getElementById("password");
const usernameClass = document.getElementById("username");

let messageCreated = false;

usernameClass.addEventListener("keypress", function (event) {
  setProgressBar(50);
});

password.addEventListener("focus", function (event) {
  let username = document.getElementById("username").value;

  //display error message is username is empty
  if (username === "") {
    usernameClass.classList.remove("is-primary");
    usernameClass.classList.add("is-danger");
    console.log("Error");

    if (!messageCreated) {
      messageCreated = createUsernameEmptyMessage(); //if created, returns true
    }
  } else {
    if (messageCreated) {
      messageCreated = removeUsernameEmptyMessage(); //when removed, returns false
    }
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

  return true;
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
  return false;
}
