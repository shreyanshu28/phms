<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./styles/style.css">
  <title>Orders Dashboard</title>
</head>

<body>
  <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if ($_SESSION["Role"] != 'C') {
    header("location: ../index.php");
  }

  require_once "../photos/photoModel.php";
  require_once './orderModel.php';
  require_once './user-nav.php';
  ?>
  <div class="title is-1" id="title">Your Orders</div>
  <main class="image-gallery">
    <?php
    // $zip = new ZipArchive;

    $o = new Order();
    $p = new Photos();
    $orders = $o->selectCustomerOrder($_SESSION["Email"]);
    foreach ($orders as $order) {

      // if ($zip->open("./order" . $order->oid . ".zip", ZipArchive::CREATE) === TRUE) {
      //   $paths = $p->selectPhotos($order->oid);
      //   foreach ($paths as $path) {
      //     $name = explode("/", $path->path);
      //     $realName = $name[count($name) - 1];
      //     $file = fopen(__DIR__ . "/../photos/uploads/" . $realName, "r");
      //   }

      //   echo $zip->close() ? "done" : "not";
      // }
      // echo "<script>alert('hrer')</script>";
      // echo "<div class='card' id='card'>";
      echo "
          <section class='hero'>
            <div class='hero-body'>
              <div class='container'>
                <h1 class='title'>Order $order->oid <a href='./zip.php?zip=$order->oid' class='button'>Download Zip</a></h1>
                <h2 class='subtitle'>Order Date&Time:<br />$order->date & $order->time</h2>
              </div>
              <div class='image-gallery'>";
      $paths = $p->selectPhotos($order->oid);
      foreach ($paths as $path) {
        echo "  <a href='$path->path'>
                  <img src = '$path->path' class='image' />
                </a>";
      }
      echo "
              </div>
            </div>
          </section>";
    }


    ?>
  </main>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#myTable").DataTable();
    });
  </script>
</body>

</html>