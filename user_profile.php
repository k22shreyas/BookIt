<?php
session_start();
include "db/dbcon.php";
include('navbar1.html');
$_SESSION['login_ip'] = 69;
$user_id = $_SESSION["session_user"];
$sql = "SELECT username, fullname, phone, email FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

?>
<html>
<link rel="stylesheet" href="css/styles.css">
<body> 
  <style>
    h1{
      font-size:34px;
    }
    table th, tr, td{
      border-style:ridge;
      border-radius:5px;
      text-align:left;
    }
    .prof{
      margin-left:460px !important;
    }
    .resetbtn{
      margin:25px 0px -10px 0px;
    }
    </style>
<div class="history prof">
    <h1>User Profile</h1>
    <table>
      <?php

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

          $fullname = $row["fullname"];
          $phone = $row["phone"];
          $user_name = $row["username"];
          $email = $row["email"];
          
          echo
          '<tr class="table-list">
          <th style="padding:5px;">Username </th>
          <td>' . $user_name . '</td>
          <tr class="table-list">
          <th style="padding:5px;">FullName </th>
          <td>' . $fullname . '</td>
          <tr class="table-list">
          <th style="padding:5px;">User ID </th>
          <td>' . $user_id . '</td>
          <tr class="table-list">
          <th style="padding:5px;">Phone </th>
          <td>' . $phone . '</td>
          <tr class="table-list">
          <th style="padding:5px;">Email </th>
          <td>' . $email . '</td>
          </tr>';
        }
      } else {
        echo "0 results";
      }
      $conn->close();

      ?>
    </table>
    <input type="button" value="Reset Password" class="uni-btn resetbtn" onclick="window.alert('Reset password');window.location.href='reset_pass.php';">
  </div>
  <br></br>
</body>
</html>