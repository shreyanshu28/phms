<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./styles/style.css" />
  <title>Signup Form</title>
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
        <a href="./../index.php" class="navbar-item">Home</a>
        <a href="./login.php" class="navbar-item button is-light mr-2">Login</a>
        <a href="./signup.php" class="navbar-item button is-info">Sign Up</a>
      </div>
    </div>
    </div>
  </nav>

  <p class="title mt-3 is-2 has-text-centered">Sign Up</p>

  <form action="./get-otp.php" method="post" class="signup-main">
    <div class="field registration-progress">
      <progress class="progress is-info" value="0" max="100" id="registration-progress">
        15%
      </progress>
    </div>
    <div class="field">
      <label class="label is-size-4">First Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="First Name" name="txtFName" id="firstname" required />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "fname") {
            echo "<p class='help is-danger'>No number allowed</p>";
          }
        }
        ?>
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Middle Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Middle Name" name="txtMName" id="middlename" />
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
        <input type="text" class="input is-info is-medium" placeholder="Last Name" name="txtLName" id="lastname" required />
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
        <input type="date" name="dob" id="dob" class="input is-info is-medium" />
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
              <option value="91" selected>+91</option>
            </select>
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-globe"></i>
          </div>
        </div>
        <input type="tel" class="input is-info is-medium" placeholder="Contact No" minlength="10" maxlength="10" name="txtContactNo" id="contactNo" required />
      </div>
      <?php
      if (isset($_REQUEST["error"])) {
        if ($_REQUEST["error"] == "no") {
          echo "<p class='help is-danger'>No number allowed</p>";
        }
      }
      ?>
    </div>
    <div class="field">
      <label class="label is-size-4">Gender:</label>
      <label class="checkbox">
        <input type="radio" id="Gender" name="rbGender" value="Male" checked />
        Male
      </label>
      <label class="checkbox">
        <input type="radio" id="Gender" name="rbGender" value="Female" />
        Female
      </label>
    </div>
    <div class="field">
      <label class="label is-size-4">Address</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Flat, House no, Building, Company, Apartment" name="txtAddress1" id="flat" />
        <?php
        if (isset($_REQUEST["error"])) {
          if ($_REQUEST["error"] == "address") {
            echo "<p class='help is-danger'>Address 1 cannot be Empty</p>";
          }
        }
        ?>
      </div>
      <div class="control mt-2">
        <input type="text" class="input is-info is-medium" placeholder="Area, Street, Sector, Village" name="txtAddress2" id="area" />
      </div>
      <div class="control mt-2 field has-addons">
        <div class="select is-medium is-info">
          <select name="cbCity" id="select-city">
            <option value="-1">City</option>
            <option value="1">Add New</option>
            <?php
            require_once "../_make-connection.php";
            require_once "./utilities/_fetch-cities.php";
            foreach ($_SESSION['AllCities'] as $city) {
              echo "<option value=$city->city>" . $city->city . "</option>";
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
        <input type="number" maxlength="6" minlength="6" class="input is-info is-medium" name="txtPincode" id="pincode" placeholder="Pincode" />
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
      <div class="control">
        <input type="submit" class="button is-info" name="btnSubmit" value="Next" />
      </div>
    </div>
  </form>
</body>
<script src="./scripts/signup.js"></script>
<script src="../scripts/navbar.js"></script>

</html>