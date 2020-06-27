<?php


class redirect{
    public function to($ind)
    {
        header('Location: '.$ind.'.php');
    }
}

?>