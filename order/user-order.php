<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  
  if (!isset($_SESSION["Email"])) {
    header("location: ./login.php?no=TRUE");
  } else {
    require_once "./utilities/_fetch-user.php";
    
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>View Order</title>
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
              echo "
                <a href='../order/order.php' class='navbar-item'>
                  <div class='icon is-small is-left'>
                    <i class='fas fa-shopping-bag'></i>
                  </div>
                  <span>
                    Manage Orders
                  </span>
                </a>
              ";
            } else if ($_SESSION["Role"] == "C") {
              echo "
                  <a href='../order/cart.php?cart=-1' class='navbar-item'>
                      <div class='icon is-small is-left'>
                          <i class='fa fa-shopping-cart'></i>
                      </div>
                      <span>
                          Your Cart
                      </span>
                  </a>
                  <a href='../order/user-order.php' class='navbar-item'>
                  <div class='icon is-small is-left'>
                    <i class='fas fa-shopping-bag'></i>
                  </div>
                  <span>
                    View Orders
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
        <a href="../user/utilities/_check-login.php" class="navbar-item button is-danger">Logout</a>
      </div>
    </div>
  </nav>
  </body>
  </html>