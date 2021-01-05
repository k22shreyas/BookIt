<?php
session_start();
include "db/dbcon.php";

$popcorn = filter_input(INPUT_POST, 'pop_select');
$drink = filter_input(INPUT_POST, 'drink_select');

$temp_usr_id = $_SESSION["session_user"];
$temp_mov_id = $_SESSION["session_movie_id"];

if(isset($popcorn) && isset($drink)){
$sql=mysqli_query($conn,"SELECT * FROM seats WHERE user_id = '$temp_usr_id' AND movie_id = '$temp_mov_id'");
$row = mysqli_fetch_assoc($sql);
$temp_seat_id= $row["seat_id"];

$query="INSERT INTO snacks(seat_id, popcorn, drink) VALUES('$temp_seat_id', '$popcorn', '$drink')";
if ($conn->query($query)){
  echo 'snacks done!';
}
$conn->close();
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
