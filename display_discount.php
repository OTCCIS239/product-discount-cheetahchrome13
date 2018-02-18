<?php
require_once('./database.php');

//
$productId = $_POST['product_id'];
$couponId = $_POST['coupon_id'];

// // These statements are replaced by method
// // getOne() and a method call for each table index
// $query = "SELECT * FROM products WHERE id = :product_id";
// $statement = $conn->prepare($query);
// $statement->bindValue(':product_id', $productId);
// $statement->execute();
// $product = $statement->fetch();
// $statement->closeCursor();
// $query = "SELECT * FROM coupons WHERE id = :coupon_id";
// $statement = $conn->prepare($query);
// $statement->bindValue(':coupon_id', $couponId);
// $statement->execute();
// $coupon = $statement->fetch();
// $statement->closeCursor();

// Creates an array using the method getOne() 
// Args: a mySQL query, an index - key/value, and the db connection
$product = getOne("SELECT * FROM products WHERE id = :product_id", 
    [':product_id' => $productId], $conn);
$coupon = getOne("SELECT * FROM coupons WHERE id = :coupon_id",
    [':coupon_id' => $couponId], $conn);

// pull data from the array
$description = $product['description'];
$price = $product['price'];
$discount = $coupon['discount_percent'];
$discountAmount = $price * ($discount / 100);
$total = $price - $discountAmount;

// format data
$price_f = "$".number_format($price, 2);
$discount_f = $discount."%";
$discountAmount_f = "$".number_format($discountAmount, 2);
$total_f = "$".number_format($total, 2);
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
  <div class="container" style="height: 100vh;">
    <div class="row align-items-center" style="height: 100%;">
        <div class="col-sm"></div>
        <div class="col-sm-6">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header text-center font-weight-bold text-white bg-info mb-3">
                    Discount Calculator
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-6">Description</dt>
                        <dd class="col-6"><?= $description ?></dd>

                        <dt class="col-6">List Price</dt>
                        <dd class="col-6"><?= $price_f ?></dd>

                        <dt class="col-6">Coupon</dt>
                        <dd class="col-6"><?= $coupon['code'] ?> - <?= $coupon['description'] ?></dd>

                        <dt class="col-6">Discount</dt>
                        <dd class="col-6"><?= $discount_f ?></dd>

                        <dt class="col-6">Discount Amount</dt>
                        <dd class="col-6"><?= $discountAmount_f ?></dd>

                        <dt class="col-6">Discount Price</dt>
                        <dd class="col-6"><?= $total_f ?></dd>
                    </dl>
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