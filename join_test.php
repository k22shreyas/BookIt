<?php
include "dbcon.php";
$query=mysqli_query($conn,"SELECT movie.movie_name, user.username, seats.seat_id, seats.date_time FROM ((seats INNER JOIN movie ON seats.movie_id = movie.movie_id) INNER JOIN user ON seats.user_id = user.user_id)");
$row= mysqli_fetch_assoc($query);
echo $row['movie_name'];
echo $row['username'];


?>