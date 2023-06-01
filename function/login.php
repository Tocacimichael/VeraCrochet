<?php
@include '../function/config.php'
?>

<?php
    // Check if the login form is submitted
    if(isset($_POST['login'])) {
        // Get the entered username and password
        $username = $_POST['email'];
        $password = $_POST['passwords'];

        // Validate the credentials (you can modify this part according to your requirements)
        if($username === 'email' && $password === 'passwords') {
            // Redirect to the profile page after successful login
            header('Location: profile.php');
            exit;
        } else {
            // Display an error message
            echo '<div class="alert alert-danger">Invalid username or password!</div>';
        }
    }
?>