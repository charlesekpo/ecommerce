<?php include_once "portalheader.php"; ?>
<div class="container" style="min-height:500px">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <h2>Confirm Order</h2>
                <?php
                // echo "<pre>";
                // print_r($_REQUEST);
                // echo "</pre>";

                if(isset($_REQUEST['btnsales'])){
                ?>

                    <img src="<?php echo $_REQUEST['productimage'];?>" alt="product image" style="width:200px;">
                    <h6>
                        <?php echo $_REQUEST['productname']; ?>
                    </h6>
                    <h6>
                       &#8358; <?php echo number_format($_REQUEST['ammount'], 2) ?>
                    </h6>

                    <form method="post" action="paystack_init.php">
                        <input type="hidden" name="ammount" value="<?php echo $_REQUEST['ammount']; ?>">
                        <input type="hidden" name="productid" value="<?php echo $_REQUEST['productid']; ?>">
                        <input type="submit" value="Pay with Paystack" name="btnpay" class="btn btn-success">
                    </form>

                <?php
                }
                ?>

        </div>
    </div>
</div>

<?php include_once "portalfooter.php"; ?>