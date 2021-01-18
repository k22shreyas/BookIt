<?php
session_start();
?>
<!DOCTYPE html>
<?php include('Admin_navbar1.html'); ?>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="css/styles.css">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
  </head>
  <body>
  <div id="Admin">
    <h1 style="color:white">Welcome, Admin.</h1>
    <div class="container-admin">
      <div class="left">
        <button type="button" name="button" class="button button1"><a href="AddMovie.php" style="text-decoration:none;">Add new Movie</a></button>
      </div>
      <div class="right">
        <button type="button" name="button" class="button button2"><a href="RemoveMovie.php" style="text-decoration:none;">Remove Movie</a></button>
        </div>
        <div class="mid">
        <button type="button" name="button" class="button button3"><a href="booked_history.php" style="text-decoration:none;">Booked History</a></button>
        </div>
        <div class="mid-right">
        <button type="button" name="button" class="button button4"><a href="change_default.php" style="text-decoration:none;">Change Defaults</a></button>
        </div>
     </div>
    </div>
  </body>
</html>
