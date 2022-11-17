<?php
$page_title2= "Login";
include_once "header.php";

if (isset($_REQUEST['btnlogin'])) {
  $errors=[];

  if (empty($_REQUEST['username'])) {
   $errors[]="username field cannot be empty";
  }
  if (empty($_REQUEST['pwd'])) {
    $errors[]="password field cannot be empty";
   }
if (empty($errors)) {
// add user class

include_once "shared/class_user.php";
//create instance of user class

$userobj= new User();
//reference to login method
$output=$userobj->login($_REQUEST['username'],$_REQUEST['pwd']);

if ($output===false) {
  $errors[]= "invalid username or password";
}else {
  header("Location: dashboard.php");
  exit;
}
 
}

}

?>
 <!-- Page Content -->
 <div class="container">

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3 text-center">
  <small>Login</small>
</h1>



<div class="row" style='min-height:400px;'>
  <div class="col-lg-8 col-md-8  offset-md-2 offset-lg-2 col-sm-12">
  <?php
if (isset($errors)) {
  foreach ($errors as $key => $value) {
    echo "<div style='color:red'>$value</div>";
  }
  if (isset($_REQUEST['notice'])) {
    echo "<div style='color:red'>".$_REQUEST['notice']."</div>";
  }
}
?>
     <form action='' method="post">
<div class="form-group">
<label for="exampleInputEmail1">Username</label>
<input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" name='pwd' class="form-control" id="exampleInputPassword1">
</div>

<button type="submit" class="btn btn-info btn-block" id="btnlogin" name="btnlogin">Login</button>
</form>
  </div> 
  
</div>

</div>
<!-- /.container -->


<?php

include_once "footer.php";

?>