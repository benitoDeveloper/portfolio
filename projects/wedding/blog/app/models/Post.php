<?php

class Post 
{
      protected $db;
      public function __construct(){
            $this->db = new Database;
      }
      public function get_posts()
      {
            $this->db->query('SELECT *,
                              posts.id as posts_id,
                              users.id as users_id
                              FROM posts
                              INNER JOIN users
                              ON  posts.user_id = users.id');


            return $this->db->result_set();
      }
      public function add_post($data) {
            $this->db->query('INSERT INTO posts (title, text, user_id) VALUES (:title, :text, :user_id)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':text', $data['text']);
            $this->db->bind(':user_id', $data['user_id']);
            if($this->db->execute()){
                  return true;
            }else {
                  return false;
            }
      }
      public function get_single_post($post_id){
            $this->db->query('SELECT * FROM posts WHERE id= :post_id');
            $this->db->bind(':post_id', $post_id);
            $result = $this->db->single_result();
            return empty($result)? false : $result;
      }
      public function edit($data) {
            $this->db->query('UPDATE posts SET title = :title, text = :text WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':text', $data['text']);
            return $this->db->execute()? true : false;
      }
      public function delete($post_id) {
            $this->db->query('DELETE FROM posts WHERE id = :id');
            $this->db->bind(':id', $post_id);
            return $this->db->execute()? true : false;
      }

}
?>