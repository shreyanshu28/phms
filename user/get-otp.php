<?php
if (session_start() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_POST["btnSubmit"])) {
  if (!isset($_REQUEST["forgot"])) {
    if (!isset($_REQUEST["error"])) {
      header("location: /ProductionHouse/user/login.php?otp");
    }
  }
}

if (isset($_POST["btnSubmit"])) {

  $reg_alpha = "/[a-zA-Z]+/";
  $reg_num = "/^[6-9][0-9]{9}$/";

  if (!preg_match($reg_alpha, $_POST["txtFName"])) {
    header("location: /ProductionHouse/user/signup.php?error=fname");
  }

  if (!preg_match($reg_alpha, $_POST["txtMName"])) {
    header("location: ./signup.php?error=mname");
  }

  if (!preg_match($reg_alpha, $_POST["txtLName"])) {
    header("location: ./signup.php?error=lname");
  }

  if (!preg_match($reg_num, $_POST["txtContactNo"])) {
    header("location: ./signup.php?error=no");
  }

  $y = explode("-", $_POST["dob"]);
  if (!($y[0] <= (date("Y") - 18))) {
    header("location: ./signup.php?error=dob");
  }

  if (isset($_POST['txtAddress1'])) {
    if ($_POST['txtAddress1'] == "") {
      header("location: ./signup.php?error=address");
    }
  }

  if (isset($_POST['txtCity'])) {
    if ($_POST["txtCity"] == -1) {
      header("location: ./signup.php/error=incity");
    }
    if (!preg_match($reg_alpha, $_POST["txtCity"])) {
      header("location: ./signup.php?error=city");
    }
  } else {
    if (!preg_match($reg_alpha, $_POST["cbCity"])) {
      header("location: ./signup.php?error=city");
    }
  }

  if (!preg_match("/^[0-9]{6}$/", $_POST["txtPincode"])) {
    header("location: ./signup.php?error=pincode");
  }

  $_SESSION['fname'] = $_POST['txtFName'];
  $_SESSION['mname'] = $_POST['txtMName'];
  $_SESSION['lname'] = $_POST['txtLName'];
  $_SESSION['dob'] = $_POST['dob'];
  $_SESSION['contactno'] = $_POST['country-code'] . $_POST['txtContactNo'];
  $gender = strtoupper($_POST["rbGender"]);
  $_SESSION['gender'] = $gender == "MALE" || $gender == "FEMALE"  ? $gender[0] : "M";
  $_SESSION['address1'] = $_POST['txtAddress1'];
  $_SESSION['address2'] = isset($_POST['txtAddress2']) ? $_POST["txtAddress2"] : "";



  $_SESSION['city'] = isset($_POST["txtCity"]) ? $_POST['txtCity'] : $_POST["cbCity"];
  $_SESSION['pincode'] = $_POST['txtPincode'];
}

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
  <title>Get OTP</title>
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

  <p class="title mt-3 is-2 has-text-centered">Verify Email</p>

  <?php
  if (isset($_POST["btnSubmit"])) {
    $_SESSION["submit"] = $_POST["btnSubmit"];
  }
  ?>

  <form action="./utilities/_otp-verify.php" method="post" class="login-main">
    <div class="field" id="userInput">
      <label class="label is-size-4">Email</label>
      <div class="control">
        <input type="email" name="txtEmail" class="input is-info is-medium" placeholder="xyz@email.com" id="username" required />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "email") {
            echo "<p class='help is-danger'>No Account Exists associated with this email</p>";
          }
        } else {
          echo "<p class='help is-info'>If Email is valid OTP will be sent to the entered email</p>";
        }
        ?>

      </div>
    </div>

    <div class="field">
      <div class="field has-addons">
        <input type="submit" class="button is-medium is-info" id="verify-otp" name="get-otp" value="Verify" />
      </div>
    </div>
  </form>
</body>
<script src="./scripts/forgotPassword.js"></script>
<script src="../scripts/navbar.js"></script>

</html>