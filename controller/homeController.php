<?php


class homeController{

    public function index($page)
    {
        include('view/' . $page . '.php');
    }
}

?>