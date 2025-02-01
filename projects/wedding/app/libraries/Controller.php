<?php

class Controller {
      protected function model($model) 
      {
            if(!file_exists('../app/models/' . $model . '.php')) die('model does not exist');
            require_once "../app/models/" . $model . ".php";
            return new $model;
      }
      protected function view($view,$data) 
      {
            if(!file_exists('../app/views/' . $view . '.php')) die('this view does not exist');
            require_once '../app/views/' . $view . '.php';
      }
}
?>