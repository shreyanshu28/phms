<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["Email"])) {
  header("location: ./package.php");
}

require_once __DIR__ . "/../../_make-connection.php";

if (isset($_REQUEST["id"])) {
  $sql = "SELECT * FROM tblPackageMaster where pid = :pid";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(["pid" => $_REQUEST["id"]]);
  $_SESSION["package"] = $stmt->fetchAll();
  header("location: /ProductionHouse/package/update-package.php");
} else {
  $sql = "SELECT * FROM tblPackageMaster";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $packages = $stmt->fetchAll();
}
