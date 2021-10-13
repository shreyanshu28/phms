<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once(__DIR__ . '/../../_make-connection.php');

if (isset($_REQUEST['id'])) {
  $status = 0;
  if (isset($_REQUEST['restore'])) {
    $status = 1;
  }
  try {
    $pdo->beginTransaction();
    $sql = "UPDATE tblPackageMaster SET "
      . "status = :status WHERE pid = :pid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      "status" => $status, "pid" => $_REQUEST['id']
    ]);
    $pdo->commit();
  } catch (Exception $e) {
    $pdo->rollBack();
    echo "to err is human " . $e;
  }
  header("location: /ProductionHouse/package/package.php");
} else {
  header("location: ../package.php");
}
