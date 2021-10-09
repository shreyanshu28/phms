<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}



if (isset($_SESSION["cart"])) {
    $temp = explode(",", $_SESSION["cart"]);
    foreach ($temp as $c) {
        if ($temp[$c] == $c) {
            unset($temp[$c]);
        } else if (empty($temp)) {
            unset($temp);
        }
    }
    unset($_SESSION["cart"]);
    $_SESSION["cart"] = implode(",", $temp);
}

header("location: ./cart.php?cart=0");
