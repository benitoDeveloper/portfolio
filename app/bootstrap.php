<?php
require_once "config/config.php";

// substituted all the require statements (files from libraries) with an autoloader

spl_autoload_register(function($classname)
{
      require_once 'libraries/' . $classname . '.php';
})

?>