<?php
session_start();
include 'db/dbcon.php';

$sql = mysqli_query($conn, "SELECT * FROM movie");
while($row = mysqli_fetch_array($sql)){
  $names[] = $row['movie_name'];
}
?>

<html>
 
<?php include('navbar1.html'); ?>
<link rel="stylesheet" href="css/styles.css">
<body>

<div class="form_display" id="grad" style="float:left;">
<form action="" method="POST" id="movie_form">
<input type="date" name="date_select" style="margin:10px; " class="desc_submit">
<br>
<select name="time_select" required>
<option value="choose time">Choose Time</option>
<option value="10:00:00"><time>10:00AM [10:00]</time></option>
<option value="13:00:00"><time>01:00PM [13:00]</time></option>
<option value="16:00:00"><time>04:00PM [16:00]</time></option>
<option value="19:00:00"><time>07:00PM [19:00]</time></option>
<option value="22:00:00"><time>10:00PM [22:00]</time></option>
</select>
<br>
 <select name="movie_select">
 <option value="No movie is selected">Choose Movie below</option>
 <?php
 foreach($names as $name){
   echo '<option value="'.$name.'">'.$name.'</option>';
 }
 ?>
</select>
<br>
<select name="seat_select" required>
<option value="No. of seats not selected">Choose no. of seats</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select> 
<br>
<input type="submit" value="select" class="submit uni-btn">
</form>
</div>
<br>
<?php
// ###getting selected values from form###
$date_select = filter_input(INPUT_POST, 'date_select');
$time_select = filter_input(INPUT_POST, 'time_select');
$movie_select = filter_input(INPUT_POST, 'movie_select');
$seat_select = filter_input(INPUT_POST, 'seat_select');
// ###Mandatory to place this here###
?>
<!-- collecting data from user and keepting them in session variables -->
<div class="show_display" style="float:right">
<p>Selection will be displayed here</p>
<p>Movie: <?php echo $movie_select; $_SESSION["session_movie"] = $movie_select; ?> </p>
<p>Seats: <?php echo $seat_select; $_SESSION["session_seat"] = $seat_select;  ?> </p>
<p>Date: <?php echo $date_select; $_SESSION["session_date"] = $date_select;  ?> </p>
<p>Time: <?php echo $time_select; $_SESSION["session_time"] = $time_select;  ?> </p>
<br>
<input type="button" class="uni-btn" value="Book" onclick="book_ticket()" href="movie_selectQ.php" style="margin-left:60px">
</div>
<!--checking if all fileds are selected -->
<?php if(!empty($seat_select) && !empty($movie_select) && !empty($date_select) && !empty($time_select))
{ ?>
  <script>
  book_ticket = function(){
  window.location="movie_selectQ.php"
  }</script>
<?php } ?> 
</body>
</html>
