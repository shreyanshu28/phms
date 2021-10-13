<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../_make-connection.php';
if (isset($_POST["update"])) {

    try {
        $pdo->beginTransaction();
        $sql = "UPDATE tblProductMaster SET "
            . "packageName = :packageName, photoCount = :photoCount, videoCount = :videoCount, type = :type "
            . "WHERE pid = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "productName" => $package["productName"], "qty" => $package["qty"],
            "price" => $package["price"], "type" => $package["type"], "pid" => $package["pid"]
        ]);
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "to err is human " . $e;
    }
    header("location: /ProductionHouse/inventory/inventory.php");
} else {
    header("location: /ProductionHouse/user/utilities/_logout.php", false);
}
