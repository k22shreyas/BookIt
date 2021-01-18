<?php
session_start();
include "db/dbcon.php";

$popcorn = filter_input(INPUT_POST, 'pop_select');
$drink = filter_input(INPUT_POST, 'drink_select');

$temp_usr_id = $_SESSION["session_user"];
$temp_mov_id = $_SESSION["session_movie_id"];
$temp_date_time = $_SESSION["session_date_time"];

if(isset($popcorn) && isset($drink)){
$sql=mysqli_query($conn,"SELECT * FROM seats WHERE user_id = '$temp_usr_id' AND movie_id = '$temp_mov_id' AND date_time = '$temp_date_time'");
$row = mysqli_fetch_assoc($sql);
$temp_seat_id= $row["seat_id"];
$_SESSION["session_seat_id"] = $temp_seat_id;

$query="INSERT INTO snacks(seat_id, snack_name, snack_no) VALUES('$temp_seat_id', 'popcorn', '$popcorn')";
if ($conn->query($query)){

  $query="INSERT INTO snacks(seat_id, snack_name, snack_no) VALUES('$temp_seat_id', 'drink', '$drink')";
  if ($conn->query($query)){
    header("Location: ticket_show.php");
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
$conn->close();
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>