<?php
require_once '../make-connection.php';

class Order extends DB{
    public function selectAllOrder() {
        $sql = ""; #ADD YOUR QUERY
        return $this->select($sql);
    }

    public function addOrder($params) {
        $sql = "";
        $cond = [];
        return $this->update($sql, $cond);
    }

    public function updateOrder($uid, $details) {
        $sql = "UPDATE tblMaster SET " ;//FETCH EVERYTHING FROM THE FORM, AND UPDATE
        $cond = [];
        return  $this->update($sql, $cond);
    }

    public function selectCustomerOrder() {
        $sql = ""; #ADD YOUR QUERY
        return $this->select($sql);
    }

    public function countOrders() {
        $sql = "select count(*) from tblOrderMaster where odate>today()";
        return $this->select($sql);
    }

    //select monthly orders, 
    //select pending orders
    //select unpaid orders
    //select halfway done orders
}