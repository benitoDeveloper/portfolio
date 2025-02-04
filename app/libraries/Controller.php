<?php

class Controller
{
      public function model($model)
      {
            // var_dump(APPROOT . "models/" . $model . ".php");
            // return;
            if(file_exists(APPROOT . "models/" . $model . ".php"))
            {
                  require_once(APPROOT . "models/" . $model . ".php");
                  return new $model;
            }
            else
            {
                  die("this model does not exist");
            }
      }

      public function view($view, $data=[])
      {
            // var_dump(APPROOT . "views/" . $view . ".php");
            // return;
            if(file_exists(APPROOT . "views/" . $view . ".php"))
            {
                  require_once(APPROOT . "views/" . $view . ".php");
            }else 
            {
                  die("view does not exists");
            }
      }
}
?>