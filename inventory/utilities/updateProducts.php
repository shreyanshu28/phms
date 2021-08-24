<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../../_make-connection.php';

$id = $_REQUEST['id'];

try {
    $pdo->beginTransaction();
    // $sql = 
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $id]);
    $products = $stmt->fetchAll();
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "to err is human";
}

foreach ($products as $inventory) {
    echo "$inventory->poid";
    echo "$inventory->pName";
    echo "$inventory->qty";
    echo "$inventory->price";
    echo "$inventory->ownership";
    echo "$inventory->iType";
}