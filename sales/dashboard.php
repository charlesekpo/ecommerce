<?php
include_once "portalheader.php";
?>

<!-- Page Content -->
  <div class="container" style='min-height:500px'>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <?php
if (isset($_SESSION['myrolename'])) {
  echo $_SESSION['myrolename'];
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
      ?>
      <small>Dashboard</small>
    </h1>
<h5 class="mb-3">
  <?php
if (isset($_SESSION['fname'])) {

  echo "You are Welcome <p class='text-primary lead'>".strToUpper($_SESSION['fname'])." ".strToUpper($_SESSION['lname'])."</p>";
}
  ?>
</h5>

		    <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-money" style='font-size:24px'></i>
                </div>
                <div class="mr-5">Transactions</div>
              </div>
              <a class="card-footer text-white clearfix small z-1">
              <form action="transactions.php?userid=<?php echo $_SESSION['user_id'] ?>" method="post">
                <input type="hidden" name='transactions' value="<?php echo $_SESSION['user_id']; ?>">
                <button type='submit' name='btntrans' class='btn text-white'>View All</button><span class="float-right mt-2">               
               <i class="fa fa-angle-right"></i>
               </span>
                </form>      
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
              <a class="card-footer text-white clearfix small z-1" href="">
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
                  <i class="fa fa-mobile"></i>
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
                  <i class="fa  fa-list"></i>
                </div>
                <div class="mr-5">Household Electronics</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                <span class="float-left">View All</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
		


  </div>
  <!-- /.container -->
  <?php

 include_once "portalfooter.php";

 ?>

