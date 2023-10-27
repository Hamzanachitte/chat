<?php

// Fetch the user's data from the database
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$unique_id}");
$user_data = mysqli_fetch_assoc($user_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user wants to change the password
    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
        $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
        $encrypt_new_pass = md5($new_password);

        // Update the password in the database
        $update_query = mysqli_query($conn, "UPDATE users SET password = '{$encrypt_new_pass}' WHERE unique_id = {$unique_id}");
        if ($update_query) {
            echo "Password updated successfully!";
        } else {
            echo "Password update failed. Please try again.";
        }
    }
}

// HTML for the profile page
?>

            <!DOCTYPE html>
            <html>

            <head>
                <title>Your Profile</title>
            </head>

            <body>
                <h1>Your Profile</h1>
                <p>Welcome,
                    <?php echo $user_data['fname'] . ' ' . $user_data['lname']; ?>!
                </p>
                <img src="images/<?php echo $user_data['img']; ?>" alt="Profile Picture" width="150">

                <!-- Display user data -->
                <p>Email:
                    <?php echo $user_data['email']; ?>
                </p>
                <p>Status:
                    <?php echo $user_data['status']; ?>
                </p>

                <!-- Change Password Form -->
                <h2>Change Password</h2>
                <form method="post" action="">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" required>
                    <button type="submit">Change Password</button>
                </form>

                <a href="logout.php">Logout</a>
            </body>

            </html>