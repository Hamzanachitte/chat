<?php
include_once "config.php";
session_start();

// Replace $user_id with the actual user ID
$user_id = $_SESSION['unique_id']; // Example user ID

// SQL query to update message status
$update_status_sql = "UPDATE messages SET status = 'seen' WHERE incoming_msg_id = $user_id AND status = 'unread'";

// Run the SQL query
if (mysqli_query($conn, $update_status_sql)) {
    $updatedRows = mysqli_affected_rows($conn);
   

} else {
    echo "Error updating status: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
