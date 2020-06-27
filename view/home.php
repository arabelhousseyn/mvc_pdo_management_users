<?php

if(isset($_POST['find']))
{
  $search = $_POST['search'];
  filter_var($search,FILTER_SANITIZE_STRING);
  if(strlen($search) == 0)
  {
    session::add("error",'please entrer the name');
    redirect::to('index');
  }else{
    $e = new empController();
  $data = $e->found($search);
  }
}else{
$e = new empController();
$data = $e->getAllEmp();
}

?>
<div class="container">
<form action='index.php?sk=logout' method="post">
<input type="submit" value="logout" name='logout'>
</form>
<table style='margin-top:50px;' class="table">
<a class='btn btn-primary btn-sm' href="index.php?sk=insert">add</a>
<form  method="post">
<input type="search" name="search" id="search">
<input type="submit" value="search" name="find" class='btn btn-primary btn-sm'>
</form>
  <thead class="thead-dark">
    <tr>
      <th scope="col">username</th>
      <th scope="col">Email</th>
      <th scope="col">full name</th>
      <th scope="col">status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($data as $value) {
    ?>
    <tr>
      <td><?php echo $value['username']; ?></td>
      <td><?php echo $value['email']; ?></td>
      <td><?php echo $value['fullName']; ?></td>
      <td><?php 
      if($value['status'] == 0)
      {
        echo '<span style="color:green;">active</span>';
      }else{
        echo '<span style="color:red;">not active</span>';
      }
       ?></td>
      <td>
      <?php
      if($value['status'] != 0)
      {
          ?>
          <a class='btn btn-info btn-sm' href="index.php?sk=update&id=<?php echo $value['ID'];?>">activate</a>
          <?php
      }
      ?>
      <a class='btn btn-success btn-sm' href="index.php?sk=update&id=<?php echo $value['ID'];?>">update</a>
      <a class='btn btn-danger btn-sm' href="index.php?sk=delete&id=<?php echo $value['ID'];?>">delete</a>
      </td>
    </tr>
    <?php
}
?>
  </tbody>
</table>
</div>