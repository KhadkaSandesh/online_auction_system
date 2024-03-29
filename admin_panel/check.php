<?php

session_start();

$uname = $_POST['username'];
$password = $_POST['password'];
$error = "Invalid Login Details";

$db =mysqli_connect('localhost', 'root', '', 'admin');


$result = $db->query("SELECT * FROM admin_info where username = '$uname' and password = '$password'");

if ($result->num_rows > 0){
	$_SESSION['IS_LOGIN'] = 'yes';
	header('location: admin.php');
	
	
}
else{
	$_SESSION["error"] = $error;
	header('location: admin_acc.php');
}



?>