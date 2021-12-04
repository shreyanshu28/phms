<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// echo $_POST["txtAddress1"];

require_once __DIR__ . "/../_make-connection.php";

if (!isset($_SESSION["Email"])) {
  header("location: ./login.php?no=TRUE");
} else {
  // require_once "./utilities/_fetch-user.php";
}

if (isset($_POST["submit"])) {
  // echo "here";
  $reg_alpha = "/[a-zA-Z]+/";
  $reg_num = "/^[6-9][0-9]{9}$/";

  $y = explode("-", $_POST["date"]);
  if (!($y[0] <= (date("Y") - 18))) {
    header("location: ./order-address.php?error=dob");
  }

  if (isset($_POST['txtAddress1'])) {
    if ($_POST['txtAddress1'] == "") {
      header("location: ./order-address.php?error=address");
    }
  }

  if (isset($_POST['txtCity'])) {
    if ($_POST["txtCity"] == -1) {
      header("location: ./order-address.php/error=city");
    } else if ($_POST["txtCity"] == 'City') {
      header("location: ./order-address.php/error=city");
    }
    if (!preg_match($reg_alpha, $_POST["txtCity"])) {
      header("location: ./order-address.php?error=city");
    }
  } else {
    if (!preg_match($reg_alpha, $_POST["cbCity"])) {
      header("location: ./order-address.php?error=city");
    }
  }

  if (!preg_match("/^[0-9]{6}$/", $_POST["txtPincode"])) {
    header("location: ./order-address.php?error=pincode");
  }
  $stat = 1;
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
