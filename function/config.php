<?php
$con = mysqli_connect('localhost', 'root', '', 'veracrochet'); // Add the database password and name

$address = "SELECT * FROM address";
$users = "SELECT * FROM users";

// require_once "../stripe-php-master/init.php";

// $stripedetails = array(
   // "publishableKey" => "pk_test_51NM68UEpih27WVSpKlIt5dTZB9kigdv9OprSTqLUkMlERosE3OhGoQr4ZosOczWKYPZdLM1gtTYgHJnRnlcof23h00haIaWxYV",
   // "secretKey" => "sk_test_51NM68UEpih27WVSpEh3i8ja91aL6BrznfHQliuBVda1V2Sg2g1HD82DwYsVaOsuHvJcE8Zj0b9FxCCeIP2uvxnrN00n5cDljBb"
//);

// \Stripe\Stripe::setApiKey($stripedetails["secretKey"]);
?>
