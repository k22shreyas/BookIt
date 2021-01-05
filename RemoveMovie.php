<?php
session_start();
include 'db/dbcon.php';

$sql = mysqli_query($conn, "SELECT * FROM movie");
while($row = mysqli_fetch_array($sql)){
  $names[] = $row['movie_name'];
}
?>
<html>
<?php include('Admin_navbar1.html'); ?>
<link rel="stylesheet" href="css/styles.css">
<body style="background-image: linear-gradient(to right,  #480048  , #c04848, #480048  );">
<div class="form_display" style="float:left;  margin:150px 0px 0px 200px">
<form action="" method="POST">
    <br>
<div class="sel-admin">
<select name="movie_del" >
 <option value="No movie is selected">[Choose Movie below]</option>
 <?php
 foreach($names as $name){
   echo '<option value="'.$name.'">'.$name.'</option>';
 }
 ?>
 
</select>
</div><br><br>
<input type="submit" value="Select" class="uni-btn"><br>
</form>
</div>

<?php
$movie_del = filter_input(INPUT_POST, 'movie_del');
?>
<div class="show_display" style="float:right; margin:150px 200px 0px 0px">
<h4>Selected Movie:<br> <?php echo $movie_del; ?> </h4>
<input type="button" value="Delete" class="uni-btn" onclick="del_sel()" >
</div>
  <script>
  del_sel = function(){
    <?php 
    $sql1="SET FOREIGN_KEY_CHECKS=0;"; // disable foregin key check
    mysqli_query($conn, $sql1);
    $sql2 = "DELETE FROM movie WHERE movie_name='$movie_del'";
    
    if (mysqli_query($conn, $sql2)) {
      echo '<script>alert("Movie deleted successfully");</script>';
    } 
    else {
      echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    $sql3="SET FOREIGN_KEY_CHECKS=1;"; //Re-enable foregin key check
    mysqli_query($conn, $sql3);
  ?>
  </script>

  </body>
</html>