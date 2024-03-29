<?php

session_start();
$ad_username = $_SESSION['username'];

$p_name = $_POST["pro_name"];
// $p_image = $_POST["pro_image"];
$min_bid_amount = $_POST["min_bid_amount"];
$p_desc = $_POST["pro_desc"];
$category = $_POST["pro_category"];


$servername = "localhost";
$username = "root";
$password = "";
$database = "products";


$img_name = $_FILES['pro_image']['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$sql = "INSERT INTO products(ad_username, name, image, min_bid_amount, descr, category) VALUES('$ad_username','$p_name', '$img_name', '$min_bid_amount', '$p_desc', '$category')";

if ($conn->query($sql) === TRUE) {
  ?>
  <script type="text/javascript">
    window.location.replace("myaccount.php");
    alert('product added successfully');

  </script>
  <?php
  header('location: myaccount.php');}
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }




?>