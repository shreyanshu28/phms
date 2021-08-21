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
      <a href="./index.php" class="navbar-item">
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
        <a href="./../index.php" class="navbar-item is-active">Home</a>
        <a href="./login.php" class="navbar-item button mr-2 is-light">Login</a>
        <a href="./signup.php" class="navbar-item button is-info">Sign Up</a>
      </div>
    </div>
  </nav>

  <p class="title is-1 has-text-centered">Sign Up</p>

  <form action="./signup-data.php" method="post" class="signup-main">
    <div class="field registration-progress">
      <progress class="progress is-info" value="0" max="100" id="registration-progress">
        15%
      </progress>
    </div>
    <div class="field">
      <label class="label is-size-4">First Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="First Name" name="txtFName" id="firstname" required />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Middle Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Middle Name" name="txtMName" id="middlename" />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Last Name</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Last Name" name="txtLName" id="lastname" required />
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
              <option selected>91+</option>
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
      <label class="label is-size-4">Email</label>
      <div class="control">
        <input type="text" class="input is-info is-medium" placeholder="Email" name="txtEmail" id="email" required />
      </div>
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
      <label class="label is-size-4">Username</label>
      <div class="control">
        <input type="text" name="txtUsername" class="input is-info is-medium" placeholder="Username" id="username" required />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Password</label>
      <div class="control">
        <input type="password" name="txtPassword" class="input is-info is-medium" placeholder="Password" id="password" minlength="8" required />
      </div>
    </div>
    <div class="field">
      <label class="label is-size-4">Confirm Password</label>
      <div class="control">
        <input type="password" name="txtConfirmPassword" class="input is-info is-medium" placeholder="Confirm Password" id="confirm-password" minlength="8" required />
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input type="submit" class="button is-info" name="btnSubmit" value="sign up" />
      </div>
    </div>
  </form>
</body>
<script src="./scripts/signup.js"></script>
<script src="../scripts/navbar.js"></script>

</html>