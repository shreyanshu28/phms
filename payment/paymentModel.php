<?php
require_once '../make-connection.php';

class Payment extends DB
{
  public function __construct()
  {
    parent::__construct();
  }

  public function addPaymentOrder($method, $refid, $date, $time, $amount)
  {
    $sql = "INSERT INTO tblPaymentOrder1 "
      . "(method, refid, date, time, amount) VALUES "
      . "(:method, :refid, :date, :time, :amount)";

    $cond = [
      "method" => $method, "refid" => $refid, "date" => $date,
      "time" => $time, "amount" => $amount
    ];
    return $this->update($sql, $cond);
  }

  public function selectPaymentOrder($method, $refid, $date, $time, $amount)
  {
    $sql = "SELECT poid FROM tblPaymentOrder1 WHERE "
      . "method = :method AND refid = :refid AND "
      . "date = :date AND time = :time AND amount = :amount";

    $cond = [
      "method" => $method, "refid" => $refid, "date" => $date,
      "time" => $time, "amount" => $amount
    ];
    return $this->selectColumn($sql, $cond);
  }

  public function addPackagePaymentOrder($pid, $poid, $qty)
  {
    $sql = "INSERT INTO tblPackagePaymentOrder (pid, poid, qty) VALUES (:pid, :poid, :qty)";
    $cond = [
      "pid" => $pid, "poid" => $poid, "qty" => $qty
    ];
    return $this->update($sql, $cond);
  }
}
