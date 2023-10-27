<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
            OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);

    if ($query2) {
        $row2 = mysqli_fetch_assoc($query2);
        $result = (mysqli_num_rows($query2) > 0) ? $row2['msg'] : "No message available";
        $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;
        $you = (isset($row2['outgoing_msg_id']) && $outgoing_id == $row2['outgoing_msg_id']) ? "You: " : "";

        // Check if the message is unread, and update its status to "seen"
       // Check if the message is unread, and update its status to "seen"
if ($outgoing_id == $row['unique_id'] && $row2['status'] === 'unread') {
    $message_id = $row2['msg_id'];
    $update_status_sql = "UPDATE messages SET status = 'seen' WHERE msg_id = $message_id";
    mysqli_query($conn, $update_status_sql);
}

        
    } else {
        // Handle the query failure here
        echo "Error in the SQL query: " . mysqli_error($conn);
    }

    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

    // Check if there are unread messages
    $unread_messages = 0;
    $unread_msg_sql = "SELECT COUNT(*) AS unread_count FROM messages WHERE incoming_msg_id = {$outgoing_id} AND outgoing_msg_id = {$row['unique_id']} AND status = 'unread'";
    $unread_msg_query = mysqli_query($conn, $unread_msg_sql);

    if ($unread_msg_query) {
        $unread_msg_row = mysqli_fetch_assoc($unread_msg_query);
        $unread_messages = $unread_msg_row['unread_count'];
    } else {
        // Handle the query failure here
        echo "Error in the SQL query: " . mysqli_error($conn);
    }

    // Display a notification badge if there are unread messages
    $notification = ($unread_messages > 0) ? '<span class="notification text-danger">(' . $unread_messages . ')</span>' : '';

    $output .= '<a  onclick="myFunction()"  href="chat.php?user_id=' . $row['unique_id'] . '">
        <div class="content">
            <img src="php/images/' . ($row['sex'] === "man" ? 'man.jpg' : 'woman.jpg') . '">
            <div class="details">
                <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
                <p >' . $you . $msg . '' . $notification . '</p> 
            </div>
           
        </div>
        <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
    </a>';
}
?>
  <script src="javascript/users.js"></script>
<script>
function myFunction() {
    console.log("Hello World");
}


    
</script>