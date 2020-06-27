<?php
$us = new userController();
$us->login();
?>

<div class="container">
<form style='margin-top:50px;' method='post'>
  <div class="form-group">
    <label for="em">Email address</label>
    <input type="email" class="form-control" id="em" name='em' aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" name='pass' placeholder="Password">
  </div>

  <button type="submit" name='login' class="btn btn-primary">Submit</button>
</form>
</div>