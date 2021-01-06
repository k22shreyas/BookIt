<?php
session_start();
include "db/dbcon.php";
$session_mov_id = $_SESSION["session_movie"];
$sql = mysqli_query($conn, "SELECT movie_id FROM movie WHERE movie_name='$session_mov_id'");
$row = mysqli_fetch_array($sql);
$temp_mov_id= $row["movie_id"];

//
$_SESSION["session_movie_id"] = $temp_mov_id;
//

$temp_usr_id = $_SESSION["session_user"];
$seat_select = $_SESSION["session_seat"];
$date_select = $_SESSION["session_date"];
$time_select = $_SESSION["session_time"];
//combining date and time
$combinedDT = date('Y-m-d H:i:s', strtotime("$date_select $time_select"));
$_SESSION["session_date_time"] = $combinedDT;

$query = mysqli_query($conn,"SELECT * FROM seats WHERE user_id = '$temp_usr_id' AND movie_id = '$temp_mov_id' AND date_time = '$combinedDT'");
$row = mysqli_fetch_assoc($query);
if ($row>0) {
  
  echo "<script>
  alert('You already have this movie booked at the selected date and time');
  window.location.href='movie_select.php';
  </script>";
  
} 
else {
  
//updating values in seat table
$sql = "INSERT INTO seats(movie_id, user_id, date_time, no_seat)
VALUES('$temp_mov_id', '$temp_usr_id', '$combinedDT', '$seat_select')";

if (mysqli_query($conn, $sql)) {
  header("Location:snacks_select.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

?>

