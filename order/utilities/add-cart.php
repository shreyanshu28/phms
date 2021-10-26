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

$email = $_SESSION["Email"];

$pid = $_REQUEST["cart"];

$status = 1;

$cart = 0;

try {
  $sql = "SELECT COUNT(cartid) FROM tblCart WHERE " .
    " cid = (SELECT uid FROM tblUserMaster WHERE email = :email) "
    . "AND pid = :pid AND status = :status";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(["email" => $email, "pid" => $pid, "status" => $status]);

  $cart = $stmt->fetchColumn();
} catch (Exception $e) {
  header("location: /ProductionHouse/order/cart.php?error=q");
}

if (!$cart) {
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
} else {
  try {
    $sql = "UPDATE tblCart SET qty = (SELECT DISTINCT qty + 1 FROM tblCart WHERE "
      . "cid = (SELECT uid FROM tblUserMaster WHERE email = :email) "
      . "AND pid = :pid AND status = :status) WHERE "
      . "cid = (SELECT uid FROM tblUserMaster WHERE email = :email) "
      . "AND pid = :pid AND status = :status";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(["email" => $email, "pid" => $pid, "status" => $status]);

    if ($result) {
      header("location: /ProductionHouse/order/cart.php");
    } else {
      header("location: /ProductionHouse/order/cart.php?error=no");
    }
  } catch (Exception $e) {
    header("location: /ProductionHouse/order/cart.php?error=q");
  }
}
