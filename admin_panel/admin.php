<?php
session_start();
// session_destroy();
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:admin_acc.php');
	die();
}

$database_pro = 'products';
$database_order = 'user';
$database_message = 'user';


include_once('connection.php');
$conn = mysqli_connect($servername, $username, $password, $database_pro);

$query = "select * from products";
$result = mysqli_query($conn ,$query);

$conn_order = mysqli_connect($servername, $username, $password, $database_order);
$query_order = "select * from placed_bids";
$result_order = mysqli_query($conn_order, $query_order);
if ($result_order === FALSE){
	echo "wrong query";
}

$conn_message = mysqli_connect($servername, $username, $password, $database_message);
$query_message = "SELECT * from messages WHERE status='not_replied'";
$result_message = mysqli_query($conn_message, $query_message);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<body>
	<div class="top">
		<h1 class="admin_panel"><a style="text-decoration:none; color: #06283D;" href="admin.php">Admin Panel</a></h1>
		<ul class="top_list">
			<a id="show_products"><li><h3 class="open_product">Products</h3></li></a>
			<a id="show_orders"><li><h3 class="open_orders">Orders</h3></li></a>
			<a id="show_messages"><li><h3 class="open_messages">Messages</h3></li></a>
		</ul>
		<a href="logout.php"><h3 class="login-btn">Logout</h3></a>
		
	</div>

	

	<div class="products">

		<!-- <a href="pro_add.php"><button id="add_btn"><h3>Add</h3></button></a> -->

		<form method="POST">
			<input type="text" name="search_str" id="myInput" placeholder="Search Here" style="margin-left: 450px; padding: 5px; border: 1px solid black; width: 300px;" id="search_box">
			<input type="submit" name="submit_search" value="Search" style="padding: 5px;">
		</form>

		<h2 class="pro_title">Products</h2>
		<table cellspacing="20px">
			<tr>
				<th style="width: 15px;">ID</th>
				<th>Product</th>
				<th>Min Bid Amount</th>
				<th>Description</th>
				<th>Status</th>
				<th style="width: 150px;">Edit</th>
			</tr>

			<?php

			if (isset($_POST['submit_search'])) {
				$_SESSION['search'] = TRUE;
				if ($_SESSION['search']) {
				
				$search_str = $_POST['search_str'];
				$query_pro_search = "SELECT * FROM products WHERE ID = '$search_str'";
				$search_result = mysqli_query($conn, $query_pro_search);
				if (mysqli_num_rows($search_result)){
					while($rows=mysqli_fetch_assoc($search_result)){
						?>
						<tr>

							<td><?php echo $rows['ID']; ?></td>
							<td><img src="../images/<?php echo $rows['image']; ?>" height="120px" width="120px"><br><?php echo $rows['name']; ?></td></td>
							<td><?php echo $rows['min_bid_amount']; ?></td>
							<td><?php echo $rows['descr']; ?></td>
							<td><?php echo $rows['status']; ?></td>

							<td><button onClick="alert('hello');" class="edit_item" > <a href="approve_pro.php?id=<?php echo $rows['ID']; ?>">Approve</a></button>&nbsp<button class="del_item" ><a href="delete_pro.php?id=<?php echo $rows['ID']; ?>">Delete</a></button>&nbsp&nbsp</td>

						</tr>

					<?php }
					



				} else{
					?> <p style="font-size: 18px; color: red; margin-left:10px;"><?php echo "**** No product with given ID exists in database"; ?></p>
					<?php 
				}
			}


				
			}
			else{

			while($rows=mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $rows['ID']; ?></td>
					<td><img src="image/<?php echo $rows['image']; ?>" height="120px" width="120px"><br><?php echo $rows['name']; ?></td>
					<td><?php echo $rows['min_bid_amount']; ?></td>
					<td><?php echo $rows['descr']; ?></td>
					<td style="text-align:left"><?php echo $rows['status']; ?></td>

					<td ><button class="edit_item" > <a onClick="confirm('Confirm Approve?');" href="approve_pro.php?id=<?php echo $rows['ID']; ?>">Approve</a></button>&nbsp<button onClick="alert('delete?');" class="del_item" ><a href="delete_pro.php?id=<?php echo $rows['ID']; ?>">Delete</a></button>&nbsp&nbsp</td>

				</tr>
				<?php
			}
		}
			?>

		</table>
	</div>





	<div class="orders">

		<h2 class="order_title">Orders</h2>
		<table cellspacing="20px">
			<tr>
				<th style="width: 15px;">Product ID</th>
				<th>Latest bid user</th>
				<th style="width: 130px;">Latest Bid Amount</th>
				<th>Status</th>
			</tr>

			<?php

			while($rows_ord=mysqli_fetch_assoc($result_order)){
				?>
				<tr>
					<td><?php echo $rows_ord['product_id']; ?></td>
					<td><?php echo $rows_ord['username']; ?></td>
					<td><?php echo $rows_ord['bid_price']; ?></td>
					<td><?php echo $rows_ord['status']; ?></td>
				

				</tr>
				<?php
			}
			?>

		</table>





		
	</div>


	<div class="messages">

		<h2 class="message_title">Messages</h2>
		<table cellspacing="20px">
			<tr>
				<th style="width: 15px;">S.N</th>
				<th style="width: 60px;">Firstname</th>
				<th style="width: 60px;">Lastname</th>
				<th style="width: 100px;">Email</th>
				<th style="width: 300px;">Messages</th>
				<th style="width:100px;">Reply</th>
				
			</tr>

			<?php

			while($rows_message=mysqli_fetch_assoc($result_message)){
				?>
				<tr>
					<td><?php echo $rows_message['SN']; ?></td>
					<td><?php echo $rows_message['firstname'];?></td>
					<td><?php echo $rows_message['lastname']; ?></td>
					<td><?php echo $rows_message['email']; ?></td>
					<td style="text-align:left;"><?php echo $rows_message['message']; ?></td>
					<td><button class="reply_msg"><a  href="reply_msg.php?email=<?php echo $rows_message['email']; ?>">Reply</a></button></td>	

				</tr>


				<?php
			}
			?>

		</table>
		
	</div>


	
</div>


<script type="text/javascript" src="main.js"></script>

</body>
</html>