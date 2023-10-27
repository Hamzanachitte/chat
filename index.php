
<link rel="stylesheet" href="css/registrationstyle.css">
<?php include_once "header.php"; ?>

<body>
  <div class="container">
    <div class="wrapper">
      <section class="form signup">
        <div class="heading">Sign Up</div>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="error-text"></div>
          <div class="name-details">
            <div class="field input">
           
              <input class="input" type="text" name="fname" placeholder="First name" required>
            </div>
            <div class="field input">
           
              <input type="text" class="input" name="lname" placeholder="Last name" required>
            </div>
          </div>
          <div class="field input">
          
            <input type="text" class="input" name="email" placeholder="Enter your email" required>
          </div>
          <div class="field input">
            <!-- <label>Password</label> -->
            <div class="password-container">
              <input type="password" class="input password-input" name="password" placeholder="Enter your password"
                required>
              <span class="password-toggle" onclick="togglePasswordVisibility(this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>
          <div class="field image">
            <label>Select Image</label>
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
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
  <script src="javascript/signup.js"></script>

</body>

</html>