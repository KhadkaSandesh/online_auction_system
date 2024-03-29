<?php
session_start();

$user_name = $_SESSION['username'];
$current_pwd = $_POST['current_pwd'];
$new_password = $_POST['new_pwd'];
$confirm_new_pwd = $_POST['confirm_new_pwd'];

$success = "Password changed successfully";
$pwd_no_match = "Password don't match. Check again";
$wrong_cur_pwd = "Incorrect current password";

include_once('../admin_panel/connection.php');

$database = 'user';
$conn = mysqli_connect($servername, $username, $password, $database);

if($new_password != $confirm_new_pwd){
	$_SESSION['pwd_change'] = false;
	$_SESSION['pwd_success'] = $pwd_no_match;
	header('location:myaccount.php');
	
}else{

$check_cur_pwd = $conn->query("SELECT password from account_data WHERE username = '$user_name'");

$rows = mysqli_fetch_assoc($check_cur_pwd);
$rec_cur_pwd = $rows['password'];
$pass_decode = password_verify($current_pwd, $rec_cur_pwd);
$new_pass = password_hash($new_password, PASSWORD_BCRYPT);

if($pass_decode){
	$sql = $conn->query("UPDATE account_data SET password='$new_pass' WHERE username= '$user_name'");

	if($sql){
		header('location: myaccount.php');
		$_SESSION['pwd_success'] = $success;
		$_SESSION['pwd_change'] = false;

}
	
}else{
	$_SESSION['pwd_change'] = false;
	$_SESSION['pwd_success'] = $wrong_cur_pwd;
	header('location:myaccount.php');

}}





?>