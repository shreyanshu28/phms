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
        $sql = "SELECT o.*, c.email FROM tblOrderMaster o INNER JOIN tblUserMaster c on c.uid = o.cid";
        return $this->select($sql);
    }

    public function selectCustomerOrder($email)
    {
        $sql = "SELECT oid FROM tblOrderMaster WHERE cid = (SELECT uid FROM tblUserMaster WHERE email = :email) ";

        $cond = ["email" => $email];

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
        $sql = "UPDATE tblMaster SET "; //FETCH EVERYTHING FROM THE FORM, AND UPDATE
        $cond = [];
        return  $this->update($sql, $cond);
    }

    // public function selectCustomerOrder()
    // {
    //     $sql = ""; #ADD YOUR QUERY
    //     return $this->select($sql);
    // }

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
