
<?php 

session_start();

$pro_id = $_GET['id'];
$_SESSION['pro_id'] = $pro_id;

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);

$product_data = "SELECT * FROM products WHERE ID='$pro_id'";
$pro_query = mysqli_query($conn, $product_data);





while ($rows = mysqli_fetch_assoc($pro_query)) {
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="edit_pro.css">
</head>
<body>
	<form method="POST" action="update_pro.php" class="edit_pro" enctype="multipart/form-data">
		<div class="login">
			<h1>Update Product</h1>

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


			<div class="buttons">
				<input id="add_btn" type="submit" name="submit" value="UPDATE">
				<a href="myaccount.php"><button type="button" id="cancel_btn">CANCEL</button></a>
			</div>
			
		</div>
	</form>

	<?php 


}
?>


</body>
</html>