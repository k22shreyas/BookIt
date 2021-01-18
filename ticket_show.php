<?php
session_start();
include "db/dbcon.php";
include('navbar1.html');
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
$sql1 = "SELECT SUM(snack_no) AS items FROM snacks WHERE seat_id = '$temp_seat_id'";
$result1 = mysqli_query($conn,$sql1);
if (mysqli_num_rows($result1) > 0) {
  while($row1 = mysqli_fetch_assoc($result1)) {
  
    $item = $row1['items'];
  }
}

$sql2 = "SELECT SUM(snack_amt) AS snacksamt FROM snacks WHERE seat_id = '$temp_seat_id'";
$result2 = mysqli_query($conn,$sql2);
if (mysqli_num_rows($result2) > 0) {
  while($row2 = mysqli_fetch_assoc($result2)) {

    $snack_amt = $row2['snacksamt'];
  }
}
$total_amt = $snack_amt + $amt_for_seats;

?>

<html>
<link rel="stylesheet" href="css/styles.css">
  <body>
  <div class="ticket_display">
  <h1>Summary</h1>
  <table class="table_display">
  <tr class="table_items">
    <th>Name: </th>
    <td><?php echo $fullname; ?></td> 
    <th>Seats: </th>
    <td><?php echo $no_seat; ?></td>
  </tr>
  <tr class="table_items">
    <th>Movie Name: </th>
    <td><?php echo $movie_name; ?></td>
    <th>Price: </th>
    <td><?php echo $net_amt; ?>/-</td>
  </tr>
  <tr class="table_items">
    <th>Date: </th>
    <td><?php echo $date; ?></td>
    <th>Price(<?php echo $no_seat; ?>): </th>
    <td><?php echo $amt_for_seats; ?>/-</td>
  </tr>
  <tr class="table_items">
    <th>Time: </th>
    <td><?php echo $time; ?></td>
    <th>Snacks Price: </th>
    <td><?php echo $snack_amt; ?>/-</td>
  </tr>
  <tr class="table_items">
    <th>Snacks: </th>
    <td><?php echo $item. ' item(s)'; ?></td>
    <th>Net Amount: </th>
    <td><?php echo $total_amt; ?>/-</td>
  </tr>
</table>
<form action="ticket_showQ.php" method="POST">
<input type="submit" value="Proceed" class="uni-btn" style="margin:15px 0px 0px 0px;">
</form>

</body>        
<html>
