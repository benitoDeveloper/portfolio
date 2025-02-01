<?php
class Posts extends Controller 
{
      public $post_model;
      public $user_model;
      public function __construct()
      {
            if(!is_logged_in()){
                  redirect('users/login');
            }
            $this->post_model = $this->model('Post');
            $this->user_model = $this->model('User');

      }
      public function index() {
            $data = [
                  'posts' => $this->post_model->get_posts()
            ];
            $this->view('posts/index', $data);
      }
      public function add() {
            // check if it is coming from post
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $data = [
                        'title' => trim(htmlspecialchars($_POST['title'])),
                        'text' => trim(htmlspecialchars($_POST['text'])),
                        'user_id' => trim(htmlspecialchars($_SESSION['user_id'])),
                        'title_err' =>'',
                        'text_err' =>'',
                  ];
                  if(empty($data['title'])) {
                        $data['title_err'] = 'Please provide a title';
                  };
                  if(empty($data['text'])) {
                        $data['text_err'] = 'Please provide text';
                  }
                  if(!empty($data['title']) && !empty($data['text'])){
                        if($this->post_model->add_post($data)) {
                              flash_msg('post_message','Your posts has been added');
                              redirect('posts');
                        }else {
                              die('something went wrong');
                        }
                        
                        die('post added success');
                  }else {
                        $this->view('posts/add',$data);
                  }
            }

            $data = [
                  'title' => '',
                  'text' => '',
                  'title_err' => '',
                  'text_err' => ''
            ];
            $this->view('posts/add',$data);
      }
      public function show($post_id) {

                  $post = $this->post_model->get_single_post($post_id);
                  $user = $this->user_model->get_post_user($post->user_id);
      
      
                  $data = [
                        'post'=> $post,
                        'user' =>$user
                  ];
                  $this->view('posts/show',$data);

      }
      public function edit($post_id) {
            $post = $this->post_model->get_single_post($post_id);

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                  if($post->user_id !== $_SESSION['user_id']) {
                        flash_msg('post_message', 'You cannot edit this post');
                        redirect('posts');
                  }

                  $data = [
                        'id' => trim(htmlspecialchars($post_id)),
                        'title' => trim(htmlspecialchars($_POST['title'])),
                        'text' => trim(htmlspecialchars($_POST['text']))
                  ];

                  if($this->post_model->edit($data)){
                        flash_msg('post_message', 'Your post has been edited successfully');
                        redirect('posts/show/' . $data['id']);
                  }else {
                        die('it didnt work');
                  }

            };

            if($post->user_id !== $_SESSION['user_id']) {
                  flash_msg('post_message', 'You cannot edit this post');
                  redirect('posts');
            }


            $data = [
                  'id' => trim(htmlspecialchars($post->id)),
                  'user_id' => trim(htmlspecialchars($post->user_id)),
                  'title' => trim(htmlspecialchars($post->title)),
                  'text' => trim(htmlspecialchars($post->text)),
                  'title_err' => '',
                  'text_err' => ''
            ];

            if(empty($data['title'])) {
                  $data['title_err'] = 'Please provide a title';
            }
            if(empty($data['text'])) {
                  $data['text_err'] = 'Please provide text'; 
            }
            if(!empty($data['title_err']) && !empty($data['text_err'])) {
                  redirect('posts/show/'. $data['id']);
            }    
                    
            $this->view('posts/edit', $data);
      }
      public function delete($post_id) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $post_user = $this->post_model->get_single_post($post_id);
                  if($_SESSION['user_id'] === $post_user->user_id){
                        if($this->post_model->delete($post_id)) {
                              flash_msg('post_message', 'Post has been successfully removed');
                              redirect('posts');
                        }else {
                              redirect('posts');
                        }
                  } else{
                        die('Something went wrong1');
                  }
            }
            $data = [];
            $this->view('posts/delete', $data);
      }
}
?>