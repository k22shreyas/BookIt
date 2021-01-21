<?php
session_start();
include "db/dbcon.php"; 
include('navbar1.html');
$sql = mysqli_query($conn, "SELECT * FROM movie");
while($row = mysqli_fetch_array($sql)){
  $names[] = $row['movie_name'];
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/styles.css">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
   body {
  background-image: url("../DBMScopy/assets/images/100b.jpg") !important;
}
</style>
</head>
<body>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/avn.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/idiot.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/thor.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/phirherapheri.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 4 seconds
}
</script>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  margin:20px 10px 20px 50px;
  position: relative;
  width: 100px;
  float:left;
  width:20%;
}

.image {
  display: block;
  width: 250px;
  height: 350px;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 350px;
  width: 250px;
  opacity: 0;
  transition: .5s ease;
  background: rgba( 0, 0, 0, 0.75 );
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  font-family:sans-serif;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>
</head>
<body>
<br></br>
<h1 style="text-align:center; color:white;">Now screening</h1>
<?php
$sql1 = mysqli_query($conn, "SELECT * FROM poster");
while($row1 = mysqli_fetch_array($sql1)){
  $movie_name = $row1['movie_name'];
  $poster_img = $row1['poster_img'];?>

  <div class="container">
  <img src="posters/<?php echo $poster_img;?>" class="image" alt="poster not available" style="border-radius:5px;"/>
  <div class="overlay">
  <div class="text">
    <?php echo $movie_name;?>
  </div>
  </div>
  </div>
<?php } ?>

</body>
</html>
