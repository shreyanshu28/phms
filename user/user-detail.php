<?php
// If session already started gives
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['Username'])) {
  header("Location: ./login.php");
} else {
  // the path of _make-connection must be relative to the file for which it must be used
  // include doesn't change the path of the location
  include "../_make-connection.php";
  include "./utilities/_fetch-user.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <title>User Details</title>
</head>

<body>
  <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
    <div class="navbar-brand">
      <a href="./index.php" class="navbar-item">
        <h1 class="title is-4">Production House</h1>
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-taget="navbarMain" id="navbar-burger">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div class="navbar-menu" id="navbar-main">
      <div class="navbar-end">
        <a href="./home.php" class="navbar-item is-active">Home</a>
        <a href="./login.php" class="navbar-item button is-danger">Log Out</a>
      </div>
    </div>
  </nav>

  <p class="title is-1 has-text-centered">Confirm Details</p>

  <form action="./utilities/_add-user.php" method="post" class="signup-main">
    <div class="field">
      <div class="label is-size-4">First Name</div>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="First Name" name="txtFName" id="firstname" value=<?php echo $_SESSION['FName']; ?> />
      </div>
    </div>
    <div class="field">
      <div class="label is-size-4">Middle Name</div>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Middle Name" name="txtMName" id="middlename" value=<?php echo $_SESSION['MName']; ?> />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Last Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Last Name" name="txtLName" id="lastname" value=<?php echo $_SESSION['LName']; ?> />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Contact No</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Contact No" maxlength="10" name="txtContactNo" id="contactNo" value=<?php echo $_SESSION['ContactNo']; ?> />
      </div>
    </div>
    <div class="field">
      <div class="label is-size-4">Email</div>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Email" name="txtEmail" id="email" value=<?php echo $_SESSION['Email']; ?> />
      </div>
    </div>
    <div class="field">
      <div class="label is-size-4">Gender:</div>
      <label class="checkbox">
        <?php
        if ($_SESSION['Gender'] == "MALE") {
          echo "<input type='radio' id='Gender' name='rbGender' value='male' checked />";
        } else {
          echo "<input type='radio' id='Gender' name='rbGender' value='male' />";
        }
        ?>
        Male
      </label>
      <label class="checkbox">
        <?php
        if ($_SESSION['Gender'] == "FEMALE") {
          echo "<input type='radio' id='Gender' name='rbGender' value='female' checked />";
        } else {
          echo "<input type='radio' id='Gender' name='rbGender' value='female' />";
        }
        ?>
        Female
      </label>
    </div>
    <div class="field">
      <div class="label is-size-4">Username</div>
      <div class="control">
        <input type="text" name="txtUsername" class="input is-info is-medium" placeholder="Username" id="username" value=<?php echo $_SESSION['Username']; ?> disabled />
      </div>
    </div>
    <div class="field">
      <div class="label is-size-4">Password</div>
      <div class="control">
        <input type="password" name="txtPassword" class="input is-info is-medium" placeholder="Password" id="password" minlength="8" value="dummypassword" disabled />
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input type="submit" class="button is-info" name="btnSubmit" value="Submit" />
      </div>
    </div>
  </form>
</body>

</html>