<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "../../_make-connection.php";
require_once __DIR__ . "/../order/orderModel.php";
require_once __DIR__ . "/paymentModel.php";

$order = new Order();
$payment = new Payment();

$url = $_SERVER['HTTP_REFERER'];
$checkUrl = "http://localhost/ProductionHouse/payment/payment.php";

if (strcmp($url, $checkUrl)) {
  $method = strtoupper("ONLINE");
  $refid = "";
  $date = date("Y/m/d");
  $time = date("h:i:sa");
  $amount = $_SESSION["amtTotal"];

  $payment->addPaymentOrder($method, $refid, $date, $time, $amount);

  $poid = $payment->selectPaymentOrder($method, $refid, $date, $time, $amount);

  $cid = $_SESSION["cid"];
  $status = 1;

  $sql = "SELECT pid, qty FROM tblCart WHERE "
    . "cid = :cid AND status = :status";

  $stmt = $pdo->prepare($sql);

  $stmt->execute([
    "cid" => $cid, "status" => $status
  ]);

  $packages = $stmt->fetchAll();

  foreach ($packages as $package) {
    $payment->addPackagePaymentOrder($package->pid, $poid, $package->qty);
  }

  $order->addOrder($_SESSION["order-date"], $_SESSION["order-time"], $cid, $poid);

  $newStatus = 0;
  $status = 1;
  $sql = "UPDATE tblCart SET status = :newStatus WHERE cid = :cid AND status = :status";
  $stmt = $pdo->prepare($sql);

  $stmt->execute([
    "newStatus" => $newStatus, "cid" => $cid, "status" => $status
  ]);

  header("location: /ProductionHouse/user/home.php?pay=1");
} else {
  header("location: /ProductionHouse/user/home.php?pay=0");
}
