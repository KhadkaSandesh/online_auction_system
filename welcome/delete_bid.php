<?php 
session_start();

$conn_user = mysqli_connect('localhost', 'root', '', 'user');
$conn_products = mysqli_connect('localhost', 'root', '', 'products');


$product_id = $_GET['id'];
$usr_name = $_SESSION['username'];

$user_placed_bids = $conn_user->query("SELECT * FROM placed_bids WHERE username='$usr_name' and product_id='$product_id'");
while($user_placed_bids_details = mysqli_fetch_assoc($user_placed_bids)){
	$user_bid_price = $user_placed_bids_details['bid_price'];
	echo $user_bid_price;
}

$placed_bids = $conn_user->query("DELETE FROM placed_bids WHERE username='$usr_name' and product_id='$product_id'");



$account_data = $conn_user->query("SELECT * FROM account_data WHERE username='$usr_name'");
while($row = mysqli_fetch_assoc($account_data)){
	$user_balance = $row['user_balance'];
}

$db_products = $conn_products->query("SELECT * FROM products WHERE ID='$product_id'");
while ($products_result=mysqli_fetch_assoc($db_products)){
$no_of_bids = $products_result['no_of_bids'];


$reduct_noofbids = $conn_products->query("UPDATE products SET no_of_bids= $no_of_bids-1 WHERE ID = $product_id");

if ($placed_bids) {
	$update_balance = "UPDATE account_data SET user_balance = $user_balance + $user_bid_price";
	$update_balance_exe = mysqli_query($conn_user, $update_balance);

	header('location: myaccount.php');

}else{
	echo "Error deleting data";
}
}

?>