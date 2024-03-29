
<?php 

session_start();
$username = $_SESSION['username'];

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="add_pro.css">
</head>
<body>
	<form method="POST" action="add_pro_after.php" class="edit_pro" enctype="multipart/form-data">
		<div class="login">
			<h1>Add Product</h1>

			<div class="textbox">
				Name:<input type="text" name="pro_name">
			</div>

			<div class="textbox">Image:
				<input type="file" name="pro_image">
			</div>

			<div class="textbox">Min Bid Amount:
				<input type="text" name="min_bid_amount" >
			</div>

			<div class="textbox">Description:
				<textarea name="pro_desc" rows="11" cols="70"></textarea>
			</div>

			<div class="textbox">Category:
				<select name="pro_category" rows="11" cols="70">
					
					<option value="real_estate">Real Estate</option>
					<option value="electronics">Electronics</option>
					<option value="furnitures">Furnitures</option>
					<option value="clothing">Clothing</option>
					<option value="motors">Motors and Tools</option>
					<option value="video_games">Video Games Accessories</option>
				</select>
			</div>




			<div class="buttons">
				<input id="add_btn" type="submit" name="submit" value="ADD">
				<a href="myaccount.php"><button type="button" id="cancel_btn">CANCEL</button></a>
			</div>
			
		</div>
	</form>



</body>
</html>