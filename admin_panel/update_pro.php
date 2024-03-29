<?php 

session_start();

$pro_id = $_SESSION['pro_id'];

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);


if (isset($_POST['submit'])) {
	$new_name = $_POST['pro_name'];
	$new_image = $_POST['pro_image'];
	$new_price = $_POST['pro_price'];
	$new_descr = $_POST['pro_desc'];
	$new_quantity = $_POST['pro_quantity'];



	$updatequery = "UPDATE products SET name='$new_name', image='$new_image', price='$new_price', descr='$new_descr', quantity='$new_quantity' WHERE ID='$pro_id'";
	$exe_query = mysqli_query($conn, $updatequery);

	if ($exe_query) {
		header('location:admin.php');
	}

	

}





?>

