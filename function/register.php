<?php
// Include the config file for database connection
@include 'function/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = $_POST['user_id'];


    // Perform any necessary validation or sanitization on the input data

    // Insert the new user into the database
    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Registration success
        echo "Registration successful!";
        header('Location: login.php');
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }   


}
?>
