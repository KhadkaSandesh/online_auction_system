<?php 


include_once('../sns/connection.php');
session_start();

$user_name = $_SESSION['user_name']; 

$new_bid_amount = $_POST['new_bid_amount'];
$item_id = $_SESSION['item_id'];

$conn_accountdata = mysqli_connect('localhost', 'root', '', 'user');
$user_data = "SELECT * from account_data WHERE username = '$user_name'";
$user_data_exe = mysqli_query($conn_accountdata, $user_data);


$bid_data = $conn_accountdata->query("SELECT * FROM placed_bids WHERE product_id = '$item_id'");

// while($ad_user = mysqli_fetch_assoc($bid_data)){
// 	$ad_user_name = $bid_data['username'];
// }


while($usr_data = mysqli_fetch_assoc($user_data_exe)){
	$user_email = $usr_data['email'];
	$user_balance = $usr_data['user_balance'];
}


if (!isset($_SESSION['is_login'])) {
	$no_login_err = 'You need to login first.';
	$_SESSION['no_login'] = $no_login_err;
	header('location: ../user/login.php');

	}
else{


$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);
$query1 = "SELECT * FROM products where ID=$item_id";
$query1_exe = mysqli_query($conn, $query1);

while($product_data = mysqli_fetch_assoc($query1_exe)){
$db_price = $product_data['latest_bid_amount'];
$min_bid_amount = $product_data['min_bid_amount'];
$no_of_bids = $product_data['no_of_bids'];
$ad_user_name1 = $product_data['ad_username'];
}


if ($ad_user_name1 == $user_name) {
	$_SESSION['same_user_error'] = "You cannot place bid in your own product";
	header('location: item.php?ID='.$item_id);
	echo $ad_user_name1;
	echo $user_name;

}else{

if ($no_of_bids > 9){
	$_SESSION['bid_reached'] = "Bid for this product has been closed recently.";
	header('location: item.php?ID='.$item_id);
}else{

if ($new_bid_amount == '') {
	$no_amount_error = "Invalid Amount";
	$_SESSION['no_amount_error'] = $no_amount_error;
	$URL = 'item.php?ID=$item_id';
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	header('location: item.php?ID='.$item_id);

	echo "error";
}else{
	
	if ($new_bid_amount <= $db_price) {
		$_SESSION['less_bid_amount'] = "Bid amount must be greater than ".$db_price;
		header('location: item.php?ID='.$item_id);

		

		echo "less than previous";
	}elseif ($new_bid_amount <= $min_bid_amount) {
		$_SESSION['less_bid_amount'] = "Bid amount must be greater than ".$min_bid_amount;
		header('location: item.php?ID='.$item_id);
		

	}

	elseif ($new_bid_amount > $user_balance) {
		$_SESSION['low_balance'] = "You don't have enough balance in your wallet.";
		header('location: item.php?ID='.$item_id);
	}

	else{







echo $new_bid_amount;
echo $item_id;

//record bid records in database

$conn_user = mysqli_connect('localhost', 'root', '', 'user');

$check_if_bidded = "SELECT * FROM placed_bids WHERE username = '$user_name' and product_id = '$item_id'";
$check_if_bidded_exe = mysqli_query($conn_user, $check_if_bidded);


if (mysqli_num_rows($check_if_bidded_exe) < 1) {

$insert_bid_details = "INSERT INTO placed_bids (username, product_id, bid_price) VALUES ('$user_name', '$item_id', '$new_bid_amount')";
$exe_bid_details = mysqli_query($conn_user, $insert_bid_details);
$bidamt_update_query = "UPDATE products SET latest_bid_amount = $new_bid_amount WHERE ID=$item_id";
$bidno_update_query = "UPDATE products SET no_of_bids = $no_of_bids + 1 WHERE ID=$item_id";
$bid_user_query = "UPDATE products SET high_bid_user = '$user_name' WHERE ID =$item_id";

if ($no_of_bids == 9) {
	$bid_close_query = $conn_user->query("UPDATE placed_bids SET status = 'closed' WHERE product_id =$item_id");

	$subject = "You won the bid.";
		$body = "Congratulation!! You won the bid. Check your account to proceed to the payment process. ";
		$sender_mail = "From: info.snssports@gmail.com";

		mail($user_email, $subject, $body, $sender_mail);


}
if ($exe_bid_details) {
	$reduce_balance = "UPDATE account_data SET user_balance = $user_balance - $new_bid_amount";
	$reduce_balance_exe = mysqli_query($conn_user, $reduce_balance);
	header('location: ../welcome/myaccount.php');

}

$bid_amt_update = mysqli_query($conn, $bidamt_update_query);
$bidno_update = mysqli_query($conn, $bidno_update_query);
$highbid_user_update = mysqli_query($conn, $bid_user_query); 

$_SESSION['new_bid_placed'] = "Bid Placed Succssfully. ";
header('location: ../welcome/myaccount.php');
}
else{
	$bid_update = "UPDATE placed_bids SET bid_price = '$new_bid_amount' WHERE product_id=$item_id and username = '$user_name'";
	$latestbid_amount_query = "UPDATE products SET latest_bid_amount = '$new_bid_amount' WHERE ID =$item_id";
	$highbid_user_query = "UPDATE products SET high_bid_user = '$user_name' WHERE ID =$item_id";

	$bid_update_exe = mysqli_query($conn_user, $bid_update);
	$highbid_user_query_exe = mysqli_query($conn, $highbid_user_query);
	$latestbid_amount_query_exe = mysqli_query($conn, $latestbid_amount_query);


	if ($bid_update) {
	$reduce_balance = "UPDATE account_data SET user_balance = $user_balance - $new_bid_amount";
	$reduce_balance_exe = mysqli_query($conn_user, $reduce_balance);
	header('location: ../welcome/myaccount.php');

}


	if ($no_of_bids == 9) {

		
		$bid_closed = mysqli_query($conn, "UPDATE products SET bid_status = 'closed' where ID='$item_id'");

		$bidno_update_query = "UPDATE products SET no_of_bids = $no_of_bids + 1 WHERE ID=$item_id";
		$bidno_update = mysqli_query($conn, $bidno_update_query);

	$bid_close_query = $conn_user->query("UPDATE placed_bids SET status = 'closed' WHERE product_id =$item_id");

	$subject = "Congratulations!! You won the bid.";
		$body = "Congratulations!! You won the bid. Check your account to proceed to the payment process. ";
		$sender_mail = "From: SNSS Online Auction";

		mail($user_email, $subject, $body, $sender_mail);

		


}

	$_SESSION['bid_updated'] = "Bid Updated Successfully.";
	header('location: ../welcome/myaccount.php');
	



};

}
}
}
}
}

?>