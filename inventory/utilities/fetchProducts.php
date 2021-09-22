<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '../../../_make-connection.php');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    // if ($_SERVER["REQUEST_METHOD"] == "POST")

    try {
        $pdo->beginTransaction();
        $sql = "SELECT po.poid, p.pName, po.qty, po.price, po.ownership, it.iType FROM " .
            "tblpropownership po inner join tblProps p " .
            "inner join tblinventorytype it " .
            "on p.pid = po.propid and it.itid=po.intId " .
            "WHERE po.poid= :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        $products = $stmt->fetchAll();
        $pdo->commit();

        $_SESSION['products'] = $products;

        header("location: ../updateInventory.php", false);
    } catch (Exception $e) {
        echo "Err";
    }
} else {
    try {
        $pdo->beginTransaction();
        $sql = "SELECT po.poid, p.pName, po.qty, po.price, po.ownership, it.iType FROM " .
            "tblpropownership po inner join tblProps p " .
            "inner join tblinventorytype it " .
            "on p.pid = po.propid and it.itid=po.intId ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();
        $pdo->commit();
    } catch (Exception $e) {
        echo "Err";
    }
}
