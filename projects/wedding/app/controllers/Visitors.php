<?php

class Visitors extends Controller 
{
      protected $visitor_model;
      protected $menu_model;
      public function __construct()
      {
            $this->visitor_model = $this->model('visitor');
            $this->menu_model = $this->model('menu');

      }
      public function index() 
      {
          var_dump('hola');
          return;
            if($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) redirect('pages');
            $data = sanitise($_POST);
            set_session($data);

            if($this->visitor_model->is_registered($data['email']))
            {
                  set_session(null, $this->visitor_model->get_visitor_id($data['email']));

                  redirect('visitors/existing');
                  return;
            }
            if($this->visitor_model->register_visitor($data) === true)
            {
                  if($data['attendance'] === 'not_attend')
                  {
                        $this->view('visitors/not_attend', $data); 
                        return;
                  }
                  redirect('menus/menu');
            }
      }
      public function edit_attendance($status = false)
      {
            if(!isset($_SESSION)) session_start();
            $data = $_SESSION;
            $this->view('visitors/edit_attendance',$data);

      }
      public function edit_process() 
      {
            if(!isset($_SESSION)) session_start();
            $data = $_SESSION;

            if(!$this->visitor_model->is_registered($data['email'])) redirect('pages');
            set_session(sanitise($_POST));
            $_SESSION['visitor_id'] = $this->visitor_model->get_visitor_id($data['email']);

            if($this->visitor_model->edit_visitor($data))
            {
                  flash_msg("visitor_msg", "your details have been updated", "success");
                  redirect('visitors/existing', $_SESSION);
            }
            else 
            {
                  flash_msg("visitor_msg", "something went wrong: failed to update record", "danger");
                  redirect('visitors/existing', $_SESSION);
            }
      }
      public function existing()
      {
            $data = $_SESSION;
            $this->view('visitors/existing',$data);
      }
      public function not_attend()
      {
            $data = $_SESSION;
            $this->view('visitors/not_attend',$data);
      }
}
?>