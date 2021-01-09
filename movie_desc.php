<?php
session_start();
include "db/dbcon.php"; 
$sql = mysqli_query($conn, "SELECT * FROM movie");
while($row = mysqli_fetch_array($sql)){
  $names[] = $row['movie_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('navbar1.html'); ?>
<link rel="stylesheet" href="css/styles.css">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>

<div class="form_display" style="margin-right:100px;">
<form action="" method="POST" id="movie_form">

<div>
 <select name="movie_select" >
 <option value="No movie is selected" >Choose Movie below</option>
 <?php
 foreach($names as $name){
   echo '<option value="'.$name.'">'.$name.'</option>';
 }
 ?>
</select>
<input type="submit" value="select" class="desc_submit uni-btn" onclick="desc_select()">
</div>

</body>
</html>

<?php

$movie_select = filter_input(INPUT_POST, 'movie_select');

$query = mysqli_query($conn, "SELECT * FROM movie WHERE movie_name = '$movie_select'");
if(mysqli_num_rows($query) > 0){
  $row = mysqli_fetch_assoc($query);
}
else{
    echo 'No movie is selected';
}
?>
<html>
<?php 
if(!empty($row['movie_lang']) && !empty($row['movie_genre']) && !empty($row['movie_des']) && !empty($row['ratings'])){
?>
<div class="movie_desc_bg">
<div class="desc_bg" >
<h3> Movie: <?php echo $movie_select; ?></h3>
<h3> Language: <?php echo $row['movie_lang']; ?></h3>
<h3> Genre: <?php echo $row['movie_genre']; ?></h3>
<h3> Ratings: <?php echo $row['ratings']; ?></h3>
<h3> Description: <?php echo $row['movie_des']; ?></h3>
</div>
</div>
<?php } ?>
</html>