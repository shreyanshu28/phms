<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/../../_make-connection.php');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    // if ($_SERVER["REQUEST_METHOD"] == "POST")

    try {
        $pdo->beginTransaction();
        $sql = "SELECT pid, productName, qty, price, type FROM tblProductMaster WHERE pid = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["pid" => $id]);
        $products = $stmt->fetchAll();
        $pdo->commit();

        $_SESSION['products'] = $products;

        header("location: /ProductionHouse/inventory/updateInventory.php", false);
    } catch (Exception $e) {
        echo "Err1";
    }
} else {
    try {
        $pdo->beginTransaction();
        $sql = "SELECT pid, productName, qty, price, type FROM tblProductMaster";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
        $pdo->commit();
    } catch (Exception $e) {
        echo "Err2";
    }
}
