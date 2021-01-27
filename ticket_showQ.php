
<?php
session_start();
include "db/dbcon.php";
$temp_seat_id = $_SESSION["session_seat_id"];

$sql = "SELECT movie.movie_name, movie.net_amt, user.fullname, seats.date_time, seats.no_seat, movie.net_amt , movie.net_amt*seats.no_seat AS amt_for_seats 
FROM (((seats 
INNER JOIN movie ON seats.movie_id = movie.movie_id) 
INNER JOIN user ON seats.user_id = user.user_id) 
INNER JOIN snacks on seats.seat_id = snacks.seat_id) 
WHERE seats.seat_id = '$temp_seat_id'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    $movie_name = $row["movie_name"];
    $fullname = $row["fullname"];
    $combinedDT = $row["date_time"];
    $no_seat = $row["no_seat"];
    $net_amt = $row["net_amt"];
    $amt_for_seats = $row["amt_for_seats"];
    //spliting date and time 
    $date = date('Y-m-d',strtotime($combinedDT));
    $time = date('H:i',strtotime($combinedDT));
    $day = date('d',strtotime($combinedDT));
  }
} else {
  echo "0 results";
}
$sql1 = "SELECT SUM(no_snack) AS items FROM snacks WHERE seat_id = '$temp_seat_id'";
$result1 = mysqli_query($conn,$sql1);
if (mysqli_num_rows($result1) > 0) {
  while($row1 = mysqli_fetch_assoc($result1)) {
  
    $item = $row1['items'];
  }
}

$sql2 = "SELECT snack_amt AS snacksamt FROM snacks WHERE seat_id = '$temp_seat_id'";
$result2 = mysqli_query($conn,$sql2);
if (mysqli_num_rows($result2) > 0) {
  while($row2 = mysqli_fetch_assoc($result2)) {

    $snack_amt = $row2['snacksamt'];
  }
}
$snack_netamt = $snack_amt*$item;
$total_amt = $snack_netamt + $amt_for_seats;


$sql3 = "INSERT INTO ticket(seat_id, total_net_amt) VALUES('$temp_seat_id', '$total_amt')";
 $result3=mysqli_query($conn, $sql3);
 if($result3){
  $sts=1;
  $sql4 = "UPDATE seats SET sts = '$sts'";
  $result4=mysqli_query($conn, $sql4);
  if($result4){
  echo "<script>
  alert('Ticket booked successfully');
  window.location.href='movie_desc.php';
  </script>";
 }
 else{
  echo "Error: ". $sql4 ."". $conn->error;
}
}
else{
  echo "Error: ". $sql3 ."". $conn->error;
}
$conn->close();
/* ALTER TABLE `seats` ADD `sts` INT(11) NOT NULL DEFAULT '0' AFTER `no_seat`; */
?>

