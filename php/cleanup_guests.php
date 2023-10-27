<?php

include_once "config.php";

// Check if the user has logged in
if (isset($_SESSION['user_id'])) {
    // User has logged in; you can now perform the cleanup

    $usertype = 'guest';
    $status = 'Offline now';
    $sql = "DELETE FROM users WHERE usertype = '$usertype' AND status = 'Offline now' ";
    // Check the last activity time (adjust the threshold as needed, e.g., 5 minutes)
    $inactivity_threshold = 500; // 5 minutes in seconds
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactivity_threshold)) {
       
        if (mysqli_query($conn, $sql)) {
            header("location: login.php");
        } else {
            echo "Error deleting guest users: " . mysqli_error($conn);
        }
    } else {
        // Update the last activity time
        $_SESSION['last_activity'] = time();

        // Construct and execute the SQL query to delete guest users
  
    }
} else {
    echo "User is not logged in.";
}
?>
