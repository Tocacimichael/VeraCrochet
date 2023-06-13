<?php
@include 'function/config.php';
@include 'function/profilefun.php';

// Function to check if the user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Check if the user is logged in
if (!isLoggedIn()) {
    header("Location: ../login.php");
    exit;
}

