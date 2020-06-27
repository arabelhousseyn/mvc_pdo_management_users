<?php
$ee = new empController();
$test = $ee->addEmp();

if($test == 1)
{
  header('Location: index.php?sk=insert');
}

?>
<div class="container">
<form  method="post">

  <div class="form-group">
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name='username' placeholder="username">
  </div>
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="name">full name</label>
    <input type="text" class="form-control" id="name" name='name' placeholder="name">
  </div>
  <input type="submit" value="add" name='insert' class='btn btn-primary btn-lg'>
 
</form>
</div>