<?php
    // Check if the register form is submitted
    if(isset($_POST['register'])) {
        // Get the entered first name, last name, email, and password
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['passwords'];

        // Establish a database connection (modify the credentials as per your database configuration)
        $servername = "localhost";
        $username = "MichaelT";
        $password = "Lol1300?!";
        $dbname = "veracrochet";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL statement to insert the data into the table (modify the table and column names as per your database structure)
        $sql = "INSERT INTO users (first_name, last_name, email, passwords) VALUES ('$firstName', '$lastName', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Display a success message
            echo '<div class="alert alert-success">Registration successful!</div>';

            // Redirect to the login page after registration
            header('Location: account.php');
            exit;
        } else {
            // Display an error message
            echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
        }

        // Close the database connection
        $conn->close();
    }
    ?>