

<link rel="stylesheet" href="css/resetstyle.css">
<!-- <body>
<div class="InputContainer">
    <section class="form login">
      <div class="container">

    <section class="form reset-password">
    <div class="heading">Reset Password</div>
    
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" class="input" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field button">
          <input type="submit"class="login-button" name="submit" value="Reset Password">
        </div>
      </form>
      <div class="link">Remember your password? <a href="login.php">Login</a></div>
    </section>
  </div>
  <script src="javascript/reset_password.js"></script>
</body>
</html> -->



<body>
  <?php include_once "header.php"; ?>
  <div class="InputContainer">
    <section class="form login">
      <div class="container">

        <div class="heading">Sign In</div>

        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="error-text"></div>
         
          <div class="field input">
            <!-- <label>Password</label> -->
            <div class="password-container">
            <input type="text" class="input" name="email" placeholder="Enter your email" required>
             
              </span>
            </div>
          </div>
          <div class="field button">
          <input type="submit"class="login-button" name="submit" value="Reset Password">
          </div>
          <div class="field button">
          <div class="link">Remember your password? <a href="login.php">Login</a></div>
          </div>
        </form>
        <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>