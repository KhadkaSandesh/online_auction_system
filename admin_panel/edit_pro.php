
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
	<form method="POST" action="update_pro.php" class="edit_pro">
		<div class="login">
			<h1>Update Product</h1>

			<div class="textbox">
				Name:<input type="text" name="pro_name" value="<?php echo $rows['name']; ?>">
			</div>

			<div class="textbox">Image:
				<input type="text" name="pro_image" value="<?php echo $rows['image']; ?>">
			</div>

			<div class="textbox">Price:
				<input type="text" name="pro_price" value="<?php echo $rows['price']; ?>">
			</div>

			<div class="textbox">Description:
				<input type="text" name="pro_desc" style="width: 600px;" value="<?php echo $rows['descr']; ?>">
			</div>


			<div class="textbox">Quantity:
				<input type="text" name="pro_quantity" value="<?php echo $rows['quantity']; ?>">
			</div>

			<div class="buttons">
				<input type="submit" id="update_btn" value="UPDATE" name="submit">
				<a href="admin.php"><button type="button" id="cancel_btn">CANCEL</button></a>
			</div>

			
			
		</div>
	</form>

	<?php 


}
?>


</body>
</html>