<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../_make-connection.php";

if (!isset($_SESSION['Email'])) {
    header("Location: ../../index.php");
}


// TODO: need to remove u.uid column from the sql output
$sql = "SELECT Distinct city FROM tblUserAddress";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll();

$_SESSION['AllCities'] = $user;
