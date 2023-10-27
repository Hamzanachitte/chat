        <?php
        session_start();
        include_once "config.php";

        // Generate random data for the input fields
        $fname = generateRandomString(8);
        $lname = generateRandomString(8);
        $email = generateRandomEmail();
        $password = generateRandomString(12);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sex = $_POST['sex'];
        }
        // Generate a random image file name (for demonstration purposes)
        $new_img_name = "";

        // Check if the email already exists in the database
        $check_email_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($check_email_query) > 0) {
            echo "$email - This email already exists!";
        } else {
            // Insert the generated random data into the database
            $ran_id = rand(time(), 100000000);
            $status = "Active now";
            $encrypt_pass = md5($password);
            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status,usertype,sex)
            VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', 'guest', '{$sex}')");

            if ($insert_query) {
                // Retrieve the user data after registration
                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if (mysqli_num_rows($select_sql2) > 0) {
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id'];
                    // After successful login, set the session variables
                    $_SESSION['user_id'] = $result['unique_id'];
                    $_SESSION['usertype'] = 'guest';
            
                  

                    // ... other user-related session variables

                    // Redirect the user to a different page (e.g., users.php)
                    header("Location: ../users.php");
                    exit; // Ensure no further code is executed after the redirect
                } else {
                    echo "This email address does not exist!";
                }
            } else {
                echo "Something went wrong. Please try again!";
            }
        }

        // Function to generate a random string of a specified length
        function generateRandomString()
        {
            $randomNumber = rand(1, 9999); // Generate a random integer between 1 and 9999
            $randomUsername = 'user' . $randomNumber;
            return $randomUsername;
        }


        // Function to generate a random email address
        function generateRandomEmail()
        {
            $randomEmail = generateRandomString(8) . '@example.com';
            return $randomEmail;
        }
        ?>