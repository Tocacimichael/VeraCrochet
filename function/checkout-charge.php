<?php
use \stripe\Charge;

include("./config.php");

$token = $_POST["stripeToken"];
$contact_name = $_POST["first_name"];
$token_card_type = $_POST["stripeTokenType"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$amount = $_POST["total_price"];
$desc  = $_POST["title"];
$charge = \Stripe\Charge::create([
    'amount' => $amount * 10,
    'description' => $desc,
    'currency' => 'EUR',
    'source' => $token,
]);
if ($charge) {
    header("Location: checkout-success.php?amount=$amount");
}

?>