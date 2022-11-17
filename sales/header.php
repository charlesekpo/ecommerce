<?php include_once "shared/constants.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ecommerce">
  <meta name="author" content="Charles Ekpo">

  <title><?php if (isset($page_title)){echo $page_title." | ".APP_NAME;} 
    if (isset($page_title1)){echo $page_title1." | ".APP_NAME;}
    if (isset($page_title2)){echo $page_title2." | ".APP_NAME;}

?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  
<style type="text/css">
.nav-link{ color:white;}
.nav-link:hover{
	color:grey;
}
</style>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg  fixed-top header-footer-bg" >
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php echo APP_NAME ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
		  
		   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Hot Sales
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="sales.php">Laptops</a>
              <a class="dropdown-item" href="sales.php">Phones</a>
              <a class="dropdown-item" href="sales.php">Wrist Watches</a>
            </div>
          </li>
          <li class="nav-item" style='background-color:yellow;margin-left:60px !important;'>
            <a class="nav-link" href="login.php" style="color:black !important">Login</a>
          </li>
           
         
        </ul>
      </div>
    </div>
  </nav>
