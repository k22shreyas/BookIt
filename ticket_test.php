<?php
session_start();
include "db/dbcon.php";
include('navbar1.html');
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

$conn->close();

?>
<html>
  <link rel="stylesheet" href="css/styles.css">
  <style>
 
}
body {
  padding: 50px;
  background-color: #fff;
}

.sb-betslip {
  margin:20px;
  width:500px;
   display:flex;
   justify-content:center;
   align-items:center;
   flex-direction:column;
   filter: drop-shadow(0 2px 5px rgba(0,0,0,0.5));
}

.sb-betslip__content {
   display: flex;
   justify-content: center;
   width: 100%;
   background: #fff;
   padding:20px;
}

.ticket-border {
  display: flex;
  flex-direction: row;
  justify-content: center;
  width:100%;
}

.ticket-shape {
  display: inline-block;
  box-sizing: content-box;
  position: relative;
  height: 40px;
  width: 26px;
  font-size: 16px;
  background-size: 100%;
  background-repeat: no-repeat;
  background-image: radial-gradient(circle at 13px 0, rgba(255,255,255,0) 0.4em, #fff 0.5em);
  background-position: top left, top right;
}

    </style>
  <body>

  <div class="sb-betslip">
   
   <div class="ticket-border">
            <span class="ticket-shape"></span>
            <span class="ticket-shape"></span>
            <span class="ticket-shape"></span>
            <span class="ticket-shape"></span>
            <span class="ticket-shape"></span>
            <span class="ticket-shape"></span>
            <span class="ticket-shape"></span>
   </div>
   
   <div class="sb-betslip__content">
         Other stuff
   </div>
   
</div>


</body>
  </html>