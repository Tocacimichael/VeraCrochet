<?php
// Include the config file for database connection
@include 'config.php';

// Function to process checkout
function processCheckout($name, $address, $phone, $cartData)
{
    global $con;

    // Insert user data into the users table
    $query = "INSERT INTO users (first_name, last_name, email) VALUES ('', '', '', '')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        // Failed to insert user data
        return false;
    }

    // Get the user ID of the inserted record
    $userId = mysqli_insert_id($con);

    // Insert address data into the address table
    $query = "INSERT INTO address (id, street_name, postal_code, city) VALUES ('$userId', '$address', '', '')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        // Failed to insert address data
        return false;
    }

    // Insert cart data into the cart table
    foreach ($cartData as $item) {
        $productId = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        $query = "INSERT INTO cart (user_id, product_id, quantity, price) VALUES ('$userId', '$productId', '$quantity', '$price')";
        $result = mysqli_query($con, $query);
        if (!$result) {
            // Failed to insert cart data
            return false;
        }
    }

    return true;
}

// Check if the checkout form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Assuming the cart data is passed as an array in the POST request
    $cartData = $_POST['cart'];

    // Process the checkout
    $success = processCheckout($name, $address, $phone, $cartData);

    if ($success) {
        // Checkout successful, redirect to a success page
        header('Location: checkout-success.php');
        exit;
    } else {
        // Checkout failed, redirect to an error page or display an error message
        header('Location: checkout-error.php');
        exit;
    }
}
?>
