<?php

/*
-- every controller that you create it will extend this class
-- model method - require $model class
*/

class Controller 
{
      public function model($model)
      {
            if(!file_exists("../app/models/" . $model . ".php")) die("model does not exist");
            require_once "../app/models/" . $model . ".php";
            return new $model;
      }
      public function view($view, $data)
      {
            if(!file_exists("../app/views/" . $view . ".php")) die("view does not exist");
            require_once "../app/views/" . $view . ".php";
      }
}

?>