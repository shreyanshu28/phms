<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$_SESSION["amtTotal"] = 0;

if (!isset($_SESSION["Email"])) {
  header("location: /ProductionHouse/user/login.php?no=1");
}

require_once "./utilities/fetch-cart.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />

  <link rel="stylesheet" href="./styles/style.css">
  <title>Cart</title>
</head>

<body>
  <?php
  require_once "./../user/utilities/_fetch-packages.php";
  include "navbar.php";
  ?>
  <main class="main-cart">
    <form action="./order-address.php" method="POST">
      <table id="myTable" class="table table-responsive-md">
        <thead>
          <tr>
            <td>Package Name</td>
            <td>Photo Count</td>
            <td>Video Count</td>
            <td>Price</td>
            <td>Type</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($carts)) {
            $_SESSION["pid"] = array();
            foreach ($carts as $cart) {
              if (!$cart->status) {
                continue;
              }
              echo "<tr>
                      <td>$cart->packageName</td>
                      <td>$cart->photoCount</td>
                      <td>$cart->videoCount</td>
                      <td>$cart->price</td>
                      <td>$cart->type</td>
                      <td>$cart->description</td>
                      <td><input type='text' id='cartQty' name='cart-qty' value='$cart->qty' class='input is-small' readonly></td>
                      <td><a class='button is-danger m-2 is-small' href='./utilities/remove-cart.php?cart=$cart->cartid'>Remove</a></td>
                    </tr>";
              $_SESSION["cid"] = $cart->cid;
              $_SESSION["amtTotal"] += $cart->qty * $cart->price;
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
  <script src=" //cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      const qtys = document.querySelectorAll("#cartQty");
      const ids = document.querySelectorAll("#cartId");
      $("#myTable").DataTable();
    });
  </script>
</body>

</html>