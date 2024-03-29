<?php

$p_name = $_POST["pro_name"];
// $p_image = $_POST["pro_image"];
$p_price = $_POST["pro_price"];
$p_quantity = $_POST["pro_quantity"];
$p_desc = $_POST["pro_desc"];
$p_specs = $_POST["pro_specs"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "products";


$img_name = $_FILES['pro_image']['name'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$sql = "INSERT INTO products(name, image, price, quantity, descr) VALUES('$p_name', '$img_name', '$p_price', '$p_quantity', '$p_desc')";

if ($conn->query($sql) === TRUE) {
  header('location:admin.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




?>