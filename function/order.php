<?php
require './function/config.php';

// Function to get orders for the logged-in user
function getOrdersForLoggedInUser()
{
    global $con;

    // Get the user ID from the session (Assuming you have the user ID stored in the session)
    $userId = $_SESSION['user_id'];

    // Fetch orders for the logged-in user
    $query = "SELECT * FROM orders WHERE user_id = $userId";
    $result = mysqli_query($con, $query);

    $orders = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }

    return $orders;
}

// Function to get user's address
function getUserAddress()
{
    global $con;

    // Get the user ID from the session (Assuming you have the user ID stored in the session)
    $userId = $_SESSION['user_id'];

    // Fetch user's address
    $query = "SELECT * FROM address WHERE user_id = $userId";
    $result = mysqli_query($con, $query);

    return mysqli_fetch_assoc($result);
}

// Check if the address update form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have form fields with the following names: street_name, postal_code, city
    $streetName = $_POST['street_name'];
    $postalCode = $_POST['postal_code'];
    $city = $_POST['city'];

    updateAddress($streetName, $postalCode, $city);
}

?>
