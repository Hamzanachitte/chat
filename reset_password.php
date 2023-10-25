<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="InputContainer">
    <section class="form reset-password">
      <header>Reset Password</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Reset Password">
        </div>
      </form>
      <div class="link">Remember your password? <a href="login.php">Login</a></div>
    </section>
  </div>
  <script src="javascript/reset_password.js"></script>
</body>
</html>
