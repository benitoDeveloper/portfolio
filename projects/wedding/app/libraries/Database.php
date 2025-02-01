<?php

class Database {
      private $db_host = DBHOST;
      private $db_name = DBNAME;
      private $db_user = DBUSER;
      private $db_pass = DBPASS;

      private $db_conn;
      public $stmt;
      private $db_err;

      public function __construct() 
      {

            $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
            $options = array(
                  PDO::ATTR_PERSISTENT => true,
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try {
                  $this->db_conn = new PDO($dsn,$this->db_user,$this->db_pass, $options);
            }catch(PDOException $e) {
                  echo 'Connection failed: ' . $e->getMessage();
            }
      }

      public function query($sql) 
      {
            $this->stmt = $this->db_conn->prepare($sql);
      }
      public function bind($placeholder, $value, $type=null) 
      {
            switch(true) {
                  case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                  case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                  case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                  default:
                        $type = PDO::PARAM_STR;
                        break;
            }
            $this->stmt->bindValue($placeholder,$value,$type);
      }
      public function execute() 
      {
            return $this->stmt->execute();
      }
      public function result_single() 
      {
            $this->execute();
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
      }
      public function result_set() 
      {
            $this->execute();
            $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
      }
      public function result_count() 
      {
            return $this->stmt->rowCount();
      }

}
?>