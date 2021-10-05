<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/../../_make-connection.php');

if (isset($_REQUEST['id'])){
    $qty = 0;
    if(isset($_REQUEST['restore'])) {
        $qty = 1;
    }
    try {
        $pdo->beginTransaction();
         $sql = "UPDATE tblProductMaster SET "
            ."qty = :qty WHERE pid = :pid";
        $stmt = $pdo -> prepare($sql);
        $stmt->execute([
             "qty" => $qty, "pid" =>$_REQUEST['id']
        ]);
        $pdo->commit();
    } catch(Exception $e) {
        $pdo->rollBack();
        echo "to err is human ".$e;
    }
    header("location: /ProductionHouse/inventory/inventory.php");
}  else {
    header("location: ../inventory.php");
}