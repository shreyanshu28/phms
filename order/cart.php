<?php
if (session_start() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["Email"])) {
  header("location: /ProductionHouse/user/login.php?no=1");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./styles/style.css">
  <title>Cart</title>
</head>

<body>

  <main>

  </main>

  <?php
  require_once "./../user/utilities/_fetch-packages.php";
  include "navbar.php";
  ?>
  <main class="main-cart">
    <form action="../payment/payment.php" method="POST">
      <!-- <form action="../user/home.php" method="post"></form> -->
      <table id="myTable" class="table table-responsive-md">
        <thead>
          <tr>
            <td>Package Name</td>
            <td>Photo Count</td>
            <td>Video Count</td>
            <td>Price</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_REQUEST["cart"])) {
            // unset($_SESSION["cart"]);
            if (isset($_SESSION["cart"])) {
              $cart = explode(",", $_SESSION["cart"]);

              if ($_REQUEST["cart"] != $cart[sizeof($cart) - 1]) {
                $_SESSION["cart"] = isset($_SESSION["cart"]) ? $_SESSION["cart"] . "," . $_REQUEST["cart"] : $_REQUEST["cart"];
              }

              $cart = explode(",", $_SESSION["cart"]);

              $_SESSION["amtTotal"] = 0;
              foreach ($cart as $item) {
                foreach ($packages as $package) {
                  echo "<tr>";
                  if ($item == $package->pid) {
                    echo "
                      <td>$package->packageName</td>
                      <td>$package->photoCount</td>
                      <td>$package->videoCount</td>
                      <td>$package->price</td>
                ";
                    $_SESSION["amtTotal"] += $package->price;
                    echo "
                    <td>
                      <a class='button is-danger' href='./deletePackage.php?id=$package->pid' id='btn'>Remove</a>
                    </td>";
                  }
                  echo "</tr>";
                }
              }
            } else {
              $_SESSION["cart"] = isset($_REQUEST["cart"]) ? $_REQUEST["cart"] : null;
              header("location: cart.php?cart=${_REQUEST['cart']}");
            }
          }
          ?>
        </tbody>
      </table>

      <div class='field'>
        <div class='control'>
          <input type='submit' class='button is-info m-2 is-medium' name='btnSubmit' value='Next' />
        </div>
      </div>
    </form>
  </main>
  <script src=" //cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#myTable").DataTable();
    });
  </script>
</body>

</html>