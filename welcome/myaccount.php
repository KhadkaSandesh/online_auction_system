<?php   

session_start();
if (isset($_SESSION['username'])) {

$usr_name = $_SESSION['username'];


	


include_once('../sns/connection.php');
$database_user = 'user';
$conn = mysqli_connect($servername, $username, $password, $database_user);
$conn_placedbids = mysqli_connect($servername, $username, $password, $database_user);
$user_data = "SELECT * from account_data WHERE username = '$usr_name'";
$user_data_exe = mysqli_query($conn, $user_data);
$conn_products = mysqli_connect($servername, $username, $password, 'products');

$query_user = "SELECT * from placed_bids WHERE username = '$usr_name'";
$query_user_exe = mysqli_query($conn, $query_user);

// $query_product = "SELECT * from products WHERE ad_username = '$usr_name'";
// $query_product_exe = mysqli_query($conn_products, $query_product);

while($usr_data = mysqli_fetch_assoc($user_data_exe)){
	$user_email = $usr_data['email'];
	$user_phone = $usr_data['phone'];
	$account_status = $usr_data['status'];
	$user_balance = $usr_data['user_balance'];

}

$user_bidsdata = "SELECT * from placed_bids WHERE username = '$usr_name'";
$user_bidsdata_exe = mysqli_query($conn_placedbids, $user_bidsdata);












?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Account</title>
	<link rel="stylesheet" type="text/css" href="myaccount.css">
</head>
<body>
	<a href="../welcome/welcome.php"><button style="background-color: green; color: white; padding:6px; cursor: pointer;">HOME</button></a>



	<div class="user_details">

		<h2>Account Details</h2>
		Name: <?php echo $usr_name;   ?><br><br>
		Email: <?php echo $user_email;   ?> <br><br>
		Phone Number: <?php echo $user_phone;   ?> <br><br> 
		Account Status: <?php echo $account_status;   ?><br><br>
		Wallet Balance: <span style="font-weight: bold;">Rs. <?php echo $user_balance; ?> </span>&nbsp &nbsp<button id="balance_add_button" style="cursor: pointer; background-color: #54B435; color: white; padding: 3px 10px;">ADD</button><br><br>
		<button style="cursor: pointer;" class="pwdchange">Change Password</button>


		
	</div>


	<div class="user_ads_info">
		<h2>Products Details</h2>
		<div class="myads">
			<h2>My Ads:</h2> <a style="border:2px solid blue; padding:  5px; text-decoration: none; color: green;" href="add_pro.php">Add Product</a><br><br>

			<table>
				<tr>
					<th width="400px;">Product</th>
					<th width="150px;">Minimum price</th>
					<th>Latest bid price</th>
					<th>Status</th>
					<th>Edit</th>

				</tr>

				<?php 
				$query_product_exe = $conn_products->query("SELECT * from products WHERE ad_username = '$usr_name'");
				while ($user_result=mysqli_fetch_assoc($query_product_exe)) { 
				
					 ?>

						<tr>
							<td style="text-align: center; font-size:18px; font-weight:italic;" class="item_pic">
								<a style="text-decoration: none;" href="../products/item.php?ID=<?php echo $user_result['ID'] ?>"><img src="../images/<?php echo $user_result['image']; ?>" height="120px" width="120px"><br><?php echo $user_result['name']; ?></td></a>
							<td>Rs. <?php echo $user_result['min_bid_amount'];  ?></td>
							<td style="text-align: center; font-size: 18px;" class="item_price">Rs. <?php echo $user_result['latest_bid_amount']; ?></td>
							<td><?php echo $user_result['status'];  ?></td>

							<td >
								<button class="edit_item" style="background: green; padding: 10px;"> <a style="color:white; text-decoration: none; font-size: 16px;" href="edit_pro.php?id=<?php echo $user_result['ID']; ?>">Edit</a></button>&nbsp<button class="del_item" style="background: red; padding: 10px;" ><a style="color:white; text-decoration: none; font-size: 16px;" href="delete_pro.php?id=<?php echo $user_result['ID']; ?>">Delete</a></button>
							</td>
							
						</tr>

						<?php
					
				}
					?>
					
				</table>
		</div>
		<br>
		<div class="mybids">
			<h2>My Bids:</h2>

						<table>
				<tr>
					<th width="400px;">Product</th>
					<th width="150px;">Your bid price</th>
					<th>Latest bid price</th>
					<th>Status</th>
					<th>Edit</th>

				</tr>

				<?php mysqli_data_seek($query_user_exe, 0); 
				$user_total_items = 0;
				$user_total_price = 0;
				while ($result=mysqli_fetch_assoc($query_user_exe)) { 
					$p_id = $result['product_id'];
					$bid_amount = $result['bid_price'];
					$status = $result['status'];


					$query_product = $conn_products->query("SELECT name,image,latest_bid_amount from products where ID=$p_id");
					while ($res=mysqli_fetch_assoc($query_product)) { ?>

						<tr>
							<td style="text-align: center; font-size:18px; font-weight:italic;" class="item_pic">
								<a style="text-decoration: none;" href="../products/item.php?ID=<?php echo $p_id ?>"><img src="../images/<?php echo $res['image']; ?>" height="120px" width="120px"><br><?php echo $res['name']; ?></td></a>
							<td>Rs. <?php echo $bid_amount;  ?></td>
							<td style="text-align: center; font-size: 18px;" class="item_price">Rs. <?php echo $res['latest_bid_amount']; ?></td>
							<td><?php echo $result['status'];  ?>
								<br> <p><?php if ($status == 'closed'  ) {
									if ($res['latest_bid_amount'] == $bid_amount) {
										?><span style="color:green;"><?php echo "won";
									?></span><?php }else{ ?><span style="color:red;"><?php echo "lost";
									?></span><?php
									}
								}  ?></p>
							</td>
							<td>
								<button class="delete_bid" style="background: red; padding: 10px;" > <a style="color:white; text-decoration: none; font-size: 16px;" href="delete_bid.php?id=<?php echo $p_id; ?>">Withdraw Bid</a></button>
								


							</td>
							
						</tr>

						<?php
					}
				}
					?>
					
				</table>



			
		</div>
		
	</div>




	<!-- Modal for changing password -->

	<div id="change_pwd_modal">
		<div class="change_pwd">
			<form method="POST" action="pwd_change.php">
				<span class="closeBtn">&times;</span>
				<h2>Password Change</h2>

				<label class="textbox">Current Password: <input type="password" name="current_pwd" required></label><br><br>
				
				<label class="textbox">New Password: <input type="password" name="new_pwd" required></label><br><br>
				
				<label class="textbox">Confirm New Password: <input type="password" name="confirm_new_pwd" required></label><br><br>

				<?php 
					if(isset($_SESSION['wrong_cur_pwd'])){ ?>
				<label style="color:red;"><?php echo "Incorrect current password."; unset($_SESSION['wrong_cur_pwd']);?></label><br><br>
			<?php } elseif (isset($_SESSION['pwd_nomatch'])){
				?>
				<label style="color:red;"><?php echo "Password don't match."; unset($_SESSION['pwd_nomatch']);?></label><br><br>
				<?php
					} ?>


				<input id="sub_change" type="submit" name="submit" value="Change Password">
				<button type="button" id="cancel_btn">Cancel</button>
					
				
			</form>
		</div>
	</div>

	<!-- Checking when password change request is submitted -->

	<?php if(isset($_SESSION['pwd_change'])){?>
		<div class="pwd_change_modal">
			<div class="pwd_success">
				<span id="closeBtn">&times;</span>
				<?php echo $_SESSION['pwd_success'];unset($_SESSION['pwd_change']);?><br><br>
				<button type="button" class="ok_btn">OK</button>
				
			</div>
		</div><?php }; ?>



<!-- Modal for displaying bids placed and updated confirmation -->


<?php if (isset($_SESSION['new_bid_placed'])) { ?>


		<script type="text/javascript">alert('bid placed successfully.')</script>


		<?php unset($_SESSION['new_bid_placed']); } elseif (isset($_SESSION['bid_updated'])) { ?>
			<script type="text/javascript">alert('bid updated successfully.')</script>
	<?php 
	unset($_SESSION['bid_updated']);


		} }
		else{
			header('location: ../user/login.php');
		} ?>


<div id="balance_add">
	<div id="balance_add_inside">
		<form action="add_balance.php" method="POST" >
			<h2>Add Balance</h2>
			<p style="color: red; font-size: large;">Enter Amount: <input type="text" name="add_amount" style="width: 100px; height: 30px;"></p><br>
			<button style="color: white; margin-left: 200px; background-color: #379237; padding: 3px 7px; font-size: large; cursor: pointer;">Add</button>
			<button type="button" id="balance_add_cancel" style="color: white; background-color: #E0144C; padding: 3px 7px; margin-left: 5px; font-size: large; cursor: pointer;">Cancel</button>
		</form>

	</div>
	

</div>
	
	




<script type="text/javascript" src="main.js"></script>


</body>
</html>