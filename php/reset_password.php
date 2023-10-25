<?php   session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if the email is not empty
    if (!empty($email)) {
        // Generate a unique token (you may need to create a table in the database to store tokens)
        $token = bin2hex(random_bytes(32));

        // Create a timestamp for the token's expiration (e.g., 1 hour from now)
        $token_expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insert the token and email into the database for this user
        $insert_token_query = "INSERT INTO password_reset (email, token, expiry) VALUES ('$email', '$token', '$token_expiry')";
        
        if (mysqli_query($conn, $insert_token_query)) {
            // Send an email to the user with a link to the password reset page, including the token
            // You can use a library like PHPMailer to send emails.
            $reset_link = "https://yourwebsite.com/reset_password.php?token=$token";
            // Construct and send the email with the reset link.
            
            // In a real-world scenario, you should implement proper email sending.

            echo "success"; // Password reset instructions sent successfully
        } else {
            echo "Something went wrong. Please try again!";
        }
    } else {
        echo "Email is required!";
    }
?>
