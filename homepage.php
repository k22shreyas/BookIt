  <?php include('navbar1.html');
session_start();
include "db/dbcon.php"; 
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

</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/avn.jpg" style="width:100%">
  <div class="text">Avengers</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/idiot.jpg" style="width:100%">
  <div class="text">3 Idiots</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/thor.jpg" style="width:100%">
  <div class="text">Thor</div>
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="assets/images/phirherapheri.jpg" style="width:100%">
  <div class="text">Phir Hera Pheri</div>
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
    </body>
</html>