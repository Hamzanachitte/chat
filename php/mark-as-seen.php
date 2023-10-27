<?php
session_start();
include_once "config.php";

if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}

if (isset($_POST['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $outgoing_id = $_SESSION['unique_id'];

    // Update the status of all unread messages in the chat to 'seen'
    $update_status_sql = "UPDATE messages SET status = 'seen' WHERE incoming_msg_id = {$user_id} AND outgoing_msg_id = {$outgoing_id} AND status = 'unread'";
    if (mysqli_query($conn, $update_status_sql)) {
        echo "All messages marked as seen.";
    } else {
        echo "Error updating message status: " . mysqli_error($conn);
    }
} else {
    echo "No user_id provided.";
}
?>
