<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<?php include('navbar1.html'); ?>
<link rel="stylesheet" href="css/styles.css">
  <head>
    <title>Movie and Chill</title>
  </head>
  <body>
  <div class="user_login" style="margin:70px 0px 0px 140px; padding:10px;">  
	<form action="UserRegQ.php" method="POST" class="inputform">
  <img src="assets/icons/user1.png"><br></br>
  <input type="text" id="fullname" name="fullname" placeholder=" Fullname" required/>
  <input type="text" id="username" name="username" placeholder=" Username" required/><br><br>
  <input type="password" id="password" name="password" placeholder=" **********" required/>
  <input type="password" id="password" placeholder=" Confirm Password" required/><br></br>
  <input type="number" id="phone" name="phone" placeholder=" Phone" required/>
  <input type="email" id="email" name="email" placeholder=" Email" required/><br></br>

  <input type="submit" class="uni-btn" value="Register">
  </form>
</div>
<div class="login_info" style="margin-right:140px;">
<form action="UserLogPage.php" class="inputform">
<p style="margin-bottom:20px">Already an user?</p>
<input type="submit" class="uni-btn" value="Login">
</form>
</div>

</body>
</html>
