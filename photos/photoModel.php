<?php
require_once "../make-connection.php";

class Photos extends DB
{
    public function __construct()
    {
        parent::__construct();
    }
    //use foreach to insert photos one by one
    public function insertPhotos($fileName, $subject = null)
    {
        $sql = "INSERT INTO tblphotovideomaster (path, subject) VALUES (:fileName, :subject)";
        $cond = ["fileName" => $fileName, "subject" => $subject];
        if ($this->update($sql, $cond)) {
            return $this->getPhotoId($fileName);
        } else {
            return false;
        }
    }

    public function getPhotoId($fileName)
    {
        $sql = "SELECT pvid FROM tblphotovideomaster where path = :fileName";
        $cond = ["fileName" => $fileName];
        return $this->select($sql, $cond);
    }

    public function getDistinctPath($fileName)
    {
        $sql = "SELECT DISTINCT(path) FROM tblphotovideomaster WHERE path = :fileName";
        $cond = ["fileName" => $fileName];
        return $this->select($sql, $cond);
    }

    //oid will come from query string 
    public function insertPhotoOrder($pvid, $oid)
    {
        $sql = "INSERT INTO tblPhotoVideoOrder (pvid, oid) VALUES (:pvid, :oid)";
        $cond = ["pvid" => $pvid, "oid" => $oid];
        return $this->update($sql, $cond);
    }

    public function selectPhotos($oid)
    {
        $sql = "SELECT p.path from tblphotovideomaster p INNER JOIN tblphotovideoorder O on o.pvid=p.pvid WHERE o.oid=:oid";
        $cond = ["oid" => $oid];
        return $this->select($sql, $cond);
    }
}
