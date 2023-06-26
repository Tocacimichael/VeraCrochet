<?php
require 'config.php';

// Function to fetch user data 
if (!function_exists('getUserData')) {
    function getUserData()
    {
        global $con;

        $userQuery = mysqli_query($con, "SELECT * FROM users");
        $user = mysqli_fetch_assoc($userQuery);

        $addressQuery = mysqli_query($con, "SELECT * FROM address");
        $address = mysqli_fetch_assoc($addressQuery);

        
        return [
            'users' => $user,
            'address' => $address
        ];
    }
}

// Function to update address
if (!function_exists('updateAddress')) {
    function updateAddress($streetName, $postalCode, $city)
    {
        global $con;

        $existingAddressQuery = mysqli_query($con, "SELECT * FROM address");
        $existingAddress = mysqli_fetch_assoc($existingAddressQuery);

        $query = $existingAddress
            ? "UPDATE address SET street_name = '$streetName', postal_code = '$postalCode', city = '$city'"
            : "INSERT INTO address (street_name, postal_code, city) VALUES ('$streetName', '$postalCode', '$city')";

        $result = mysqli_query($con, $query);

        $notification = ($result) ? "Address updated successfully" : "Failed to update address";

        session_start();
        $_SESSION['notification'] = $notification;

        header('Location: #');
        exit();
    }
}

// Handle form submission for address update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $streetName = $_POST['street_name'] ?? '';
    $postalCode = $_POST['postal_code'] ?? '';
    $city = $_POST['city'] ?? '';

    updateAddress($streetName, $postalCode, $city);
}
?>
