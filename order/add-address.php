<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/../_make-connection.php";

if (!isset($_SESSION["Email"])) {
  header("location: ./login.php?no=TRUE");
} else {
  // require_once "./utilities/_fetch-user.php";
}

require_once __DIR__ . "/orderModel.php";

$order = new Order();

$city = isset($_POST["cbCity"]) ? $_POST["cbCity"] : $_POST["txtCity"];

// $sql = "INSERT INTO tblOrderAddress (Address1, Address2, city, pincode, cid) VALUES (:address1, :address2, :city, :pincode, (SELECT uid FROM tblUserMaster WHERE email = :email))";
// $cond = ["address1" => $_POST["txtAddress1"], "address2" => $_POST["txtAddress2"], "city" => $city, "pincode" => $_POST["txtPincode"], "email" => $_SESSION["Email"]];

// $stmt = $pdo->prepare($sql);
// $stmt->execute($cond);

$_SESSION["order-date"] = $_POST["date"];
$_SESSION["order-time"] = $_POST["time"];

$order->addOrderAddress($_POST["txtAddress1"], $_POST["txtAddress2"], $city, $_POST["txtPincode"], $_SESSION["Email"]);

header("location: /ProductionHouse/payment/payment.php");
