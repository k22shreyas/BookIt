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
  <body>
  <div class="ticket_display">
  <h1>Summary</h1>
  <table class="table_display">
  <tr class="table_items">
    <th>Name: </th>
    <td><?php echo $fullname; ?></td> 
    <th>Movie Name: </th>
    <td><?php echo $movie_name; ?></td>
  </tr>
  <tr>
    <th>Date: </th>
    <td><?php echo $date; ?></td>
    <th>Time: </th>
    <td><?php echo $time; ?></td>
  </tr>
  <tr>
    <th>Popcorn, Drink: </th>
    <td><?php echo $popcorn. 'x, '.$drink. 'x'; ?></td>
    <th>Price: </th>
    <td><?php echo $net_amt; ?>/-</td>
  </tr>
  <tr>
    <th>Seats: </th>
    <td><?php echo $no_seat; ?></td>
    <th>Amount for all seats: </th>
    <td><?php echo $amt_for_seats; ?>/-</td>
  </tr>
  <tr>
    <th>Snacks Price: </th>
    <td><?php echo $snacks_amt; ?>/-</td>
    <th>Net Amount: </th>
    <td><?php echo $net_total; ?>/-</td>
  </tr>
</table>
<form action="ticket_showQ.php" method="POST">
<input type="submit" value="Proceed" class="uni-btn">
</form>
</div>
    <section class="container">
          <div class="row">
          </div>
          <div class="row">
            <article class="card fl-left">
              <section class="date">
                <time datetime="23th feb">
                  <span><?php echo $day; ?></span><span></span>
                </time>
              </section>
              <section class="card-cont">
                <small><?php echo $fullname; ?></small>
                <h3><?php echo $movie_name; ?></h3>
                <div class="even-date">
                 <i class="fa fa-calendar"></i>
                 <time>
                   <span><?php echo $date; ?></span>
                   <span><?php echo $time; ?></span>
                 </time>
                </div>
                <div class="even-info">
                  <i class="fa fa-map-marker"></i>
                  <p>
                  Seat ID: <?php echo $temp_seat_id; ?> 
                  Seats: <?php echo $no_seat; ?> 
                  </p>
                </div>
                <a href="#" class="aniBoo">Booked</a>
              </section>
            </article>
          </div>
        </div>
</section>
<br></br>

</body>        
<html>
