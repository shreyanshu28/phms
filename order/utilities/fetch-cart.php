<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/../../_make-connection.php";

if (!isset($_SESSION["Email"])) {
  header("location: /ProductionHouse/user/login.php");
}

$email = $_SESSION["Email"];
$status = TRUE;

try {
  $sql = "SELECT c.cartid, c.cid, p.packageName, p.photoCount, p.videoCount, p.price, p.type, p.description, c.status, c.qty "
    . "FROM tblCart c "
    . "INNER JOIN tblPackageMaster p "
    . "on c.pid = p.pid "
    . "WHERE c.cid = (SELECT uid FROM tblUserMaster WHERE email = :email) AND c.status = :status ";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute(["email" => $email, "status" => $status]);

  if ($result) {
    // $_SESSION["carts"] = $stmt->fetchAll();
    $carts = $stmt->fetchAll();
    // header("location: /ProductionHouse/order/cart.php");
  } else {
    header("location: /ProductionHouse/order/cart.php?error=no");
  }
} catch (Exception $e) {
  header("location: /ProductionHouse/order/cart.php?error=q");
}
