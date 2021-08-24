<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../../_make-connection.php";

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

// TODO: Transaction testing remaining
try {
    $pdo->beginTransaction();
    $sql = "select * from tbllogin where username = :username && password = sha(:password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["username" => $username, "password" => $password]);
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
}

$user = $stmt->fetch();
$userid = $user->lid;

if ($userid) {
    $_SESSION['Username'] = $_POST['txtUsername'];
    header("Location: ../home.php");
} else {
    header("Location: ../../index.php");
}
