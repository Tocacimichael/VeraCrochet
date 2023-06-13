<?php
@include 'config.php';

// Check if the payment was successful
$paymentSuccessful = true; // Assuming the payment was successful

if ($paymentSuccessful) {
    // Process the order and update the database
    // Replace the following lines with your specific order processing logic

    // Insert order details into the database
    $sql = "INSERT INTO orders (title, quantity, total_amount, price, order_date) VALUES ('', '', '', '', '')";
    if ($con->query($sql) === true) {
        $orderId = $con->insert_id;
        echo "Thank you for your purchase! Your order (ID: $orderId) has been successfully processed.";

    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    // Display error message to the user
    echo "Sorry, there was a problem with your payment. Please try again later.";
}        
    header('Location: ../profile.php');
        exit;
?>
