<?php
require_once "../app/config/config.php";
require_once APPROOT . "/helper/helper.php";
require_once APPROOT . "/helper/url_helper.php";
require_once APPROOT . "/helper/session_helper.php";




// autoload classes
spl_autoload_register(function($classname) 
{
      require_once "libraries/" . $classname . ".php";
})


?>