<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/../../_make-connection.php";

if (!isset($_SESSION["Email"])) {
  header("location: /ProductionHouse/user/login.php");
}

if (!isset($_REQUEST["cart"])) {
  header("location: /ProductionHouse/user/home.php?error");
}

$cid = $_REQUEST["cart"];

$status = 1;

$newStatus = 0;

try {
  $sql = "UPDATE tblCart SET status = :newStatus WHERE cartid = :cid";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute([
    "newStatus" => $newStatus, "cid" => $cid
  ]);

  if ($result) {
    header("location: /ProductionHouse/order/cart.php");
  } else {
    header("location: /ProductionHouse/order/cart.php?error=no");
  }
} catch (Exception $e) {
  header("location: /ProductionHouse/order/cart.php?error=q");
}
