<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/orderModel.php";

if (!isset($_SESSION["Email"])) {
  header("location: ./login.php?no=1");
} else {
  require_once __DIR__ . '/../user/utilities/_fetch-user.php';
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
  <?php
  require_once __DIR__ . "/user-nav.php";
  ?>
  <div class="title is-1" id="title">Your Orders</div>
  <div class="image-gallery">
    <?php
    $order = new Order();
    $orders = $order->selectCustomerOrder($_SESSION["Email"]);

    foreach ($orders as $order) {
      $sql = "SELECT m.path, om.oid FROM tblPhotoVideoOrder o INNER JOIN tblPhotoVideoMaster m on o.pvid = m.pvid "
        . "INNER JOIN tblOrderMaster om on om.oid = o.oid WHERE om.cid = (SELECT uid FROM tblUserMaster WHERE email = :email)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(["email" => $_SESSION["Email"]]);
      $paths = $stmt->fetchAll();
      foreach ($paths as $path) {
        $p = "./download.php?file=" . urlencode($path->path);
        echo "<a href = '$p'><img src='$path->path' class='image' /></a>";
      }
    }
    ?>
  </div>
</body>

</html>