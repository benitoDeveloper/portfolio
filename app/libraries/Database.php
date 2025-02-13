<?php
class Database
{
      public $db_host = DBHOST;
      public $db_name = DBNAME;
      public $db_user = DBUSER;
      public $db_password = DBPASS;

      public $db_conn;
      public $stmt;
      public $error;

      public function __construct()
      {
            $dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;
            $options = array(
                  PDO::ATTR_PERSISTENT=>true,
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try
            {
                  $this->db_conn = new PDO($dsn, $this->db_user, $this->db_password, $options);
            }
            catch(PDOException $e) 
            {
                  $this->error = "there was an error: - " . $e->getMessage();
                  echo $this->error;
            }
      }
      public function query($sql)
      {
            $this->stmt = $this->db_conn->prepare($sql);
      }
      public function bind($parameter,$value,$type = null)
      {
            if(is_null($type))
            {
                  switch(true)
                  {
                        case is_int($value):
                              $type = PDO::PARAM_INT;
                              break;
                        case is_bool($value):
                              $type = PDO::PARAM_BOOL;
                              break;
                        case is_string($value):
                              $type = PDO::PARAM_STR;
                              break;
                        default:
                              $type = PDO::PARAM_NULL;
                              break;
                  }
            }
            $this->stmt->bindValue($parameter,$value,$type);
      }
      protected function execute()
      {
            return $this->stmt->execute();
      }
      public function result_set()
      {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }
      public function result_single()
      {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
      }
}
?>