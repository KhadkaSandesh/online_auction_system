<?php 
session_start();

include "../sns/connection.php";
$database = 'user';

if (isset($_POST['reset_pwd'])) {

	$user_token = $_SESSION['user_token'];
	
	$new_password = $_POST['password'];
	$con_password = $_POST['cpassword'];

	if ($new_password != $con_password) {
		$_SESSION['msg'] = "Password don't match.";
	}else{


		$enc_new_password = password_hash($new_password, PASSWORD_BCRYPT);

		$conn = mysqli_connect($servername, $username, $password, $database);
		$query_data = "SELECT * FROM account_data WHERE token='$user_token'";
		$user_data = mysqli_query($conn, $query_data);

		$fetched_user_data = mysqli_fetch_assoc($user_data);

		//update password

		$query_update_pwd = "UPDATE account_data SET password='$enc_new_password'";
		$pass_update = mysqli_query($conn, $query_update_pwd);
		if ($pass_update) {
			$_SESSION['msg'] = "Password reset successful. Please login with new password.";
			header('location:login.php');
		}else{
			$_SESSION['msg'] = "Something went wrong";
			header('location: reset_pwd.php');
		}

		
	}
}



?>