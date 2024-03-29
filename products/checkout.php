<?php
session_start();
$username = $_SESSION['user_name'];

include '../sns/connection.php';
$database_orders = 'user';
$conn = mysqli_connect($servername, $username, $password, $database_orders);

$query_user = $conn->query("SELECT * FROM user_cart where username='$username'");

$ship_address = $_POST['address'];
$phone_no = $_POST['phone_number'];
$pay_method = $_POST['pay_method'];

header('location:user_cart.php');





















?>