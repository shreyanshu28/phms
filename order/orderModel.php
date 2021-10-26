<?php
require_once '../make-connection.php';

class Order extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAllOrder()
    {
        $sql = ""; #ADD YOUR QUERY
        return $this->select($sql);
    }

    public function selectSpecificOrder($date, $time)
    {
        $sql = "SELECT oid FROM tblOrderMaster WHERE date = :date AND time = :time";
        return $this->selectColumn($sql);
    }

    public function addOrder($date, $time, $cid, $poid)
    {
        $sql = "INSERT INTO tblOrderMaster (date, time, cid, poid) VALUES (:date, :time, :cid, :poid)";
        $cond = ["date" => $date, "time" => $time, "cid" => $cid, "poid" => $poid];
        return $this->update($sql, $cond);
    }

    public function updateOrder($uid, $details)
    {
        $sql = "UPDATE tblMaster SET "; //FETCH EVERYTHING FROM THE FORM, AND UPDATE
        $cond = [];
        return  $this->update($sql, $cond);
    }

    public function selectCustomerOrder()
    {
        $sql = ""; #ADD YOUR QUERY
        return $this->select($sql);
    }

    public function countOrders()
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
