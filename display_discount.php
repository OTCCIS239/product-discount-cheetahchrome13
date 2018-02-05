
<?php
    //  get the passed array
    $coupons = [];
    if (!empty($_POST['discount_array'])) {
        $coupons = json_decode($_POST['discount_array'], true);
    }

    // prints array for troubleshooting
    // print_r($coupons);

    // get the data from the form
    $product_description = filter_input(INPUT_POST, 'product_description');
    $list_price = filter_input(INPUT_POST, 'list_price');
    $discount_percent = filter_input(INPUT_POST, 'discount_percent');
   
    $quantity = filter_input(INPUT_POST, 'quantity');
     
    // calculate the discount and discount price
    $subtotal = $list_price * $quantity;
    $discount = $subtotal * ($discount_percent / 100);
    $discount_price = $subtotal - $discount;
    
    //apply currency formatting to dollar and percent ammounts
    $list_price_f = "$".number_format($list_price, 2);
    $subtotal_f = "$".number_format($subtotal, 2);
    $discount_percent_f = $discount_percent."%";
    $discount_f = "$".number_format($discount, 2);
    $discount_price_f = "$".number_format($discount_price, 2);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <title>Product Discount Calculator</title>
    </head>
    <body>
        <div class="container" style="height: 100vh;" style="background: ivory;">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-sm"></div>
                <div class="col-sm-6">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header text-center font-weight-bold text-white bg-info mb-3">
                            Discount Calculator
                        </div>
                        <div class="card-body">
                            <ul class="row list-unstyled">
                                <li class="col-3 font-weight-bold">Description:</li>
                                <li class="col-9"><?= htmlspecialchars($product_description); ?></li>

                                <li class="col-6 font-weight-bold">List Price:</li>
                                <li class="col-6"><?= htmlspecialchars($list_price_f); ?></li>

                                <li class="col-6 font-weight-bold">Quantity:</li>
                                <li class="col-6"><?= htmlspecialchars($quantity); ?></li>

                                <li class="col-6 font-weight-bold">Subtotal:</li>
                                <li class="col-6"><?= htmlspecialchars($subtotal_f); ?></li>

                                <li class="col-6 font-weight-bold">Discount:<span class="font-weight-normal"><?= htmlspecialchars(" ".$coupons[$discount_percent]); ?></span></li>
                                <li class="col-6"><?= htmlspecialchars($discount_percent_f." - ".$coupons[$discount_percent]); ?></li>

                                <li class="col-6 font-weight-bold">Discount Amount:</li>
                                <li class="col-6"><?= $discount_f; ?></li>

                                <li class="col-6 font-weight-bold">Discount Price:</li>
                                <li class="col-6"><?= $discount_price_f; ?></li>
                            </ul>
                            <div class="text-center">
                                <a href="/" class="btn btn-info">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm"></div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>


