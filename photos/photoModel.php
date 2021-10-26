<?php
require_once "../make-connection.php";

class Photos extends DB
{
    //use foreach to insert photos one by one
    public function insertPhotos($fileName)
    {
        $sql = "INSERT INTO tblphotovideomaster (fileName) VALUES (:fileName);";
        $cond = ["fileName" => $fileName];
        if ($this->update($sql, $cond)) {
            return $this->getPhotoId($fileName);
        } else {
            return false;
        }
    }

    public function getPhotoId($fileName)
    {
        $sql = "SELECT pvid FROM tblphotovideomaster where fileName=:fileName;";
        $cond = ["fileName" => $fileName];
        return $this->select($sql, $cond);
    }

    //oid will come from query string 
    public function insertPhotoOrder($pvid, $oid)
    {
        $sql = "INSERT INTO tblPhotoVideoMaster(pvid, oid) VALUES (:pvid, :oid);";
        $cond = ["pvid" => $pvid, "oid" => $oid];
        return $this->update($sql, $cond);
    }

    public function SelectPhotos($oid)
    {
        $sql = "SELECT p.fileName from tblphotovideomaster p INNER JOIN tblphotovideoorder O on o.pvid=p.pvid WHERE o.oid=:oid";
        $cond = ["oid" => $oid];
        return $this->select($sql, $cond);
    }
}
