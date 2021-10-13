<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/../../_make-connection.php');

try {
    //TODO: refactor
    $pdo->beginTransaction();
    $sql = "SELECT DISTINCT(type) from tblPackageMaster";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $types = $stmt->fetchAll();
    $pdo->commit();
} catch (Exception $e) {
    echo "Err3";
}
