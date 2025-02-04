<?php
class Project 
{
      private $db;
      public function __construct()
      {
            $this->db = new Database;
      }
      public function get_projects()
      {
            $sql = "SELECT * FROM projects";
            $this->db->query($sql);
            return $this->db->result_set();
      }
      public function slides_count()
      {
            return ceil(count($this->get_projects())/3);
      }

}
?>