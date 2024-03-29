<?php 

session_start();

$pro_id = $_SESSION['pro_id'];

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);


if (isset($_POST['submit'])) {
	$new_name = $_POST['pro_name'];
	$new_image = $_FILES['pro_image']['name'];
	$new_min_bid_amount = $_POST['min_bid_amount'];
	$new_descr = $_POST['pro_desc'];



	$updatequery = "UPDATE products SET name='$new_name', image='$new_image', min_bid_amount='$new_min_bid_amount', descr='$new_descr' WHERE ID='$pro_id'";
	$exe_query = mysqli_query($conn, $updatequery);

	if ($exe_query) {
		header('location:myaccount.php');
	}

	

}





?>

