<?php
ob_start();
include ('view/includes/header.php');
require 'autoload.php';
$hm = new homeController();

if(isset($_SESSION['username']))
{
    $sk = (isset($_GET['sk'])) ? $sk = $_GET['sk'] : $sk = '';
    $id = (isset($_GET['id'])) ? $id = $_GET['id'] : $id = '';
    $sk = filter_var($sk,FILTER_SANITIZE_STRING);
    $pages = array('home','insert','update','delete','logout');
    
    if(!empty($sk))
    {
        if(in_array($sk,$pages))
        {
            $hm->index($sk);
        }else{
            include('view/includes/404.php');
        }
    }else{
        $hm->index('home');
    }
}else{
  
    include('view/login.php');
}

include ('view/includes/alerts.php');


