<?php
class Visitor
{
      protected $db_conn;
      public function __construct()
      {
            $this->db_conn = new Database;
      }
      public function is_registered($email) {
            $sql = "SELECT * FROM visitors WHERE email = :email";
            $this->db_conn->query($sql);
            $this->db_conn->bind(':email', $email);
            $result = $this->db_conn->result_set();
            return $this->db_conn->result_count($result) > 0 ? true: false;
      }
      public function register_visitor($data) 
      {
            $sanitized_data = sanitise($data);
            $sql = 'INSERT INTO visitors (first_name,last_name,email,attendance,mensaje) VALUES (:first_name,:last_name,:email,:attendance,:mensaje)';
            $this->db_conn->query($sql);
            $this->db_conn->bind(':first_name', $sanitized_data['first_name']);
            $this->db_conn->bind(':last_name', $sanitized_data['last_name']);
            $this->db_conn->bind(':attendance', $sanitized_data['attendance']);
            $this->db_conn->bind(':email', $sanitized_data['email']);
            $this->db_conn->bind(':mensaje', $sanitized_data['message']);
            try
            {
                  $this->db_conn->execute();
                  return true;
            }catch (PDOException $e) 
            {
                  return 'there was an error:' . $e->getMessage();

            }

      }
      public function get_visitor_id($email)
      {
            $sql = 'SELECT * FROM visitors WHERE email = :email';
            $this->db_conn->query($sql);
            $this->db_conn->bind(':email', $email);
            $result = $this->db_conn->result_single();
            return $result['id'];
      }
      public function get_visitor($id) 
      {
            $sql = 'SELECT * FROM visitors WHERE id = :id';
            $this->db_conn->query($sql);
            $this->db_conn->bind(':id', $id);
            $result = $this->db_conn->result_single();
            return $result;
      }
      public function edit_visitor($data)
      {
            $sql = "UPDATE visitors SET first_name = :first_name, last_name = :last_name, email = :email, attendance = :attendance, mensaje = :mensaje WHERE id = :id";
            $this->db_conn->query($sql);
            $this->db_conn->bind(':id', $data['visitor_id']);
            $this->db_conn->bind(':first_name', $data['first_name']);
            $this->db_conn->bind(':last_name', $data['last_name']);
            $this->db_conn->bind(':email', $data['email']);
            $this->db_conn->bind(':attendance', $data['attendance']);
            $this->db_conn->bind(':mensaje', $data['message']);

            if($this->db_conn->execute())
            {
                  return true;
            }else
            {
                  return false;
            }

      }
}
?>