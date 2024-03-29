<?php 

session_start();

$pro_id = $_GET['id'];
$_SESSION['pro_id'] = $pro_id;

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);

$product_data = "SELECT * FROM products WHERE ID='$pro_id'";
$pro_query = mysqli_query($conn, $product_data);

$approve_query = "UPDATE products SET status = 'approved' where ID = '$pro_id'";
$approve_query_exe = mysqli_query($conn, $approve_query);

header('location: admin.php');








?>