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
  require_once "../_make-connection.php";
  require_once "./utilities/_fetch-user.php";
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
  <link rel="stylesheet" href="./styles/style.css">
  <title>User Details</title>
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
        <div class="navbar-item has-dropdown is-hoverable mr-2">
          <a class="navbar-link">
            <div class="icon is-small is-left">
              <i class="fa fa-user"></i>
            </div>
            <span>
              Hello, <?php echo $_SESSION['Username']; ?>
            </span>
          </a>
          <div class="navbar-dropdown">
            <a href="./user-detail.php" class="navbar-item">
              <div class="icon is-small is-left">
                <i class="fa fa-edit"></i>
              </div>
              <span>
                Edit Profile
              </span>
            </a>
            <a href="#" class="navbar-item">
              <div class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </div>
              <span>
                Privacy & Security
              </span>
            </a>
            <a href="#" class="navbar-item">
              <div class="icon is-small is-left">
                <i class="fa fa-gear"></i>
              </div>
              <span>
                Settings
              </span>
            </a>
          </div>
          <a href="./utilities/_log-out.php" class="navbar-item button is-danger">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <p class="title mt-3 is-2 has-text-centered">Edit Profile</p>

  <form action="./utilities/_add-user.php" method="post" class="signup-main">
    <div class="field">
      <div class="label is-size-4">First Name</div>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="First Name" name="txtFName" id="firstname" value=<?php echo $_SESSION['FName']; ?> required />
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
        <input type="text" class="input is-info is-medium" placeholder="Last Name" name="txtLName" id="lastname" value=<?php echo $_SESSION['LName']; ?> required />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Data of Birth</label>
      <div class="control">
        <input type="date" name="dob" id="dob" class="input is-info is-medium" />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Contact No</label>
      <div class="control field has-addons">
        <div class="control has-icons-left">
          <div class="select is-medium is-info">
            <select name="country-code">
              <option value="91" selected>91+</option>
            </select>
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-globe"></i>
          </div>
        </div>
        <input type="text" class="input is-info is-medium" placeholder="Contact No" maxlength="10" name="txtContactNo" id="contactNo" required />
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
      <label class="radio">
        <?php
        if ($_SESSION['Gender'] == "M") {
          echo "<input type='radio' id='Gender' name='rbGender' value='male' checked />";
        } else {
          echo "<input type='radio' id='Gender' name='rbGender' value='male' />";
        }
        ?>
        Male
      </label>
      <label class="checkbox">
        <?php
        if ($_SESSION['Gender'] == "F") {
          echo "<input type='radio' id='Gender' name='rbGender' value='female' checked />";
        } else {
          echo "<input type='radio' id='Gender' name='rbGender' value='female' />";
        }
        ?>
        Female
      </label>
    </div>
    <div class="field">
      <label class="label is-size-4">Address</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Flat, House no, Building, Company, Apartment" name="txtAddress1" id="flat" />
      </div>
      <div class="control mt-2">
        <input type="text" class="input is-info is-medium" placeholder="Area, Street, Sector, Village" name="txtAddress2" id="area" />
      </div>
      <div class="control mt-2 field has-addons">
        <div class="select is-medium is-info">
          <select name="cbCity" id="select-city">
            <option value="-1">City</option>
            <option value="1">Add New</option>
            <option value="SURAT">SURAT</option>
          </select>
        </div>
      </div>
      <!-- <input type="hidden" class="input is-info is-medium" name="txtCity" id="hidcity" placeholder="City" /> -->
      <div class="control mt-2">
        <input type="text" class="input is-info is-medium" name="txtPincode" id="pincode" placeholder="Pincode" />
      </div>
      <div class="control mt-2">
        <input type="text" class="input is-info is-medium" name="txtLandmark" id="landmark" placeholder="Landmark" />
      </div>
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
<script src="./scripts/login.js"></script>
<script src="../scripts/navbar.js"></script>

</html>