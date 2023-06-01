<?php
@include './function/config.php'
?>

<?php
session_start();


// Check if the cart is already stored in the session, if not, initialize an empty array
if (!isset($_SESSION['products'])) {
$_SESSION['cart'] = array();
}

// Function to add a product to the cart
function addToCart($product_id, $quantity) {
// Check if the product already exists in the cart, if yes, update the quantity
if (isset($_SESSION['cart'][$product_id])) {
$_SESSION['cart'][$product_id] += $quantity;
} else {
// Otherwise, add the product to the cart with the specified quantity
$_SESSION['cart'][$product_id] = $quantity;
}
}

// Check if the product ID is provided in the request
if (isset($_POST['product_id'])) {
$product_id = $_POST['product_id']; // Get the product ID from the request
$quantity = 1; // Default quantity

// Call the addToCart() function with the product ID and quantity
addToCart($product_id, $quantity);

 header('Location: ../cart.php'); // Redirect to the cart page
 exit();
}
?>