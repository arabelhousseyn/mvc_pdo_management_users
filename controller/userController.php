<?php


class userController{
    static public function login()
    {
        if(isset($_POST['login']))
        {
            $email = $_POST['em'];
            $password = $_POST['pass'];
            filter_var($email,FILTER_SANITIZE_STRING);
            filter_var($password,FILTER_SANITIZE_STRING);
            if(strlen($email) == 0 || strlen($password) == 0)
            {
                session::add('error','please fill all the information');
                redirect::to('index');
            }else{
               $password = sha1($password);
              $data = array('email'=>$email,'password'=>$password);
               $ch = employe::check($data);
               if($ch)
               {
                $_SESSION['username'] = $email;
                $_SESSION['id'] = $id;
                redirect::to('index');
               }
            }
        }
    }
    static public function logout()
    {
        if(isset($_POST['logout']))
        {
            session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        exit;
        }
    }
}

?>