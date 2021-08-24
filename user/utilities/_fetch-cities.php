<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Username'])) {
    header("Location: ../../index.php");
}


// TODO: need to remove u.uid column from the sql output
$sql = "SELECT Distinct cname FROM tblCity";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll();

$_SESSION['AllCities'] = $user;
