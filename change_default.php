<?php
session_start();
include "db/dbcon.php";
include('Admin_navbar1.html');

?>

<html>
<link rel="stylesheet" href="css/styles.css">
<title>Change Price</title>

<body>
  <style>
    h2 {
      margin: 20px;
      font-size: 26px;
    }

    img {
      margin: 10px 0px 0px 15px;
    }

    .s-l {
      margin: 20px 0px 10px 120px;
      width: 65px;
    }

    .cont-snacks {
      margin: 0px 0px 0px -300px;
    }

    .cont-tax {
      margin: 0px 0px 0px 300px;
    }

    .cont-tax img {
      margin: 10px 0px 0px 70px;
    }
  </style>
  <div class="snacks_cont cont-snacks">
    <form action="" method="POST">
      <h2>Change Snack Prices</h2>
      <img src="assets/icons/popcorn1.png">
      <img src="assets/icons/beverage1.png">
      <br></br>
      <input type="number" class="snacks_select s-l" name="snack_change" placeholder="100">
      <br></br>
      <input style="margin-left:50px;" type="submit" value="update" class="uni-btn">
    </form>
  </div>

  <div class="snacks_cont cont-tax">
    <form action="" method="POST">
      <h2>Change Tax Percent</h2>
      <img src="assets/icons/tax-rates.png">
      <br></br>
      <input type="number" class="snacks_select s-l" name="tax_change" placeholder="%">
      <br></br>
      <input style="margin-left:50px;" type="submit" value="update" class="uni-btn">
    </form>
  </div>
</body>

</html>

<?php
$snack_change = filter_input(INPUT_POST, 'snack_change');
if (isset($snack_change)) {

  $sql = "ALTER TABLE snacks ALTER snack_amt SET DEFAULT '$snack_change'";
  $result = mysqli_query($conn, $sql);

  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Price change Successful');
    window.location.href='AdminPage.php';
    </script>");
}

$tax_change = filter_input(INPUT_POST, 'tax_change');
if (isset($tax_change)) {

  $sql = "ALTER TABLE movie ALTER tax SET DEFAULT '$tax_change'";
  $result = mysqli_query($conn, $sql);

  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Tax change Successful');
    window.location.href='AdminPage.php';
    </script>");
}
?>