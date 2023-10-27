<?php 
  session_start();
  include_once "php/config.php";
  include("php/cleanup_guests.php");
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }


  // Check if the user is a guest
if ($_SESSION['usertype'] === 'guest') {
    $user_id = $_SESSION['unique_id'];
    $_SESSION['last_activity'] = time();

    // Determine the inactivity threshold (e.g., 5 minutes)
    $inactivity_threshold = 3; // 5 minutes in seconds

    // Check if the user has been inactive for longer than the threshold
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactivity_threshold)) {
        // User is inactive; perform cleanup
        $sql = "DELETE FROM users WHERE user_id = $user_id"; // Adjust this query to match your table structure

        if (mysqli_query($conn, $sql)) {
           
            session_unset(); // Unset all session variables
            session_destroy(); // Destroy the session
            header("Location: login.php"); // Redirect to a logout page
            exit;
        } else {
            echo "Error: " . mysqli_error($conn); // Handle the error
        }
    } else {
        // Update the last activity time
        $_SESSION['last_activity'] = time();
    }
}
?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="css/userstyle.css">
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
           
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              $_SESSION['sex'] = $row['sex'];
            }
          ?>
              <?php 
            
            if($row['sex'] ==="man") {
            echo '<img src="php/images/man.jpg" alt="man">';
            }else {

              echo '<img src="php/images/woman.jpg" alt="woman">';
            }
          ?>
          
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
