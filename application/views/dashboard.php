<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <h1>Dashboard</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5" >
                <p>All active and verified users : <?php echo $users['activevarified']->num_rows(); ?></p>
                <p>All active and verified users with active products: <?php echo $users['attachedproducts']->num_rows(); ?></p>
                <p>All active products: <?php echo $product['allactiveproducts']->num_rows(); ?></p>
                <p>Products Not belong to any User: <?php echo $product['notattachedproduct']->num_rows(); ?></p>
                <p>Amount of all active attached products: <?php echo $product['amountactiveattachedproduct']->row()->totalqty; ?></p>
                <p>Summarized price of all active attached products: <?php echo '$'.$users['summarizedPrice']->row()->pricesum; ?></p>
                <p>Summarized prices of all active products per user: <?php foreach($users['productperuser']->result() as $psu){
                 ?>   <span><?php echo $psu->name. " ".'- $'. $psu->psum; ?></span>
                <?php } ?></p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>