<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
setCookie("UserInfo", "", time() - 3600, "/");
session_destroy();
header("location: /ProductionHouse/user/login.php");
