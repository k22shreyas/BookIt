<?php
session_start();

require "db/dbcon.php";
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
if(mysqli_num_rows($query) > 0){
  $row = mysqli_fetch_assoc($query);
  $user_db_pass = $row['pword'];

//decrypting the pass using global variables

  global $pdo;
  $pdo = new PDO('mysql:host=localhost;dbname=movie_db', 'root', '');
  $key='kar';
  $tmppass = $user_db_pass;
  
  function mysql_aes_decrypt($tmppass, $key) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT AES_DECRYPT(?, ?)");
    $stmt->execute(array($tmppass, $key));
    return $stmt->fetchColumn(0);
  }
  $decrypt_pass = mysql_aes_decrypt($tmppass, $key);

//end of pass decrypt

  if($password === $decrypt_pass){
    session_regenerate_id();

    $sql1 = mysqli_query($conn, "SELECT user_id FROM user WHERE username='$username'");
    $row1 = mysqli_fetch_array($sql1);
    $_SESSION["session_user"]= $row1["user_id"];

    header('Location: homepage.php'); 
    exit;
  }
  else{
    // INCORRECT PASSWORD
    $error_message = "Incorrect Email Address or Password.";
  }
}
else{
  // EMAIL NOT REGISTERED
  $error_message = "Incorrect Email Address or Password.";
}
?>
