<?php
include __DIR__.'./orderModel.php';

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
$order = new Order();

//MODIFY ACCORDING TO YOUR NEEDS
$count = $order->countOrders();