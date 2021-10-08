<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btnSubmit"])) {

    header("location: /ProductionHouse/user/get-otp.php");
} else {
    header("location: /ProductionHouse/user/get-otp.php");
}
