<?php
include __DIR__ . './orderModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if($_SESSION["Role"] != 'A') {
        header("location: ../index.php");
    }
}
$order = new Order();

//UPDATE
if (isset( $_REQUEST['oid'])) {
    $result = $order->updateOrder($_REQUEST['oid'], $_SESSION['newStatus']);
    unset($_SESSION['newStatus']);
    header('location:./order.php');
} else {    //SELECT ALL
    $result = $order->selectAllOrder();
    $status = $order->selectOrderStatus();
    $_SESSION['orders'] = $result;
    $_SESSION['orderStatus'] = $status;
}