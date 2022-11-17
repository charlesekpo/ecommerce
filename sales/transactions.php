<?php  

include_once "portalheader.php";

if(isset($_REQUEST['btntrans'])){

    include_once "shared/payment.php"; 

 

   $pay = new Payment();
   $buys = $pay->viewPayments($_REQUEST['transactions']);


    // echo "<pre>";
    // print_r($buys);
    // echo "</pre>";
?>
    <div class="row">
        <div class="col">
            <table class='table table-striped' border='2'>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Amount</th>
                        <th>Qty</th>
                        <th>Transaction Ref</th>
                        <th>Payment Mode</th>
                        <th>Payment Status</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $kounter = 0;
                    foreach ($buys as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo ++$kounter; ?></td>
                                <td><img src="<?php echo $value['imageurl']; ?>" alt="Product Image"></td>
                                <td><?php echo $value['product_name']; ?></td>
                                <td><?php echo $value['price']; ?></td>
                                <td><?php echo $value['qty']; ?></td>
                                <td><?php echo $value['trans_reference']; ?></td>
                                <td><?php echo $value['paymentmode']; ?></td>
                                <td><?php echo $value['paymentstatus']; ?></td>
                            </tr>

                      <?php
                    }
                    
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
}
include_once "portalfooter.php";
?>
