<?php

/*
-- this will be the pdo class
-- it will include few methods to select, insert and update the database
-- the model will use this class
*/

Class Database 
{
      private $db_host = DBHOST;
      private $db_name = DBNAME;
      private $user_name = DBUSER;
      private $password = DBPASSWORD;

      private $db_conn;
      public $stmt;
      private $db_error;

      public function __construct()
      {
            $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
            $options = array(
                  PDO::ATTR_PERSISTENT => true,
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try {
                  $this->db_conn = new PDO($dsn, $this->user_name,$this->password,$options);
            } catch (PDOException $e) {
                  $this->db_error = "Connection failed: " . $e->getMessage();
            }
      }
      public function query($sql)
      {
            $this->stmt = $this->db_conn->prepare($sql);
      }
      public function bind($parameter,$value,$type = null)
      {
            switch(true){
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
            $this->stmt->bindValue($parameter, $value,$type);
      }
      public function execute()
      {
            return $this->stmt->execute();
      }
      public function result_set()
      {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public function single_result()
      {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
      }
      public function result_count()
      {
            return $this->stmt->rowCount();
      }
}

?>