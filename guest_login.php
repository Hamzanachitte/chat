<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registrationstyle.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <section class="form signup">
                <div class="heading">Sign Up</div>
                <form action="php/guest_login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text"></div>

                    <div style="display:none;">
                    <div class="name-details">
                        <div class="field input">
                            <input class="input" type="text" name="fname" placeholder="First name">
                        </div>
                        <div class="field input">
                            <input type="text" class="input" name="lname" placeholder="Last name">
                        </div>
                    </div>
                    <div class="field input">
                        <input type="text hidden" class="input" name="email" placeholder="Enter your email">
                    </div>
                
             
                    <div class="field input">
                        <div class="password-container">
                            <input type="password" class="input password-input" name="password" placeholder="Enter your password">
                            <span class="password-toggle" onclick="togglePasswordVisibility(this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" value="https://cdn3.vectorstock.com/i/1000x1000/13/92/cartoon-avatar-woman-front-view-vector-9421392.jpg" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div></div>
                    <div class="field input">
                    <label>Select Your GENRE</label>
                    <select name="sex"  class="input">
                        <option value="man">man</option>
                        <option value="woman">woman</option>
                    </select>
                    </div>
                    <div class="field button">
                        <input type="submit" class="login-button" name="submit" value="Continue to Chat">
                    </div>
                </form>
                <div class="link">Already signed up? <a href="login.php">Login now</a></div>
            </section>
        </div>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <!-- <script src="javascript/signup.js"></script> -->
</body>
</html>
