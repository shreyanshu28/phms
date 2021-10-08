<?php

if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["get-otp"])) {
    require_once __DIR__ . "/../../_make-connection.php";

    $verify = 0;

    if (!$_SESSION["submit"]) {
        $sql = "SELECT true FROM tblUserMaster WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["email" => $_POST["txtEmail"]]);

        $verify = $stmt->fetchColumn();
    } else {
        $verify = 1;
    }

    if ($verify != 0) {
        require_once __DIR__ . '/../email/function.php';
        require_once __DIR__ . '/../email/smtp/PHPMailerAutoload.php';

        $html = rand(100000, 999999);
        $email = $_POST["txtEmail"];

        if (send_email($email, $html, "Otp")) {
            $_SESSION["Email"] = $_POST["txtEmail"];
            $_SESSION["get-otp"] = $_POST["get-otp"];
            $html = password_hash($html, PASSWORD_DEFAULT);
            setCookie("otp", $html, time() + 60, "/");
            header("location: /ProductionHouse/user/verify-otp.php");
        } else {
            header("location: /ProductionHouse/user/get-otp.php?otp=2");
        }
    } else {
        header("location: /ProductionHouse/user/get-otp.php?error=email");
    }
} else {
    header("location: /ProductionHouse/user/login.php");
}
