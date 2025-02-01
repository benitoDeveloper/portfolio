<?php
class Pages extends Controller
{
      protected $post_model;
      public function __construct()
      {
            $this->post_model = $this->model('post');

      }


      public function index()
      {
            // if(is_logged_in()) {
            //       redirect('pages/index');
            // }
            $data=
            [
                  'title'=>'this is INDEX',
                  'posts'=> $this->post_model->get_posts()
            ];
            $this->view("pages/index",$data);
      }
      public function about()
      {
            $data=['title'=>'this is ABOUT'];
            $this->view('pages/about',$data);
      }
}
?>