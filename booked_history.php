<?php
session_start();
include "db/dbcon.php";
include('Admin_navbar1.html');

$sql = "SELECT movie.movie_name, user.username, seats.date_time, seats.no_seat, seats.seat_id
FROM ((seats 
INNER JOIN movie ON seats.movie_id = movie.movie_id) 
INNER JOIN user ON seats.user_id = user.user_id)
WHERE seats.sts=1";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/styles.css">

<body>
  <div class="history">
    <h1>Booked Ticket History</h1>
    <table class="history_display">
      <tr class="table-list">
        <th style="padding:5px;">Seat ID </th>
        <th style="padding:5px;">Movie Name </th>
        <th style="padding:5px;">Username </th>
        <th style="padding:5px;">Date </th>
        <th style="padding:5px;">Time </th>
        <th style="padding:5px;">Seats </th>
      </tr>
      <?php

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          $combinedDT = $row["date_time"];

          $movie_name = $row["movie_name"];
          $seat_id = $row["seat_id"];
          $user_name = $row["username"];
          $no_seats = $row["no_seat"];
          $date = date('y-m-d', strtotime($combinedDT));
          $time = date('H:i', strtotime($combinedDT));

          echo
          '<tr class="table-list"> 
          <td>' . $seat_id . '</td>
          <td>' . $movie_name . '</td>
          <td>' . $user_name . '</td>
          <td>' . $date . '</td>
          <td>' . $time . '</td>
          <td>' . $no_seats . '</td>
          </tr>';
        }
      } else {
        echo "0 results";
      }
      $conn->close();

      ?>
    </table>
  </div>
  <br></br>
</body>

</html>