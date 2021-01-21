<?php
session_start();
include "db/dbcon.php";
include('navbar1.html');
if(empty($_SESSION['login_ip'])){
  
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Login First');
    window.location.href='UserLogPage.php';
    </script>");

}
?>
<html>
  <link rel="stylesheet" href="css/styles.css">
  <style>
    .reset{
      margin-left:500px;
    }
    </style>
  <body>
  <div class="user_login reset" >
      <form action="" method="POST" class="inputform">
        <img src="assets/icons/laptop-user.png"><br></br>
        <input type="text" name="password" placeholder=" Old Password" required><br></br>
        <input type="password" name="newpass" placeholder=" New Password" required><br></br>
        <input type="submit" value="Reset" class="uni-btn">
      </form>
    </div>
  </body>
</html>
<?php
$Suser_id = $_SESSION["session_user"];
$password = filter_input(INPUT_POST, 'password');
$newpass = filter_input(INPUT_POST, 'newpass');
 
$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$Suser_id'");
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
    

    $sql1 = mysqli_query($conn, "UPDATE user SET pword = '$newpass' WHERE user_id='$Suser_id'");
    $row1 = mysqli_fetch_array($sql1);

    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Password Reset Successful');
    window.location.href='movie_desc.php';
    </script>");
    exit;
  }
  else{
    // INCORRECT PASSWORD
    $error_message = "Incorrect old Password.";
  }
}
else{
  // Username NOT REGISTERED
  $error_message = "Incorrect old Password.";
}


?>