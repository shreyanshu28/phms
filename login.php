<?php
  session_start();
  if(isset($_SESSION['userKey'])) {
    header("location:./home.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="./styles/style.css" />
    <title>Log In</title>
  </head>
  <body>
    <nav class="navbar" role="navigration" aria-label="main navigation">
      <div class="navbar-brand">
        <a href="./index.php" class="navbar-item">
          <h1 class="title is-4">Apricus Productions</h1>
        </a>

        <a
          role="button"
          class="navbar-burger"
          aria-label="menu"
          aria-expanded="false"
          data-taget="navbarMain"
          id="navbar-burger"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu has-shadow is-grey" id="navbar-main">
        <div class="navbar-end">
          <a href="./index.php" class="navbar-item pr">Home</a>
          <a href="./about-us.php" class="navbar-item">About Us</a>
          <a href="./contact-us.php" class="navbar-item">Contact Us</a>
          <a href="./login.php" class="navbar-item button mr-2 is-light"
            >Login</a
          >
          <a href="./signup.php" class="navbar-item button is-info">Sign Up</a>
        </div>
      </div>
    </nav>
    <div class="header">
      <p class="has-text-centered title is-1">Log In</p>
    </div>

    <form action="./check-login.php" method="post">
      <div class="login-main container mt-0">
        <div class="row" id="userInput">
          <div class="title">Username</div>
          <input
            type="text"
            name="txtUsername"
            class="subtitle input is-primary"
            placeholder="Username"
            id="username"
            required
          />
        </div>
        <div class="row">
          <div class="input-icon title">Password</div>
          <input
            type="password"
            name="txtPassword"
            class="subtitle input is-primary"
            placeholder="password"
            id="password"
            minlength="8"
            required
          />
        </div>
        <div class="row">
          <progress
            class="progress is-primary"
            value="0"
            max="100"
            id="login-progress"
          >
            15%
          </progress>
          <input
            class="button is-primary is-outlined"
            type="submit"
            value="Log In"
          />
        </div>
      </div>
    </form>
  </body>
  <script src="./scripts/login.js"></script>
  <script src="./scripts/navbar.js"></script>
</html>