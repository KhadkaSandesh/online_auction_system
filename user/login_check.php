<?php
include_once('../sns/connection.php');
session_start();

$u_email = $_POST["username"];
$pword = $_POST["password"];
$error = "Invalid Details";

$database = 'user';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


# check if user exists in database
$email_search = "SELECT * FROM account_data WHERE email='$u_email'";
$query = mysqli_query($conn, $email_search);
$email_count = mysqli_num_rows($query);

if($email_count){
	$email_pass = mysqli_fetch_assoc($query);

	$db_pass = $email_pass['password'];
	$_SESSION['user_name'] = $email_pass['username'];

	$_SESSION['username'] = $email_pass['username'];

	$pass_decode = password_verify($pword, $db_pass);

	if($pass_decode){
		if($email_pass['status'] != 'active'){
			$_SESSION['msg'] = "Account not verified. Please verify to login.";
			header('location:login.php');
			
			
		}
		else{
			$_SESSION['user_login'] = 'true';
			header('location:../welcome/welcome.php')
			?>
			
			<?php 
	}


	}else{
		$_SESSION['msg'] = 'Incorrect Password';
		header('location:login.php');
			
	}
		
	
}else{
		$_SESSION['msg'] = 'Invalid Email';
		header('location:login.php');
	}



?>

