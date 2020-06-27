<?php

class session{
   static public function add($type,$msg)
    {
        setcookie($type,$msg,time() + 2,"/");
    }
}

?>