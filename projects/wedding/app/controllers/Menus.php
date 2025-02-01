<?php

Class Menus extends Controller 
{
      protected $visitor_model;
      protected $menu_model;

      public function __construct()
      {
            $this->visitor_model = $this->model('visitor');
            $this->menu_model = $this->model('menu');
      }
      public function menu()
      {
            if(empty($_SESSION)) redirect('pages');

            $visitor_has_menu = $this->menu_model->has_menu($_SESSION['visitor_id']);

            if($visitor_has_menu) 
            {
                  $this->view('menus/has_menu', $_SESSION);
            } 
            else
            {
                  $this->view('menus/menu',$_SESSION);
            }
      }
      public function register_menu($menu_confirmed=false)
      {
            if($this->menu_model->has_menu($_SESSION['visitor_id'])) $this->view('menu/has_menu', $_SESSION);

            if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST))
            {
                  set_session(sanitise($_POST));
                  $this->view('menus/menu_confirmation', $_SESSION);
                  return;
            } 
            if($_SERVER['REQUEST_METHOD'] === "GET" && !empty($_GET))
            {
                  if($menu_confirmed)
                  {
                        $data = $_SESSION;
 
                        if($this->menu_model->register_menu_db($_SESSION)=== true)
                        {
                              $this->view('menus/menu_submitted', $data);
                              return;
                        }
                        die("something went wrong");
                  }
            }
      }
      public function edit_menu()
      {
            if(!isset($_SESSION) || empty($_SESSION)) redirect('/');
            $menu = $this->menu_model->get_menu($_SESSION['visitor_id']);

            if(!empty($menu))
            {
                  set_session(sanitise($menu));

                  if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST))
                  {
                        set_session(sanitise($_POST));
                        if($this->menu_model->edit_menu_db($_SESSION))
                        {
                              flash_msg("menu_edited", "Menu has been successfully changed");
                              $this->view('menus/menu_submitted', $_SESSION);
                              return;
                        }else 
                        {
                              flash_msg("menu_edited", "Failed to edit your menu","danger");
                              $this->view('menus/menu_submitted', $_SESSION);
                              return;

                        }
                        die("something went wrong");
                  }

                  $this->view('menus/menu', $_SESSION);
            }

      }
}
?>
