<?php
session_start();
include_once "php/config.php";

// Check if the guest login link is clicked
if (isset($_GET['login_as_guest'])) {
    // Generate a random guest name
    $guest_name = "Guest_" . rand(1000, 9999);

    // Store the guest name in the session
    $_SESSION['guest_name'] = $guest_name;
    
    // Redirect the user to the chat page (or any other page you want)
    header("location: chat.php");
    exit();
}
?>
