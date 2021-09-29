<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../_make-connection.php';
if (isset($_POST["update"])) {
    $products["pid"] = $_POST["pid"];
    $products["productName"] = $_POST["productName"];
    $products["qty"] =  $_POST["qty"];
    $products["price"] = $_POST["price"];
    $products["type"] = $_POST["type"];

    // foreach ($inventory as $product) {
    //     $products['pid'] = $product->pid;
    //     $products['productName'] = $product->productName;
    //     $products['qty'] =  $product->qty;
    //     $products['price'] = $product->price;
    //     $products['type'] = $product->type;
    // }

    try {
        $pdo->beginTransaction();
        $sql = "UPDATE tblProductMaster SET "
            . "productName = :productName, qty = :qty, price = :price, type = :type "
            . "WHERE pid = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "productName" => $products["productName"], "qty" => $products["qty"],
            "price" => $products["price"], "type" => $products["type"], "pid" => $products["pid"]
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
// foreach ($products as $inventory) {
//     echo "$inventory->pid";
//     echo "$inventory->productName";
//     echo "$inventory->qty";
//     echo "$inventory->price";
//     echo "$inventory->type";
// }
