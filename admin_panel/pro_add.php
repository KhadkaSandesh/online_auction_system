
<?php 

session_start();

include "../sns/connection.php";
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="edit_pro.css">
</head>
<body>
	<form method="POST" action="add_pro.php" class="edit_pro" enctype="multipart/form-data">
		<div class="login">
			<h1>Add Product</h1>

			<div class="textbox">
				Name:<input type="text" name="pro_name">
			</div>

			<div class="textbox">Image:
				<input type="file" name="pro_image">
			</div>

			<div class="textbox">Price:
				<input type="text" name="pro_price" >
			</div>

			<div class="textbox">Description:
				<textarea name="pro_desc" rows="11" cols="70"></textarea>
			</div>

			<div class="textbox">Quantity:
				<input type="text" name="pro_quantity">
			</div>

			<div class="buttons">
				<input id="add_btn" type="submit" name="submit" value="ADD">
				<a href="admin.php"><button type="button" id="cancel_btn">CANCEL</button></a>
			</div>
			
		</div>
	</form>



</body>
</html>