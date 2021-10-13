<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../_make-connection.php';
if (isset($_POST["update"])) {
    $package["pid"] = $_POST["pid"];
    $package["packageName"] = $_POST["packageName"];
    $package["photoCount"] =  $_POST["photoCount"];
    $package["videoCount"] =  $_POST["videoCount"];
    $package["price"] = $_POST["price"];
    $package["description"] = $_POST["description"];
    $package["type"] = $_POST["type"];
    try {
        $pdo->beginTransaction();
        $sql = "UPDATE tblPackageMaster SET "
            . "packageName = :packageName, photoCount = :photoCount, videoCount = :videoCount,"
            . "price = :price, description = :description, type = :type "
            . "WHERE pid = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "packageName" => $package["packageName"], "photoCount" => $package["photoCount"],
            "videoCount" => $package["videoCount"], "price" => $package["price"], "description" => $package["description"],
            "type" => $package["type"], "pid" => $package["pid"]
        ]);
        $pdo->commit();
        header("location: /ProductionHouse/package/package.php?updated=1");
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "to err is human " . $e;
        header("location: /ProductionHouse/package/package.php?updated=0");
    }
} else {
    header("location: /ProductionHouse/user/utilities/_logout.php", false);
}
