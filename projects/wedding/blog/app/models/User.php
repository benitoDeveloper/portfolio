<?php

class User 
{
      private $db;

      public function __construct() {
            $this->db = new Database;
      }
      public function emailAlreadyExist($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email'); 
            $this->db->bind(':email',$email);
            $result = $this->db->single_result();
            if($this->db->result_count($result) > 0)
            {
                  return $result;
            }else
            {
                  return false;
            }
      }
      public function register($data) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->query('INSERT INTO users (name, email, password) VALUES (:name,:email, :password)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            if($this->db->execute()) {
                  return true;
            }else {
                  return false;
            }
      }
      public function log_into_account($user, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $user);
            $result = $this->db->single_result();
            $hash_pass = $result->password;
            // var_dump($result);
            // return;
            if(password_verify($password, $hash_pass)){
                  return $result;
            }
            return false;
      }
      public function get_post_user($id) {
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
            $result = $this->db->single_result();
            return $result? $result : false;
      }
}