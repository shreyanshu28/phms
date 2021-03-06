<?php
// If session already started gives
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['Email'])) {
  header("location: ./login.php");
} else {
  require_once "./utilities/_fetch-user.php";
  require_once "./utilities/_fetch-cities.php";
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
  <!-- <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
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
              Hello, <?php echo $_SESSION['FName']; ?>
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
        </div>
        <a href="./utilities/_log-out.php" class="navbar-item button is-danger">Logout</a>
      </div>
    </div>
  </nav> -->
  <?php
  include './user-nav.php';
  ?>

  <h1 class="title mt-3 is-2 has-text-centered">Edit Profile</h1>

  <div id="demo"></div>
  <form action="./utilities/_update-user.php" method="post" class="signup-main">
    <div class="field registration-progress">
      <progress class="progress is-info" value="0" max="100" id="registration-progress">
        15%
      </progress>
    </div>
    <div class="field">
      <div class="label is-size-4">First Name</div>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="First Name" name="txtFName" id="firstname" value="<?php echo $_SESSION['FName']; ?>" required />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "fname") {
            echo "<p class='help is-danger'>No number allowed</p>";
          }
        }
        ?>
      </div>
    </div>
    <div class=" field">
      <div class="label is-size-4">Middle Name</div>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Middle Name" name="txtMName" id="middlename" value="<?php echo $_SESSION['MName']; ?>" />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "mname") {
            echo "<p class='help is-danger'>No number allowed</p>";
          }
        }
        ?>
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Last Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Last Name" name="txtLName" id="lastname" value="<?php echo $_SESSION['LName']; ?>" required />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "lname") {
            echo "<p class='help is-danger'>No number allowed</p>";
          }
        }
        ?>
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Data of Birth</label>
      <div class="control">
        <input type="date" name="dob" id="dob" class="input is-info is-medium" value="<?php echo $_SESSION['DOB']; ?>" disabled />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "dob") {
            echo "<p class='help is-danger'>Age below 18 not Allowed</p>";
          }
        } else {
          echo "<p class='help is-info'>Age below 18 not Allowed</p>";
        }
        ?>
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
        <input type="tel" class="input is-info is-medium" placeholder="Contact No" maxlength="10" name="txtContactNo" id="contactNo" value="<?php echo substr($_SESSION['ContactNo'], 2); ?>" required />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "no") {
            echo "<p class='help is-danger'>No number allowed</p>";
          }
        }
        ?>
      </div>
    </div>
    <div class=" field">
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
        <input type="text" class="input is-info is-medium" placeholder="Flat, House no, Building, Company, Apartment" name="txtAddress1" id="flat" value="<?php echo $_SESSION['Address1']; ?>" />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "address") {
            echo "<p class='help is-danger'>Address 1 cannot be Empty</p>";
          }
        }
        ?>
      </div>
      <div class=" control mt-2">
        <input type="text" class="input is-info is-medium" placeholder="Area, Street, Sector, Village" name="txtAddress2" id="area" value="<?php echo $_SESSION['Address2']; ?>" />
      </div>
      <div class=" control mt-2 field has-addons">
        <div class="select is-medium is-info">
          <select name="cbCity" id="select-city">
            <option value="-1">City</option>
            <option value="1">Add New</option>
            <?php
            foreach ($_SESSION['AllCities'] as $city) {
              if ($_SESSION['City'] == $city->city) {
                echo "<option value=$city->city selected>" . $city->city . "</option>";
              } else {
                echo "<option value=$city->city>" . $city->city . "</option>";
              }
            }
            ?>
          </select>
        </div>
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "city") {
            echo "<p class='help is-danger'>Invalid city selected!</p>";
          }
        }
        ?>
      </div>
      <div class="control mt-2">
        <input type="tel" class="input is-info is-medium" name="txtPincode" id="pincode" placeholder="Pincode" value="<?php echo $_SESSION['Pincode']; ?>" />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "pincode") {
            echo "<p class='help is-danger'>Enter valid Pincode</p>";
          }
        }
        ?>
      </div>
    </div>
    <div class="field">
      <div class="label is-size-4">Password</div>
      <div class="control">
        <a href="./get-otp.php?change=1" class="title">Change Password</a>
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input type="submit" class="button is-info" name="updateUser" value="Submit" />
      </div>
    </div>
  </form>
</body>
<!-- <script src="./scripts/fetchUser.js" type="module"></script> -->
<script src="./scripts/signup.js"></script>
<script src="../scripts/navbar.js"></script>

</html>