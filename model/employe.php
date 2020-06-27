<?php

class employe{

    private $username;
    private $email;
    private $fullName;
    private $find;
    
    public function __construct($username,$email,$fullName)
    {
        $this->username = $username;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function getusername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getName()
    {
        return $this->fullName;
    }
    
   static public function getAll()
    {
        $db = new db();
        $con = $db->connect();
        $stmt = $con->prepare('SELECT * FROM users');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt = null;
        return $data;
    }

     public function add()
    {
        $db = new db();
        $con = $db->connect();
       $stmt = $con->prepare('INSERT INTO users(username,email, fullName, status,date) VALUES (?,?,?,?,now())');
       $data = array($this->getusername(),$this->getEmail(),$this->getName(),0);
      $bol = $stmt->execute($data);
      $stmt = null;
      return $bol;
    }
    static public function find($search)
    {
       $db = new db();
       $con = $db->connect();
       $stmt = $con->prepare('SELECT * FROM users WHERE  fullName = ? ');
       $stmt->execute([$search]);
       $data = $stmt->fetchAll();
       $stmt = null;
       return $data;
    }

    static public function check($data)
    {
        $bool = false;
        $bool1 = false;
        $alert = '';
        $id;
        $db = new db();
       $con = $db->connect();
       $stmt = $con->prepare('SELECT * FROM users');
     $stmt->execute();
      $dt = $stmt->fetchAll();

      foreach ($dt as $value) {
         if($value['email'] == $data['email'])
         {
            $bool = true;
         }
         if($value['password'] == $data['password'])
         {
           $bool1 = true;
         }
         if($bool && $bool1)
         {
             $id = $value['ID'];
         }
      }

      if($bool && $bool1)
      {
        
          return true;

      }else{
        if(!$bool){
            $alert = 'the email is incorrect';
            session::add('error',$alert);
            redirect::to('index');
         }
         if(!$bool1)
         {
            $alert = 'the password is incorrect';
            session::add('error',$alert);
            redirect::to('index');
         }
         if(!$bool && !$bool){
           $alert = 'both email and password are incorrect';
           session::add('error',$alert);
           redirect::to('index'); 
         }
      }
      
    }
}

?>