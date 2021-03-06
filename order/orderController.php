<?php
include __DIR__ . './orderModel.php';



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION["Role"] != 'A') {
    header("location: ../index.php");
}

$order = new Order();
$r = $order->refreshOrderStatus();

//UPDATE
if (isset($_REQUEST['oid'])) {
    if (isset($_REQUEST['status'])) {
        if ($_REQUEST['status'] == 'Confirmed') {
            $result = $order->setOrderStatus($_REQUEST['status'], $_REQUEST['oid']);
        }
    } else {
        $result = $order->updateOrder($_REQUEST['oid'], $_SESSION['newStatus']);
        unset($_SESSION['newStatus']);
    }
    header('location:./order.php');
} else {    //SELECT ALL
    $result = $order->selectAllOrder();
    $status = $order->selectOrderStatus();
    $_SESSION['orders'] = $result;
    $_SESSION['orderStatus'] = $status;
}
