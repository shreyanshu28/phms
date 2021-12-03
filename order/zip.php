<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once "../photos/photoModel.php";
require_once './orderModel.php';
require_once './user-nav.php';

$zip = new ZipArchive();
$o = new Order();
$p = new Photos();
$orders = $o->selectCustomerOrder($_SESSION["Email"]);

foreach ($orders as $order) {
  if ($zip->open("./order" . $order->oid . ".zip", ZipArchive::CREATE) === TRUE) {
    $paths = $p->selectPhotos($order->oid);
    foreach ($paths as $path) {
      $name = explode("/", $path->path);
      $realName = $name[count($name) - 1];
      // $file = fopen(__DIR__ . "/../photos/uploads/" . $realName, "r");
      $zip->addFile(__DIR__ . "/../photos/uploads/" . $realName, "../photos/uploads/" . $realName);
    }

    echo $zip->close() ? "done" : "not";
  }
}

if (isset($_REQUEST["zip"])) {
  $filename = "./order" . $_REQUEST["zip"] . ".zip";

  if (file_exists($filename)) {
    echo $filename;
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Content-Length: ' . filesize($filename));

    flush();
    readfile($filename);
    // delete file
    unlink($filename);
  }
} else {
  header("location: /ProductionHouse/order/orders.php");
}
