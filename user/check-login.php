<?php
session_start();
include "./../make-connection.php";

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

// Transaction testing remaining
// try {
//     $pdo->beginTransaction();

$sql = "select * from tbllogin where username = :username && password = :password";
$stmt = $pdo->prepare($sql);
$stmt->execute(["username" => $username, "password" => $password]);

//     $pdo->commit();
// } catch (Exception $e) {
//     $pdo->rollBack();
//     echo "rollback";
// }

$user = $stmt->fetch();
$userid = $user->lid;

if ($userid) {
    $_SESSION['Username'] = $_POST['txtUsername'];
    header("Location: ./home.php");
} else {
    header("Location: ./login.php");
}
