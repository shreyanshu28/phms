<?php
session_start();
session_destroy();
session_start();
require_once './utilities/_check-login.php';
require_once __DIR__ . '/email/function.php';
require_once __DIR__ . '/email/smtp/PHPMailerAutoload.php';
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
  <title>Change Password</title>
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

  <form action="" method="post" class="login-main">
    <div class="field" id="userInput">
      <label class="label is-size-4">Email</label>
      <div class="control">
        <input type="text" name="txtEmail" class="input is-info is-medium" placeholder="xyz@email.com" id="username" required />
        <p class="help is-info">If Email is valid OTP will be sent to the entered email</p>
      </div>
    </div>
    <div class="field">
      <div class="field has-addons">
        <button type="submit" class="button is-medium is-info" id="otp-btn" name="otp-btn">GET OTP</button>
      </div>
    </div>
  </form>
  <?php
  // if (isset($_POST["otp-btn"])) {

  $email = "19bmiit052@gmail.com";
  $subject  = "HERE tSKE THIS";
  $html = rand(1111, 9999);

  if (!send_email($email, $html, $subject)) {
    echo "Mail not sent";
  } else {
    // header("location: ./")
  }

  // }
  ?>
</body>
<script src="./scripts/forgotPassword.js"></script>
<script src="../scripts/navbar.js"></script>

</html>