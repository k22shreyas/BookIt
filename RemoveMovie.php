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
<body>
<div class="delete_select">
<form action="" method="POST"><br>
<h1 style="font-size:26px;">SELECT THE MOVIE TO BE DELETED</h1>
<select name="movie_del" >
 <option value="No movie is selected">Choose Movie below</option>
 <?php
 foreach($names as $name){
   echo '<option value="'.$name.'">'.$name.'</option>';
 }
 ?>
</select>
<br></br>
<input type="submit" value="Remove" class="uni-btn"><br>
</form>
</div>

<?php
$movie_del = filter_input(INPUT_POST, 'movie_del');
if(isset($movie_del)){

    $sql1="SET FOREIGN_KEY_CHECKS=0;"; // disable foregin key check
    mysqli_query($conn, $sql1);
    $sql2 = "DELETE FROM movie WHERE movie_name='$movie_del'";
    
    if (mysqli_query($conn, $sql2)) {
      $sql3 = "DELETE FROM poster WHERE movie_name='$movie_del'";
      mysqli_query($conn, $sql3);

      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Movie Removed Successful');
    window.location.href='AdminPage.php';
    </script>");
    } 
    else {
      echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    $sql4="SET FOREIGN_KEY_CHECKS=1;"; //Re-enable foregin key check
    mysqli_query($conn, $sql4);
  }
?>

  </body>
</html>