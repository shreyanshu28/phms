<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../_make-connection.php";

if (isset($_POST["submit"])) {
    $type = strtoupper($_POST["type"] == "1" ? $_POST["txtType"] : $_POST["type"]);
    $description = isset($_POST["description"]) ? $_POST["description"] : "This is Package description";
    try {
        $pdo->beginTransaction();
        $sql = "INSERT INTO tblPackageMaster "
            . "(packageName, photoCount, videoCount, price, description, type) VALUES "
            . "(:packageName, :photoCount, :videoCount, :price, :description, :type); ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "packageName" => $_POST["packageName"], "photoCount" => $_POST["photoCount"],
            "videoCount" => $_POST["videoCount"], "price" => $_POST["price"],
            "description" => $description, "type" => $type
        ]);
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollback();
        echo "Rollback: $e";
    }
    header("location: /ProductionHouse/package/package.php");
}
