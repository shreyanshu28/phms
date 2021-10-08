<?php
if (session_start() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["Email"])) {
  header("location: /ProductionHouse/user/login.php?no=TRUE");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <link rel="stylesheet" href="./styles/style.css">
  <title>Cart</title>
</head>

<body>
  <nav class="navbar is-spaced" role="navigration" aria-label="main navigation">
    <div class="navbar-brand">
      <a href="../user/home.php" class="navbar-item">
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
        <a href="../user/home.php" class="navbar-item is-active">Home</a>
        <hr class="navbar-divider">
        <?php
        if (isset($_SESSION["Email"]) && $_SESSION["Role"] == "C") {
          echo "
                <div class='navbar-item has-dropdown is-hoverable mr-2'>
                    <a class='navbar-link'>
                        <div class='icon is-small is-left'>
                            <i class='fa fa-user'></i>
                        </div>
                        <span>
                            Hello, ${_SESSION['FName']}
                        </span>
                    </a>
                    <div class='navbar-dropdown'>
                        <a href='../user/user-detail.php' class='navbar-item'>
                            <div class='icon is-small is-left'>
                                <i class='fa fa-edit'></i>
                            </div>
                            <span>
                                Edit Profile
                            </span>
                        </a>
                        <a href='#' class='navbar-item'>
                            <div class='icon is-small is-left'>
                                <i class='fa fa-lock'></i>
                            </div>
                            <span>
                                Privacy & Security
                            </span>
                        </a>
                        <a href='#' class='navbar-item'>
                            <div class='icon is-small is-left'>
                                <i class='fa fa-gear'></i>
                            </div>
                            <span>
                                Settings
                            </span>
                        </a>
                    </div>
                </div>
                <a href='/ProductionHouse/user/utilities/_log-out.php' class='navbar-item button is-danger'>Logout</a>";
        } else {
          echo "
                <a href='/ProductionHouse/user/login.php' class='navbar-item button is-light mr-2'>Login</a>
                <a href='/ProductionHouse/user/signup.php' class='navbar-item button is-info'>Sign Up</a>";
        }
        ?>
      </div>
    </div>
  </nav>
  <main class="main-cart">
    <?php
    if (isset($_REQUEST["cart"])) {
      $_SESSION["cart"] = isset($_SESSION["cart"]) ? $_SESSION["cart"] . "," . $_REQUEST["cart"] : $_REQUEST["cart"];
      $cart = explode(",", $_SESSION["cart"]);
      foreach ($cart as $item) {
        if ($item == "A") {
          echo "A";
        }
        if ($item == "B") {
          echo "B";
        }
        if ($item == "C") {
          echo "C";
        }
      }
    } else {
      echo "<h1 class='title is-1'>No Orders</h1>";
    }
    ?>
  </main>
</body>

</html>