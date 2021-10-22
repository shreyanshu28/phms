<?php 
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

$url = $_SERVER['HTTP_REFERER'];
$checkUrl = "http://localhost/ProductionHouse/payment/payment.php";

if(!strcmp($url, $checkUrl)) {
    echo "success";
}
else {
    header('location:../index.php');
}
