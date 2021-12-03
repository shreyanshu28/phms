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
        $sql = "SELECT o.oid, o.status, o.date, o.time, u.email from tblOrderMaster o inner join tblUserMaster u on o.cid = u.uid";
        return $this->select($sql);
    }

    public function selectOrderStatus()
    {
        $sql = "SELECT DISTINCT(status) FROM tblOrderMaster";
        return $this->select($sql);
    }

    public function selectCustomerOrder($email)
    {
        $status = 'Completed';
        $sql = "SELECT oid, date, time FROM tblOrderMaster WHERE cid = (SELECT uid FROM tblUserMaster WHERE email = :email) AND status = :status";

        $cond = ["email" => $email, "status" => $status];

        return $this->select($sql, $cond);
    }

    public function addOrder($date, $time, $cid, $poid)
    {
        $sql = "INSERT INTO tblOrderMaster (date, time, cid, poid) VALUES (:date, :time, :cid, :poid)";
        $cond = ["date" => $date, "time" => $time, "cid" => $cid, "poid" => $poid];
        return $this->update($sql, $cond);
    }

    public function addOrderAddress($address1, $address2, $city, $pincode, $email)
    {
        $sql = "INSERT INTO tblOrderAddress1 (addressline1, addressline2, city, pincode, cid) VALUES (:address1, :address2, :city, :pincode, (SELECT uid FROM tblUserMaster WHERE email = :email))";
        $cond = ["address1" => $address1, "address2" => $address2, "city" => $city, "pincode" => $pincode, "email" => $email];
        return $this->update($sql, $cond);
    }

    public function updateOrder($uid, $details)
    {
        $sql = "UPDATE tblOrderMaster SET status=:status WHERE oid=:oid"; //FETCH EVERYTHING FROM THE FORM, AND UPDATE
        $cond = ["status" => $details, "oid" => $uid];
        return  $this->update($sql, $cond);
    }

    public function selectCustomOrder($cid)
    {
        $sql = "SELECT oid, date, time FROM tblordermaster WHERE cid=:cid"; #ADD YOUR QUERY
        $cond = ["cid" => $cid];
        return $this->select($sql, $cond);
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
