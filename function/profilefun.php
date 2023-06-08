<?php
// Include your database connection file
@include './config.php';

// Function to fetch user data
function getUserData()
{
    global $con;

    $userData = array();

    // Fetch user data from the database
    $userQuery = mysqli_query($con, "SELECT * FROM users");
    $user = mysqli_fetch_assoc($userQuery);

    // Fetch address data from the database
    $addressQuery = mysqli_query($con, "SELECT * FROM address");
    $address = mysqli_fetch_assoc($addressQuery);

    // Store user and address data in the array
    $userData['user'] = $user;
    $userData['address'] = $address;

    return $userData;
}

// Function to update address
function updateAddress($streetName, $postalCode, $city)
{
    global $con;

    // Update the address in the database
    $query = "INSERT INTO address (street_name, postal_code, city) VALUES ('$streetName', '$postalCode', '$city')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Address updated successfully
        $notification = "Address added successfully";

            // Redirect back to the profile page after updating
        header('Location: ./profile.php');
    } else {
        // Failed to update address
        $notification = "Failed to add address";
    }

    // Store the notification in a session variable
    session_start();
    $_SESSION['notification'] = $notification;

    // Redirect back to the profile page after updating
    header('Location: ./function/profile.php');
    exit;
}

// Handle form submission for address update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $streetName = $_POST['street_name'];
    $postalCode = $_POST['postal_code'];
    $city = $_POST['city'];

    updateAddress($streetName, $postalCode, $city);
}
?>
