<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['Email'])) {
  header("location: ./login.php");
} else {
  // require_once "./utilities/_fetch-user.php";
  require_once __DIR__ . "/../user/utilities/_fetch-cities.php";
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
  <title>Order Details</title>
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
              Hello, <?php
                      echo $_SESSION["FName"];
                      ?>
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

            <?php
            if ($_SESSION["Role"] == "A") {
              echo "
                                <a href='../inventory/inventory.php' class='navbar-item'>
                                    <div class='icon is-small is-left'>
                                        <i class='fa fa-edit'></i>
                                    </div>
                                    <span>
                                        Manage Inventory
                                    </span>
                                </a>";
            } else if ($_SESSION["Role"] == "C") {
              echo "
                                <a href='../order/cart.php?cart=-1' class='navbar-item'>
                                    <div class='icon is-small is-left'>
                                        <i class='fa fa-shopping-cart'></i>
                                    </div>
                                    <span>
                                        Your Cart
                                    </span>
                                </a>";
            }
            ?>
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
  </nav>

  <p class="title mt-3 is-2 has-text-centered">Order Details</p>

  <form action="./add-address.php" method="POST" class="order-address-main">
    <div class='field'>
      <div class='control'>
        <label for="date" class="label">
          Order Date
          <input type="date" name="date" type="date" min="<?php echo date("Y") . "-" . date("m") . "-" . date("d") ?>" max="<?php echo date("Y") . "-" . (date("m") + 6) . "-" . date("d") ?>" class="input is-info is-medium" />
        </label>
        <label for="time" class="label">Order Time
          <input type="time" name="time" min="<?php echo time() ?>" class="input is-info is-medium" />
        </label>
      </div>
    </div>
    <div class="field" id="field">
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
            foreach ($_SESSION['AllCities'] as $city) {
              echo "<option value=$city->city>" . $city->city . "</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <?php
      if (isset($_REQUEST["error"])) {
        if ($_REQUEST["error"] == "city") {
          echo "<p class='help is-danger'>Invalid city selected!</p>";
        }
      }
      ?>
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
    <div class='field'>
      <div class='control'>
        <input type='submit' class='button is-info m-2 is-medium' name='submit' value='Next' />
      </div>
    </div>
  </form>
</body>

<script src="./scripts/orderAddress.js"></script>
<script src="../scripts/navbar.js"></script>

</html>