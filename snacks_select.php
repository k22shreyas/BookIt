<?php
session_start();
include "db/dbcon.php";
include('navbar1.html');
?>

<html>
<link rel="stylesheet" href="css/styles.css">
<title>Snacks</title>
<body>
<div class="snacks_cont">
<form action="snacksQ.php" method="POST">
<h1>Choose Snacks</h1>
<img src="assets/icons/popcorn1.png">
<img src="assets/icons/beverage1.png">
<input type="number" class="snacks_select" min="0" max="5" name="snack_select" placeholder="0">
<br></br>
<input type="submit" value="select" class="uni-btn">
</form>
</div>
</body>
</html>
