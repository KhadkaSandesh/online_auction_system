<?php

session_start();

$conn_user = mysqli_connect("localhost","root","","user");

$username = $_SESSION['username'];
echo $username;
$add_amount = $_POST['add_amount'];
echo $add_amount;

$user_data = "SELECT * FROM account_data where username = '$username'";
$user_data_exe = mysqli_query($conn_user, $user_data);

while ($row = mysqli_fetch_assoc($user_data_exe)) {
	$user_balance = $row['user_balance'];
	echo $user_balance;
}

$add_query = "UPDATE account_data SET user_balance = $user_balance + $add_amount";
$add_query_exe = mysqli_query($conn_user, $add_query);

if ($add_query_exe) {
	header('location: myaccount.php');
}






?>