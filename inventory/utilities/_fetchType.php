<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once (__DIR__.'../../../_make-connection.php');

try {
    $pdo->beginTransaction();
    $sql="SELECT DISTINCT(ownership) FROM tblpropownership";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $owner=$stmt->fetchAll();
    $pdo->commit();

    //TODO: refactor
    $pdo->beginTransaction();
    $sql="SELECT iType from tblinventorytype";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $type=$stmt->fetchAll();
    $pdo->commit();
}catch(Exception $e) {
    echo "Err";
}