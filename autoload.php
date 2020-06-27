<?php
session_start();

spl_autoload_register(function($class){
   $paths = array(
       'app/classes/',
       'controller/',
       'database/',
       'model/',
       'view/includes/'
   );
   foreach ($paths as $path) {
      $file = $path . $class . '.php';
      if(file_exists($file))
      {
          include ($file);
      }
   }
});
