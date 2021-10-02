<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../_make-connection.php";

if (isset($_POST["submit"])) {
    $type = strtoupper($_POST["type"] == "1" ? $_POST["txtType"] : $_POST["type"]);

    try {
        $pdo->beginTransaction();
        $sql = "INSERT INTO tblProductMaster "
            . "(productName, price, qty, type) VALUES "
            . "(:productName, :price, :qty, :type); ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "productName" => $_POST["productName"], "price" => $_POST["price"],
            "qty" => $_POST["qty"], "type" => $type
        ]);
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollback();
        echo "Rollback: $e";
    }
    header("location: /ProductionHouse/inventory/inventory.php");
}
