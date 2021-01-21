<?php
session_start();
include "db/dbcon.php";
?>
<!DOCTYPE html>
<?php include('Admin_navbar1.html'); ?>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="css/styles.css">
  <head>
    <meta charset="utf-8">
    <title>Adding Movie</title>
  </head>
  <body>
<div class="add_form">
<h1>ENTER MOVIE DETAILS</h1>
  <form action="AddMovieP.php" method="POST" class="inputform" enctype="multipart/form-data">
    <input type="text" id="Name" name="Name" placeholder=" Name" required><br></br>    
    <input type="text" id="Genre" name="Genre" placeholder=" Genre" required><br></br>     
    <input id="Language" name="Language" placeholder=" Language" required><br></br>     
    <input id="ratings" name="Ratings" placeholder=" Ratings" required><br></br>    
    <input id="Description" name="Description" placeholder=" Description" required><br></br>
    <input id="Price" name="Price" placeholder=" Price" required><br></br>
    <input type="file" name="poster_img" id="filetype" style="font-size:14px" required><br></br>
   <input type="submit" class="uni-btn" value="Add Movie">
</form>
</div>
  </body>
</html>

