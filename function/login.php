<?php
// Include the config file for database connection
@include '../function/config.php';

// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Get the entered email and password
    $email = $_POST['email'];
    $password = $_POST['passwords'];

    // Validate the credentials by querying the database
    $query = "SELECT * FROM users WHERE email = '$email' AND passwords = '$password'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Redirect to the profile page after successful login
        header('Location: ../profile.php');
        exit;
    } else {
        // Display an error message
        echo '<div class="alert alert-danger">Invalid email or password!</div>';
    }
}
?>
