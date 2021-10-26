<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["Email"])) {
  header("location: /ProductionHouse/user/login.php");
}

if (!isset($_REQUEST["cart"])) {
  header("location: /ProductionHouse/user/home.php");
}

$email = $_SESSION["Email"];
$pid = $_REQUEST["cart"];

try {
  $sql = "INSERT INTO tblCart (cid, pid) VALUES "
    . "((SELECT uid FROM tblUserMaster WHERE email = :email), "
    . " (SELECT pid FROM tblPackageMaster WHERE pid = :pid)) ";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute(["email" => $email, "pid" => $pid]);

  if ($result) {
    header("location: /ProductionHouse/order/cart.php");
  } else {
    header("location: /ProductionHouse/order/cart.php?error=no");
  }
} catch (Exception $e) {
  header("location: /ProductionHouse/order/cart.php?error=q");
}
