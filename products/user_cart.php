<?php

session_start();
include_once('../sns/connection.php');
$db_user = 'user';
$db_products = 'products';
$usr_name = $_SESSION['user_name'];



$conn_userdb = mysqli_connect($servername, $username, $password, $db_user);

$conn_products = mysqli_connect($servername, $username, $password, $db_products);

$query_user = $conn_userdb->query("SELECT * FROM user_cart where username='$usr_name'");

if ($query_user->num_rows == 0) {
	echo "You have no items in your cart list.";
}else{

	?>




	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="user_cart.css">
		<title>My Cart</title>
	</head>
	<body>
		<div class="fullcart">
		<div class="cart_items">
			<?php if (isset($_SESSION['cart'])) { ?>
			
			<p style="margin-left:20px; font-weight:bold; color: green;"><?php echo $_SESSION['cart']; unset($_SESSION['cart']); ?></p>


		<?php } ?>
			<h3 style="text-align: center;">My Cart (<?php echo $query_user->num_rows ;  ?> items)</h3>
			<table cellspacing="20px">
				<tr>
					<th width="400px;">Product</th>
					<th width="100px;">Quantity</th>
					<th width="150px;">Price</th>

				</tr>

				<?php mysqli_data_seek($query_user, 0); 
				$user_total_items = 0;
				$user_total_price = 0;
				while ($result=mysqli_fetch_assoc($query_user)) { 
					$p_id = $result['product_id'];
					$query_product = $conn_products->query("SELECT name,image from products where ID=$p_id");
					while ($res=mysqli_fetch_assoc($query_product)) { ?>

						<tr>
							<td style="text-align: center; font-size:18px; font-weight:italic;" class="item_pic"><img src="../images/<?php echo $res['image']; ?>" height="120px" width="120px"><br><?php echo $res['name']; ?></td>
							<td style="text-align: center; font-size: 18px;" class="item_quantity"><?php $num_items = $result['no_of_items']; $user_total_items += $num_items; echo $num_items; ?></td>
							<td style="text-align: center; font-size: 18px;" class="item_price">Rs. <?php $total_price = $result['total_price']; $user_total_price += $total_price; echo $total_price; ?></td>
						</tr>

						<?php
					}
				}
					?>
					
				</table>

			</div>
		

			<div class="cart_summary">
				

				<h2>Summary</h2>
				<div class="price_details">
					<h3>The Total Amount Of</h3>
					<table class="price_only">
						<tr>
							<td id="price_header">Product amount</td>
							<td id="price">Rs.<?php echo $user_total_price; ?> </td> 
						</tr>
						<tr>
							<td id="price_header">Shipping Charge</td>
							<td id="price">Rs.<?php $shipping_charge = $user_total_price*0.05; echo $shipping_charge;?> </td> 
						</tr>

					</table>
					<div class="total_amt">
						<table>
							<tr>
								<th id="price_header">The total amount of</th>
								<td id="price">Rs.<?php echo $user_total_price + $shipping_charge; ?> </td> 
							</tr>
						</table>

						<button class="checkout_btn">CHECKOUT</button>

						
					</div>
					
				</div>
				<div class="coupon">
					<p>Add a discount code (optional)</p>
					<input type="text" name="coupon_code"> <button>Apply Code</button>
					
				</div>

				<div class="delivery">
					<h4>Expectd delivery date</h4>
					<p>September 27th 2021 - September 29th 2021</p>
					
				</div>

			</div>
				
			</div>
			<?php
				};
				?>


<div id="checkout_modal">
		<div class="checkout">
			<form method="POST" action="checkout.php">
				<span class="closeBtn">&times;</span>
				<h2 style="text-align:center;">Shipping Details</h2>


					<label>
						<span style="font-weight:bold;">Name:</span> <?php echo strtoupper($usr_name) ;  ?>
					</label><br><br>

					<label>
						<span style="font-weight:bold;">Shipping Address:</span> <input style="padding:7px; width:400px; border-radius: 10px;" type="text" name="address">
					</label><br><br>

					<label>
						<span style="font-weight:bold;">Phone Number:</span> <input style="padding:7px; width:200px; border-radius: 10px;" type="text" name="phone_number">
					</label>


				<h4 style="text-align:center; margin-top: 50px;">Select Payment Method</h4>

				<table cellspacing="60px">
					<tr>
						<th>
							<label>
								<input type="radio" name="pay_method" value="visa" checked>
								<img src="../images/visa.png" height="80px" width="140px">
							</label>
						</th>
						
						<th>
							<label>
								<input type="radio" name="pay_method" value="mastercard" >
								<img src="../images/mastercard.png" height="80px" width="80px">
							</label>
						</th>

						<th>
							<label>
								<input type="radio" name="pay_method" value="paypal">
								<img src="../images/paypal.png" height="80px" width="120px">
							</label>
						</th>

						<th>
							<label>
								<input type="radio" name="pay_method" value="cod">
								<img src="../images/cod.jpg" height="80px" width="80px">
							</label>
						</th>
					</tr>

					
				</table>

				

			<div class="checkout_opt" style="margin-left: 40%;">
				<input id="submit_checkout" type="submit" name="submit" value="Checkout">
				<button type="button" id="cancel_checkout">Cancel</button>
			</div>	
				
			</form>
		</div>



<script type="text/javascript" src="user_cart.js"></script>

</body>
</html>