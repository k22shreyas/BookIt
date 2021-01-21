<?php
session_start();
include "db/dbcon.php";

$snack_select = filter_input(INPUT_POST, 'snack_select');
$_SESSION["Ssnack_select"] = $snack_select;


$temp_usr_id = $_SESSION["session_user"];
$temp_mov_id = $_SESSION["session_movie_id"];
$temp_date_time = $_SESSION["session_date_time"];

if(isset($snack_select)){
$sql=mysqli_query($conn,"SELECT * FROM seats WHERE user_id = '$temp_usr_id' AND movie_id = '$temp_mov_id' AND date_time = '$temp_date_time'");
$row = mysqli_fetch_assoc($sql);
$temp_seat_id= $row["seat_id"];
$_SESSION["session_seat_id"] = $temp_seat_id;

  $query="INSERT INTO snacks(seat_id, snack_name, no_snack) VALUES('$temp_seat_id', 'popcorn/drink', '$snack_select')";
  if ($conn->query($query)){
    header("Location: ticket_show.php");
  }
  else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
$conn->close();
}
else {
  echo 'select 0 for none';
}

?>