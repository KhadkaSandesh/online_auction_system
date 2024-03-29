<?php

session_start();


include '../sns/connection.php';

$database = 'user';
$conn = mysqli_connect($servername, $username, $password, $database);


if(isset($_GET['token'])){

	$token = $_GET['token'];


	$updatequery = "UPDATE account_data SET status='active' WHERE token = '$token'";

	$query = mysqli_query($conn, $updatequery);

	if($query){
		
			$_SESSION['msg'] = "Account verified successfully.";
			header('location:login.php');

		
	}else{
		$_SESSION['msg'] = "Account not verified.";
		echo 'failed';
			header('location:signup.php');
	}
}
else{
	echo "no token";
}



?>