<?php

session_start();

$uname = $_POST["username"];
$u_email = $_POST["email"];
$phone_no = $_POST["phone_number"];
$password = $_POST["password"];
$con_pword = $_POST["c_password"];

echo $password;
echo $con_pword;

$pword = password_hash($password, PASSWORD_BCRYPT);
$c_pword = password_hash($con_pword, PASSWORD_BCRYPT);

$token = bin2hex(random_bytes(15));



$servername = "localhost";
$username = "root";
$db_password = "";
$database = "user";

// Create connection
$conn = new mysqli($servername, $username, $db_password, $database);

$result_uname = $conn->query("SELECT username FROM account_data WHERE username = '$uname'");
$result_email = $conn->query("SELECT username FROM account_data WHERE email = '$u_email'");

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

$number_phone = preg_match('@[0-9]@', $phone_no);

if (!$number_phone || strlen($phone_no)!=10) {
	$_SESSION['msg'] = "Invalid Phone Number";
	header('location:signup.php');

	
}else{

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
{
	$_SESSION['msg'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
	header('location:signup.php');


}else{

if ($_POST["password"] != $_POST["c_password"]){
	$_SESSION['msg'] = "Password don't match";
	header('location:signup.php');
}else{


	if($result_email->num_rows == 0){
		$sql = "INSERT INTO account_data(username, email, phone, password, token, status)
	VALUES ('$uname', '$u_email', '$phone_no', '$pword', '$token', 'inactive')";

	$insert_query = mysqli_query($conn, $sql);

	if($insert_query){

		$subject = "Account Activation";
		$body = "Hi, $uname. Click here to activate your account http://localhost/ecom/user/activate.php?token=$token ";
		$sender_mail = "From: info.snssports@gmail.com";

		if (mail($u_email, $subject, $body, $sender_mail)) {
		    $_SESSION['msg'] = "Check your mail to activate your account $u_email";
		    header('location: login.php');
		} else {
		    echo "Email sending failed...";
		}
			}

	}else{
		$_SESSION['msg'] = "Email already exists.";
		header('location:signup.php');
		
 }}}
}




?>