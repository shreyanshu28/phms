<?php
session_start();
session_destroy();
session_start();
require_once './utilities/_check-login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./styles/style.css" />
  <title>Log in</title>
</head>

<body>
  <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
    <div class="navbar-brand">
      <a href="../index.php" class="navbar-item">
        <h1 class="title is-4">Apricus Productions</h1>
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-taget="navbarMain" id="navbar-burger">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div class="navbar-menu" id="navbar-main">
      <div class="navbar-end">
        <a href="../index.php" class="navbar-item">Home</a>
        <a href="./login.php" class="navbar-item button is-light is-active mr-2">Login</a>
        <a href="./signup.php" class="navbar-item button is-info">Sign Up</a>
      </div>
    </div>
  </nav>

  <p class="title mt-3 is-2 has-text-centered">Log In</p>

  <form action="./utilities/_check-login.php" method="post" class="login-main">
    <div class="field" id="userInput">
      <label class="label is-size-4">Email</label>
      <div class="control">
        <input type="text" name="txtEmail" class="input is-info is-medium" placeholder="xyz@email.com" id="username" required />
      </div>
    </div>
    <div class="field">
      <div class="label is-size-4">Password</div>
      <input type="password" name="txtPassword" class="input is-info is-medium" placeholder="password" id="password" minlength="8" required />
    </div>
    <div class="row">
      <div class="row-column">
        <label class="label checkbox is-size-6">
          <input type="checkbox" name="RememberMe" class="is-info" id="remember-me" />
          Remember Me
        </label>
      </div>
      <div class="row-column">
        <a href="./get-otp.php?forgot=1" class="">
          Forgot Password?
        </a>
      </div>
    </div>
    <div class="field">
      <progress class="progress is-info" value="0" max="100" id="login-progress">
        15%
      </progress>
      <input class="button is-info is-outlined" type="submit" name="submit" value="Log In" />
    </div>
  </form>
</body>
<script src="./scripts/login.js"></script>
<script src="../scripts/navbar.js"></script>

</html>
<?php
echo (date('Y') - 18) . "-" . date('m') . "-" . date('d') . "<br>";
?>