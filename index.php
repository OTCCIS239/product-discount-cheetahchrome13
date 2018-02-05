
<?php
    // these arrays would have more logical means of access if they were two-dimensional
    $products = [
        "Banded Agate Cabochon - oval 30mm x 20mm " => 10,
        "Black Star Sapphire Cabochon - round 5mm" => 29.99,
        "Blue Jade Cabochon - rect. 30mm x 20mm" => 35.00,
        "Chevron Amethyst Cabochon - oval 45mm x 30mm" => 20,
        "Hubei Turquoise Cabochon - rect. 35mm x 22mm" => 25.99,
        "Purple Star Ruby Cabochon - round 9mm" => 21.99
    ];

    $coupons = [
        0 => "None",
        10 => "New Customer",
        15 => "Student",
        20 => "Instructor",
        25 => "Senior Citizen"
    ];
    
    // used to pass the coupons array to display_discount.php via _POST
    $pass_coupons = json_encode($coupons);
?>

<!-- copies php products array to a JavaScript global variable for discount.js access--> 
<script> var products = <?php echo json_encode($products); ?>; </script>
    
<!--HTML -->

<!DOCTYPE html>
<html lang="en">
  <head>
<!--Student dev: Justin Mangan
    Date: 1.29.2018 -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Product Discount Calculator</title>
  </head>
    <body onload="setInitialValues()">
        <div class="container" style="height: 100vh;">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-sm"></div>
                <div class="col-sm-6">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header text-center font-weight-bold text-white bg-info mb-3">
                            Discount Calculator
                        </div>
                        <div class="card-body">
                            <form action="display_discount.php" method="post">
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <select id="name" name="product_description" class="form-control" onchange="updatePrice()">
                                        <?php foreach($products as $name => $price): ?>
                                        <option value="<?= $name ?>"><?= $name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
        
                                <div class="form-group">
                                    <label for="price">List Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input id="price" type="text" class="form-control" name="list_price" value="" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">each</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <div class="input-group">
                                        <input id="qty" type="text" class="form-control" name="quantity">
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <select name="discount_percent" class="form-control">
                                        <?php foreach($coupons as $percent => $label): ?>
                                            <option value="<?= $percent ?>"><?= $percent ?>% <?= $label ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <!-- pass array to display_discount.php
                                    NOTE THE USE OF SINGLE QUOTES FOR VALUE -->
                                    <input type='hidden' name='discount_array' value='<?= $pass_coupons ?>'/>
                                    
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-info text-center">Calculate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm"></div>
            </div>
        </div>
         
        <!-- external JavaScript for this app -->
        <script src="discount.js"></script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>