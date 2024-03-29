
<?php 

session_start();

if(isset($_POST['send_mail'])) {
	$user_email = $_POST['email'];

	include "../sns/connection.php";
	$database = 'user';

	$conn = mysqli_connect($servername, $username, $password, $database);

	$query = "SELECT * FROM account_data WHERE email= '$user_email'";
	$user_data = mysqli_query($conn, $query);

	$num_user_data = mysqli_num_rows($user_data);
	echo $num_user_data;

	if ($num_user_data != 0) {
		$user_fetch_data = mysqli_fetch_assoc($user_data);
		$user_token = $user_fetch_data['token'];



		$subject = "Password Recovery";
		$body = "Click here to reset your account password. http://localhost/ecom/user/reset_pwd.php?token=$user_token";
		$sender_mail = "From: info.snssports@gmail.com";

		if (mail($user_email, $subject, $body, $sender_mail)) {
		    $_SESSION['msg'] = "Check your mail to reset your password.";
		    header('location:login.php');
		}

		
	}else{
		$_SESSION['msg'] = "Invalid Email";
		header('location:recover_password.php');
	}

	


}else{

}

?>