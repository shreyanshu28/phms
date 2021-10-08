<?php

class DB {
    public $error = "";
    private $pdo = null;
    private $stmt = null;

    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "production_house";

        $dns = "mysql:host=${host};dbname=${dbname}";

        try {
            $this->pdo = new PDO($dns, $user, $password);
        } catch (Exception $ex) {
            exit($ex->getMessage());
        }

        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    }

    public function __destruct(){
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
      }

      public function select($sql, $cond=null){
        $result = false;
        try {
          $this->pdo->beginTransaction();
          $this->stmt = $this->pdo->prepare($sql);
          $this->stmt->execute($cond);
          $result = $this->stmt->fetchAll();
          $this->pdo->commit();
          return $result;
        } catch (Exception $ex) { 
          $this->error = $ex->getMessage(); 
          $this->pdo->rollBack();
          return false;
        }
      }

      public function update($sql, $cond=null){
        $result = false;

        try {
          $this->pdo->beginTransaction();
          $this->stmt = $this->pdo->prepare($sql);
          $result = $this->stmt->execute($cond);
          $this->pdo->commit();
          return $result;
        } catch (Exception $ex) {
          $this->error = $ex->getMessage(); 
          $this->pdo->rollBack();
          return false;
        }
      }
}