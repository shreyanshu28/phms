<?php

if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["get-otp"])) {
    require_once __DIR__ . "/../../_make-connection.php";

    $sql = "SELECT uid FROM tblUserMaster WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["email" => $_POST["txtEmail"]]);

    $verify = $stmt->fetchColumn();

    if ($verify != 0) {
        require_once __DIR__ . '/../email/function.php';
        require_once __DIR__ . '/../email/smtp/PHPMailerAutoload.php';

        $html = rand(100000, 999999);

        if (send_email($_POST["txtEmail"], $html, "Otp")) {
            $_SESSION["Email"] = $_POST["txtEmail"];
            $_SESSION["get-otp"] = $_POST["get-otp"];
            setCookie("otp", $html, time() + 60, "/");

            header("location: /ProductionHouse/user/verify-otp.php");
        } else {
            header("location: /ProductionHouse/user/login.php?otp=1");
        }
    } else {
        header("location: /ProductionHouse/user/login.php?error=email");
    }
} else {
    header("location: /ProductionHouse/user/login.php");
}
