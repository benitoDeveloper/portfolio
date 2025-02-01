<?php
Class Menu 
{
      protected $db_conn;
      public function __construct()
      {
            $this->db_conn = new Database;
      }
      public function register_menu_db($data)
      {
            $sql = "INSERT INTO menu (visitor_id, starter, main, dessert, menu_message) VALUES (:visitor_id, :starter, :main, :dessert, :menu_message)";
            $this->db_conn->query($sql);
            $this->db_conn->bind(':visitor_id', $data['visitor_id']);
            $this->db_conn->bind(':starter', $data['starter']);
            $this->db_conn->bind(':main', $data['main']);
            $this->db_conn->bind(':dessert', $data['dessert']);
            $this->db_conn->bind(':menu_message', $data['menu_message']);
            try
            {
                  $this->db_conn->execute();
                  return true;
            }catch (PDOException $e) 
            {
                  return 'there was an error:' . $e->getMessage();
            }
      }
      public function edit_menu_db($data)
      {
            $sql = "UPDATE menu SET starter = :starter, main = :main, dessert = :dessert, menu_message = :menu_message WHERE id = :id";
            $this->db_conn->query($sql);
            $this->db_conn->bind(':id', $data['id']);
            $this->db_conn->bind(':starter', $data['starter']);
            $this->db_conn->bind(':main', $data['main']);
            $this->db_conn->bind(':dessert', $data['dessert']);
            $this->db_conn->bind(':menu_message', $data['menu_message']);
            if($this->db_conn->execute())
            {
                  return true;
            }else
            {
                  return false;
            }
      }
      public function has_menu($visitor_id) 
      {
            $sql = 'SELECT * FROM menu WHERE visitor_id = :visitor_id';
            $this->db_conn->query($sql);
            $this->db_conn->bind(':visitor_id', $visitor_id);
            $result = $this->db_conn->result_set();
            return $this->db_conn->result_count($result) > 0 ? true : false;
      }
      public function get_menu($visitor_id)
      {
            $sql = 'SELECT * FROM menu WHERE visitor_id = :visitor_id';
            $this->db_conn->query($sql);
            $this->db_conn->bind(':visitor_id', $visitor_id);
            $result = $this->db_conn->result_single();
            return $result;
      }

}
?>