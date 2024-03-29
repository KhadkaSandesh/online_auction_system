<?php 

include "../sns/connection.php";
$database = 'user';
$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_GET['email'])) {
	$email = $_GET['email'];
	echo $email;
}




?>