<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <title>Document</title>
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
                                <a href='./cart.php?cart=-1' class='navbar-item'>
                                    <div class='icon is-small is-left'>
                                        <i class='fa fa-shopping-cart'></i>
                                    </div>
                                    <span>
                                        Your Cart
                                    </span>
                                </a>";
              echo "
                                <a href='./orders.php' class='navbar-item'>
                                    <div class='icon is-small is-left'>
                                        <i class='fa fa-photo'></i>
                                    </div>
                                    <span>
                                        Your Orders
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
        <a href="/ProductionHouse/user/utilities/_log-out.php" class="navbar-item button is-danger">Logout</a>
      </div>
    </div>
  </nav>
  <script src="../scripts/navbar.js"></script>
</body>

</html>