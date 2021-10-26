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
  $sql = "SELECT count(pid) FROM tblCart WHERE"
    . " cid = (SELECT uid FROM tblUserMaster WHERE email = :email";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute(["email" => $email, "status" => $status]);

  if ($result) {
    // $_SESSION["carts"] = $stmt->fetchAll();
    $exists = $stmt->fetchColumn();
    // header("location: /ProductionHouse/order/cart.php");
  } else {
    header("location: /ProductionHouse/order/cart.php?error=no");
  }
} catch (Exception $e) {
  header("location: /ProductionHouse/order/cart.php?error=q");
}
