<?php
$search_query = $_POST['search_query'];


session_start();
include_once('../sns/connection.php');
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);
$query = "select * from products ";
$result = mysqli_query($conn ,$query);
$result1 = mysqli_query($conn ,$query);


?>

<!DOCTYPE html>
<html>
<head>
	<title>SNS Online Shopping</title>
	<link rel="stylesheet" type="text/css" href="../sns/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="header">
		<div style="margin-left: 10px;">
			<h2>Search Results for: <?php echo $search_query; ?> </h2> 
		</div>

	</div>
	


	<div class="products">
		
		
		
		<div class="pro_container">
			<?php

				$counter = 0;
				$max = 5;

				while($rows=mysqli_fetch_assoc($result) and ($counter < $max)){
					$proid = $rows['ID'];
					$pro_name = $rows['name'];

					$min_bid_amount = $rows['min_bid_amount'];
					$latest_bid_amount = $rows['latest_bid_amount'];
			
					$counter++;
					
					if(strpos($pro_name, $search_query)) {
						
					


			?>
			
			<div class="item">

				<a href="../products/item.php?ID=<?php echo $proid;?>"><?php ?><img src="../admin_panel/image/<?php echo $rows['image'] ?>" height="170px" width="170px">
				<p class="item_name"><?php echo $rows['name']; ?></p>
				<h4><?php if ($min_bid_amount < $latest_bid_amount) { 
					echo "Rs. ".$latest_bid_amount;
					
				}else{ echo "Rs. ".$min_bid_amount;  }?></h4>

				<p id="item-det"><span>View Details</span></p></a>
				

			</div>

			<?php
				}
			}
			?>


		</div>
		
		
	</div>


	<div class="footer">
		<div class="company">
			<img src="../images/logo2.png" height="150px" width="150px">
			<p><span class="com_name">SNS ONLINE AUCTION</span> <br><br> <span class="address">160 New Baneshwor<br> Kathmandu, Nepal 44600<br> +01-4425546 </span></p>
			
		</div>

		<div class="follow_us">
			<p>FOLLOW US</p>
			<i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
			<i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
			<i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
	
		</div>

		<div class="contact_us">
			<p>CONTACT US</p>
			<i class="fa fa-phone" aria-hidden="true" style="color: #5b5b5b;"></i> &#160 <span style="color: #5b5b5b;">+01-5647226</span><br><br>
			<i class="fa fa-envelope" aria-hidden="true" style="color: #5b5b5b;"></i> &#160 <span style="color: #f4f5db;"> info@snssports.com.np</span><br><br> 
			<i class="fa fa-internet-explorer" style="color: #5b5b5b;"></i> &#160 <span style="color: #f4f5db;">www.snssports.com.np</span><br><br>
			<i class="fa fa-map-marker" aria-hidden="true" style="color: #5b5b5b;"></i> &#160 <span style="color: #5b5b5b;"> New Baneshwor<br> &#160 &#160 12 Kathmandu, Bagmati,<br> &#160 &#160 Nepal </span>

			
		</div>

		<div class="resources">
			<p>RESOURCES</p>
			<a href="hello.php" style="color:#e3d18a;">About Us</a><br><br>
			<a href="../user/contactus.php" style="color:#e3d18a;">Message Us</a>
			
		</div>
		
	</div>
			
	</div>

	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>
</html>