<!-- Student dev: Justin Mangan
     Project: Product Discount
     Date: 18 February 2018-->

<?php
require_once('./database.php');

// // These statements are replaced by method
// // getMany() and a method call for each table
// $query = "SELECT * FROM products WHERE in_stock > 0";
// $statement = $conn->prepare($query);
// $statement->execute();
// $products = $statement->fetchAll();
// $statement->closeCursor();
// $query = "SELECT * FROM coupons WHERE deleted_at IS NULL";
// $statement = $conn->prepare($query);
// $statement->execute();
// $coupons = $statement->fetchAll();
// $statement->closeCursor();

// Creates an array using the method getMany() 
// Args: a mySQL query, a self-named empty array, and the db connection
$products = getMany("SELECT * FROM products WHERE in_stock > 0", [], $conn);
$coupons = getMany("SELECT * FROM coupons WHERE deleted_at IS NULL", [], $conn);
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
                    <form action="display_discount.php" method="post">
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <?php foreach($products as $product): ?>
                                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?> - $<?= $product['price'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="coupon_id">Discount</label>
                            <select name="coupon_id" id="coupon_id" class="form-control">
                                <?php foreach($coupons as $coupon): ?>
                                    <option value="<?= $coupon['id'] ?>"><?= $coupon['code'] ?> - <?= $coupon['discount_percent'] ?>% Off</option>
                                <?php endforeach; ?>
                            </select>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>