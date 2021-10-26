<?php
require_once __DIR__ . "/../../make-connection.php";

class Cart extends DB
{
  public function selectAllCart()
  {
    $sql = "SELECT p.packageName, p.photoCount, p.videoCount, p.price, p.type, p.description, c.qty "
      . "FROM tblCart c "
      . "INNER JOIN tblPackageMaster p "
      . "on c.pid = p.pid ";

    return $this->select($sql);
  }

  public function selectCart($email, $status)
  {
    $sql = "SELECT p.packageName, p.photoCount, p.videoCount, p.price, p.type, p.description, c.qty "
      . "FROM tblCart c "
      . "INNER JOIN tblPackageMaster p "
      . "on c.pid = p.pid "
      . "WHERE c.cid = (SELECT uid FROM tblUserMaster WHERE email = :email) AND c.status = :status ";

    $cond = ["email" => $email, "status" => $status];
    return $this->select($sql, $cond);
  }

  public function addCart($email, $pid)
  {
    $sql = "INSERT INTO tblCart (cid, pid) VALUES "
      . "((SELECT uid FROM tblUserMaster WHERE email = :email), "
      . " (SELECT pid FROM tblPackageMaster WHERE pid = :pid)) ";

    $cond = ["email" => $email, "pid" => $pid];
    return $this->update($sql, $cond);
  }

  public function updateCart($uid, $details)
  {
    $sql = "UPDATE tblCart SET ";

    $cond = [];
    return  $this->update($sql, $cond);
  }

  public function updateQuantity($email, $pid)
  {
    $sql = "UPDATE tblCart SET qty = ";

    $cond = [];
    return  $this->update($sql, $cond);
  }

  public function countCart()
  {
    $sql = "select count(*) from tblOrderMaster where odate>today()";
    return $this->select($sql);
  }

  //select monthly orders, 
  //select pending orders
  //select unpaid orders
  //select halfway done orders
  // public function
}
