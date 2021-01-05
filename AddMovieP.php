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
 $result=mysqli_query($conn, $sql);

 $result2 = mysqli_query($conn,"CALL TAX_CALC()");
    if($result2){

    echo '<script>alert("Proc Done");</script>';
    }
 mysqli_close($conn);

?>