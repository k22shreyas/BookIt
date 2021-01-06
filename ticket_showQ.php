
<?php
session_start();
include "db/dbcon.php";
$temp_seat_id = $_SESSION["session_seat_id"];

$sql = "SELECT movie.movie_name, movie.net_amt, user.fullname, seats.date_time, snacks.popcorn, snacks.drink, seats.no_seat, movie.price , (snacks.popcorn+snacks.drink)*50 AS snacks_amt, movie.net_amt*seats.no_seat AS amt_for_seats,((snacks.popcorn+snacks.drink)*50)+(movie.net_amt*seats.no_seat) AS net_total 
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
    $popcorn = $row["popcorn"];
    $drink = $row["drink"];
    $no_seat = $row["no_seat"];
    $price = $row["price"];
    $net_amt = $row["net_amt"];
    $amt_for_seats = $row["amt_for_seats"];
    $snacks_amt = $row["snacks_amt"];
    $net_total = $row["net_total"];
    //spliting date and time 
    $date = date('Y-m-d',strtotime($combinedDT));
    $time = date('H:i',strtotime($combinedDT));
    $day = date('d',strtotime($combinedDT));
  }
} else {
  echo "0 results";
}


$sql = "INSERT INTO ticket(seat_id, total_net_amt) VALUES('$temp_seat_id', '$net_total')";
 $result=mysqli_query($conn, $sql);
 if($result){
  echo "<script>
  alert('Ticket booked successfully');
  window.location.href='homepage.php';
  </script>";
 }
else{
  echo "Error: ". $sql ."". $conn->error;
}
$conn->close();
?>