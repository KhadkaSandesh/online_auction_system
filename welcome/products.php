<?php 

$category_name = $_GET['category'];

session_start();


include_once('../sns/connection.php');
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);
$query = "SELECT * from products where category = '$category_name' and status='approved'";

$result = mysqli_query($conn ,$query);
$result1 = mysqli_query($conn ,$query);

if (isset($_SESSION['user_name'])) {
	

$usr_name = $_SESSION['user_name'];
// $_SESSION['user_name'] = $usr_name;
}



$no_of_products = mysqli_num_rows($conn->query("SELECT ID from products where category='$category_name' and status='approved'"));
// echo $no_of_products;

$total_rows = $no_of_products/5;










?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<a href="../welcome/welcome.php"><button style="background-color: green; color: white; padding:6px; cursor: pointer;">HOME</button></a>


	<h2 style="margin-left: 25px;">Category: <?php echo $category_name; ?></h2>

		<?php for ($i=0; $i <$total_rows ; $i++) { 
			
		?>

		<div class="pro_container">
			
			<?php

				$counter = 0;
				$max = 5;

				while($rows=mysqli_fetch_assoc($result) and ($counter < $max)){
					$proid = $rows['ID'];

					$min_bid_amount = $rows['min_bid_amount'];
					$latest_bid_amount = $rows['latest_bid_amount'];
			
					$counter++;
					


			?>
			
			<div class="item">

				<a href="../products/item.php?ID=<?php echo $proid;?>"><?php ?><img src="../admin_panel/image/<?php echo $rows['image'] ?>" height="170px" width="170px">
				<p class="item_name"><?php echo $rows['name']; ?></p>
				<h4><?php if ($min_bid_amount < $latest_bid_amount) { 
					echo "Rs. ".$latest_bid_amount;
					
				}else{ echo "Rs. ".$min_bid_amount;  }?></h4>

				<p id="item-det"><span>View Details</span></p></a><br>
				

			</div> <br>

			

<?php
				} 
			?>
		</div>
		<br>

<?php } ?>


</body>
</html>