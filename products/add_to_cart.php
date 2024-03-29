<?php
session_start();


if (!isset($_SESSION['is_login'])) {
	$no_login_err = 'You need to login first.';
	$_SESSION['no_login'] = $no_login_err;
	header('location: ../user/login.php');

}else{

include_once('../sns/connection.php');

$user_name = $_SESSION['user_name'];
$item_id = $_SESSION['item_id'];

$database_pro = 'products';
$database_user = 'user';
$conn = mysqli_connect($servername, $username, $password, $database_pro);
$query_pro = "SELECT price FROM products where id=$item_id";
$result = mysqli_query($conn, $query_pro);

while ($pro_det = mysqli_fetch_assoc($result)) {
	$pro_price = $pro_det['price'];
}

$user_name = $_SESSION['user_name'];
$item_id = $_SESSION['item_id'];


$quantity_no = $_POST['quantity_no'];

include_once('../sns/connection.php');


$total_pro_price = $quantity_no * $pro_price;

$conn_user = mysqli_connect($servername, $username, $password, $database_user);
$query_cart = "SELECT * FROM user_cart WHERE username = '$user_name' and product_id = '$item_id'";
$res_cart = mysqli_query($conn_user, $query_cart);

if($res_cart->num_rows  > 0){
	while ($res_already_exist = mysqli_fetch_assoc($res_cart)){
		$no_item = $res_already_exist['no_of_items'];
		$tot_price = $res_already_exist['total_price'];
		$new_total_price = $tot_price + $total_pro_price;
		$new_total_items = $no_item + $quantity_no;

		$sql = $conn_user->query("UPDATE user_cart SET no_of_items = '$new_total_items', total_price = '$new_total_price'");
		if($sql){
		// echo "Item successfully added";
		$_SESSION['cart'] = "Item added to cart";
		header('location:user_cart.php');

		}
}}
else{

$sql = $conn_user->query("INSERT into user_cart(username, product_id, no_of_items, total_price) VALUES('$user_name', '$item_id', '$quantity_no', '$total_pro_price')");

if ($sql) {
	// echo "Item successfully added to cart. ";
	$_SESSION['cart'] = "Item added to cart";
	header('location:user_cart.php');
}
}
}

?>