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
      ?>
      <small>Transaction Status</small>
    </h1>
<h5 class="mb-3">
  <?php
if (isset($_SESSION['fname'])) {

  echo "Welcome ".$_SESSION['fname']." ".$_SESSION['lname'];
}
  ?>
</h5>
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-success">
                <h2>Transaction Successful</h2>
                <p>Payment Completed</p>
            </div>
        </div>
    </div>
       
		
		
	<!-- /.row -->

  </div>
  <!-- /.container -->
  <?php

 include_once "portalfooter.php";

 ?>

