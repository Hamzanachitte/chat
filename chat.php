<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; 
$user_id =$_SESSION['unique_id'];

?>
<link rel="stylesheet" href="css/chatstyle.css">
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          
          }else{
            header("location: login.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
               <?php 
            
           
              echo '<img src="php/images/'.($row['sex'] === "man" ? 'man.jpg' : 'woman.jpg') . '">';
          
          ?>
        <div class="details">
          <span><?php echo $row['fname']. " " ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script>
      $(document).ready(function() {
          // Make an AJAX request to update_status.php when the page loads
          $.ajax({
              url: 'php/mark-as-seen.php',
              type: 'GET',
              success: function(response) {
                  console.log(response);
              },
              error: function(xhr, status, error) {
                  console.error(error);
              }
          });
      });
  </script>
  <script src="javascript/chat.js"></script>

</body>
</html>
