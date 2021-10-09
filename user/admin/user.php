<?php

require_once __DIR__ . './make-connection.php';

class User extends DB
{
    public function addUser($f_name, $m_name, $l_name, $dob, $gender, $contact_no, $email, $password)
    {
        $sql = "INSERT INTO tblUserMaster (firstName, middleName, lastName, dob, gender, contactNumber, email, password) VALUES (:fname, :mname, :lname, :dob, :gender, :contactno, :email, :password)";
        $cond = ['fname' => $f_name, 'mname' => $m_name, 'lname' => $l_name, 'dob' => $dob, 'gender' => $gender, 'contactno' => $contact_no, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)];
        return $this->update($sql, $cond);
    }

    public function selectAllUser()
    {
        $sql = "SELECT u.uid, u.firstName, u.middleName, u.lastName, u.dob, u.gender, u.contactNumber, u.email, u.profilePhoto, u.status, u.role,"
            . "ua.addressline1, ua.addressline2, ua.city, ua.pincode FROM "
            . "tblUserMaster u INNER JOIN tblUserAddress ua "
            . "ON ua.uid = u.uid ";
        return $this->select($sql);
    }

    public function selectRole()
    {
        $sql = "SELECT distinct(role) from tblUserMaster";
        // $sql = "SELECT rname from tblRole";
        return $this->select($sql);
    }

    public function updateRole($uid, $role)
    {
        $sql = "UPDATE tblUserMaster SET role=:role where uid=:uid";
        $cond = ['role' => $role, 'uid' => $uid];
        return $this->update($sql, $cond);
    }

    public function addNewRole($role)
    {
        $sql = "INSERT into tblRole(rname) VALUES (:role)";
        $cond = ['role' => $role];
        return $this->update($sql, $cond);
    }
}

/*
ADDUSER TAKES ARGUMENTS FOR USERMASTER TABLE. DB->UPDATE'S RETURN VALUE WILL BE RETURNED TO THE CONTROLLER. IF THE VALUE IS APPROPRIATE, ADDRESS INFORMATION WILL BE ADDED. 
*/