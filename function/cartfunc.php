<?php
session_start();
include 'function/config.php';

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

// Function to remove a product from the cart
function removeFromCart($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] <= 0) {
            unset($_SESSION['cart'][$product_id]);
        }
    }
}

// Check if the product ID and quantity are provided in the request
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id']; // Get the product ID from the request
    $quantity = $_POST['quantity']; // Get the quantity from the request

    // Call the addToCart() function with the product ID and quantity
    addToCart($product_id, $quantity);

    header('Location: cart.php'); // Redirect to the cart page
    exit();
}

// Check if the product ID is provided in the request to remove from cart
if (isset($_POST['remove_product_id'])) {
    $remove_product_id = $_POST['remove_product_id']; // Get the product ID from the request

    // Call the removeFromCart() function with the product ID
    removeFromCart($remove_product_id);

    header('Location: cart.php'); // Redirect to the cart page
    exit();
}

// Retrieve the cart from the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// Fetch product details from the database based on the product IDs in the cart
$product_ids = array_keys($cart); // Get the product IDs from the cart
$products = array(); // Array to store the product details

if (!empty($product_ids)) {
    $product_ids_str = implode(',', $product_ids); // Create a comma-separated string of product IDs
    $query = "SELECT * FROM products WHERE id IN ($product_ids_str)";
    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $products[$product_id] = $row;
        }
    }
}
?>