<?php
session_start();
require "db/dbcon.php";
$Name = filter_input(INPUT_POST, 'Name');
$Language = filter_input(INPUT_POST, 'Language');
$Genre = filter_input(INPUT_POST, 'Genre');
$Ratings = filter_input(INPUT_POST, 'Ratings');
$Description = filter_input(INPUT_POST, 'Description');
$Price = filter_input(INPUT_POST, 'Price');

$sql = "INSERT INTO movie(movie_name, movie_lang, movie_genre, ratings, movie_des, price)
 VALUES('$Name', '$Language', '$Genre','$Ratings','$Description','$Price')";
$result = mysqli_query($conn, $sql);

$filename = $_FILES["poster_img"]["name"];
$tempname = $_FILES["poster_img"]["tmp_name"];
$folder = "posters/" . $filename;

// Get all the submitted data from the form 
$sql2 = "INSERT INTO poster(movie_name, poster_img) 
     VALUES ('$Name','$filename')";

// Execute query 
if (mysqli_query($conn, $sql2)) {

    // Now let's move the uploaded image into the folder: image 
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}
$result2 = mysqli_query($conn, "CALL TAX_CALC()");
if ($result2) {

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='AdminPage.php';
    </script>");
}

mysqli_close($conn);
