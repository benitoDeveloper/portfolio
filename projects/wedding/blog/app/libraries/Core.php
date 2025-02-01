<?php

/*
-- this will take at the url and pull out the different parts of it 
-- it will create an array from them 
-- then it will decide what to load as a controller, what to load as a method and what to load as as parameter 

*/

class Core 
{
      protected $current_controller = 'Pages';
      protected $current_method = 'index';
      protected $parameters = [];

      public function __construct()
      {
            $url= $this->get_url();

            if(file_exists('../app/controllers/' . $url[0] . '.php')){
                  $this->current_controller = ucwords($url[0]);
                  unset($url[0]);
            }
            
            require_once('../app/controllers/' . $this->current_controller . '.php');

            $this->current_controller = new $this->current_controller;

            if(isset($url[1]) && method_exists($this->current_controller, $url[1])){
                  $this->current_method = $url[1];
                  unset($url[1]);
            }
            $this->parameters = $url? array_values($url) : [];
            // var_dump($this->current_controller);
            // var_dump($this->current_method);

            call_user_func_array([$this->current_controller, $this->current_method],$this->parameters);

      }

      protected function get_url() {
            $url = isset($_GET['url'])? rtrim($_GET['url']) : ['nothing'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
      }
}



?>