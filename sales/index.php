<?php
$page_title= "Home";
include_once "header.php";


?>
 <!-- Page Content -->
 <div class="container">

<div class="jumbotron mt-3">
<h1 class="display-4">Welcome to Electronic Stores</h1>
<p class="lead">Our 21st Century Online App just made life easier for you:</p>

<div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-users" style='font-size:24px'></i>
                </div>
                <div class="mr-5">Laptops</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="admin.html">
                <span class="float-left">View All</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-list"></i>
                </div>
                <div class="mr-5">Wrist watches</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="report.html">
                <span class="float-left">View All</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-comment"></i>
                </div>
                <div class="mr-5">Phones</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">View All</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa  fa-ban"></i>
                </div>
                <div class="mr-5">Household Electronics</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">View </span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

<hr class="my-4">
<p class='text-primary'>Register online to receive our hot sales notifications</p>
<a class="btn btn-success btn-lg" href="signup.html" role="button">Sign Up Now</a>
</div>
</div>

<?php
include_once "footer.php";
?>