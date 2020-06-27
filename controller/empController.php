<?php

class empController{
    public function getAllEmp()
    {
      $data = employe::getAll();
      return $data;
    }
    public function found($search)
    {
      $st = $search;
      $data = employe::find($st);
      return $data;
    }


    public function addEmp()
    {
      if(isset($_POST['insert']))
      {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        filter_var($username,FILTER_SANITIZE_STRING);
        filter_var($email,FILTER_VALIDATE_EMAIL);
        filter_var($name,FILTER_SANITIZE_STRING);
        $emp = new employe($username,$email,$name);
        session::add('success','employer added');
        return $emp->add();
      }
    }
}


?>