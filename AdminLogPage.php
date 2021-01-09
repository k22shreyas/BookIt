<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<?php include('navbar1.html'); ?>
<link rel="stylesheet" href="css/styles.css">
  <body>
    <div class="user_login">
      <form action="AdminLogQ.php" method="POST" class="inputform">
        <img src="assets/icons/laptop-user.png"><br></br>
        <input type="text" id="username" name="username" placeholder=" Username" required><br></br>
        <input type="password" id="password" name="password" placeholder=" **********" required><br></br>
        <input type="submit" value="Login" class="uni-btn">
      </form>
    </div>
    <div class="login_info">
      <img src="assets/icons/caution.png" class="cautionImg"><br></br>
      <p>This page is restricted for users </p>
    </div>
    
  </body>
</html>