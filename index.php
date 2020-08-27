<?php

use Core\Router;

spl_autoload_register(function($class){
   $path = str_replace('\\','/',$class . '.php');
   if(file_exists($path))
   {
       include $path;
   }
});

$router = new Router();
$router->run();
