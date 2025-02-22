<?php
require_once "config/config.php";
require_once "helpers/url_helper.php";

// substituted all the require statements (files from libraries) with an autoloader
spl_autoload_register(function($classname)
{
      require_once 'libraries/' . $classname . '.php';
})


?>