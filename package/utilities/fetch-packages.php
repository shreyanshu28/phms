<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["Email"])) {
  header("location: ./package.php");
}

require_once __DIR__ . "/../../_make-connection.php";

$sql = "SELECT * FROM tblPackageMaster";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$packages = $stmt->fetchAll();
