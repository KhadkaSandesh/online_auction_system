<?php
session_start();
// session_destroy();

if (!isset($_SESSION['user_login'])) {
	header('location: ../sns/index.php');
}
else{

include_once('../sns/connection.php');
$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);
$query = "SELECT * from products WHERE status = 'approved'";
$result = mysqli_query($conn ,$query);
$result1 = mysqli_query($conn ,$query);
$usr_name = $_SESSION['user_name'];
$_SESSION['username'] = $usr_name;



?>



<!DOCTYPE html>
<html>
<head>

	

	<title>SNS Online Auction</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	
	<!-- Top Navigation Bar -->

	<div class="header">
		<div class="left-logo">
			<img src="../images/logo2.png" height="80px" width="80px">
			
		</div>

		  <div class="container">
		   <!--  <div class="InputContainer">
		      <input class="search_input" placeholder="Search for products here...">
		      <i style="margin-left: 15px; margin-top: 12px; cursor: pointer;" class="fa fa-search"></i>
		    </div> -->


	 
			</div>



		<div class="right-account">
			<div class="new">
			<a href="myaccount.php" class="btn_login">MY ACCOUNT</a>
			<br>
			<button style="float: right; margin-top: 9px; background: #082032; border:none;"><a style="color: white; font-size: 16px;" href="logout.php">Logout</a></button>
			
			</div>
			
			
			
		</div>
		
	</div>
	
		<!-- Banner section using Carousel -->

	<!-- div class="front">
		<div class="carousel" data-flickity='{"wrapAround":true,"autoPlay": 2000}'>

		  <div class="carousel-cell">
		  	<img src="../images/carousel/volleyball_tor.jpg" height="400px" width="1000px">
		  </div>
		  <div class="carousel-cell">
		  	<img src="../images/carousel/football_tor.jpg" height="400px" width="1000px">
		  </div>
		  <div class="carousel-cell">
		  	<img src="../images/carousel/sale_big.jpg" height="400px" width="1000px">
		  </div>
		  
		</div> -->
		
	
	</div>


	<div class="products">
		<h2>Categories</h2>
		<div class="categories">
			<div class="cat_item">
				
				<a href="products.php?category=real_estate"><img src="../images/real_estate1.jpeg" height="160px" width="160px"></a>
				<h3>Real Estate</h3>
			</div>
			<div class="cat_item">
				
				<a href="products.php?category=electronics"><img src="../images/electronics.jpg" height="160px" width="160px"></a>
				<h3>Electronics</h3>
			</div>
			<div class="cat_item">
				
				<a href="products.php?category=furnitures"><img src="../images/furnitures.jpg" height="160px" width="160px"></a>
				<h3>Furnitures</h3>
			</div>
			<div class="cat_item">
				
				<a href="products.php?category=clothing"><img src="../images/clothing.jpg" height="160px" width="160px"></a>
				<h3>Clothing</h3>
			</div>
			<div class="cat_item">
				
				<a href="products.php?category=motors"><img src="../images/motors.jpg" height="160px" width="160px"></a>
				<h3>Motors and Tools</h3>
			</div>
			<div class="cat_item">
				
				<a href="products.php?category=video_games"><img src="../images/video_games.webp" height="160px" width="160px" style="border:none;"></a>
				<h3>Video Games Accessories</h3>
			</div>
			
		</div>



		<!-- Best Selling Products Section -->
		
		<h2>Latest Products</h2>

		<div class="pro_container">
			<?php

				$counter = 0;
				$max = 5;

				$most_latest = $conn->query("SELECT * FROM products where status = 'approved' and bid_status = 'open' ORDER BY added_time DESC");


				while($rows=mysqli_fetch_assoc($most_latest) and ($counter < $max)){
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

				<p id="item-det"><span>View Details</span></p></a>
				

			</div>

			<?php
				}
			?>


		</div>


		<!-- Recommended for You Section -->

		<h2>Most Bidded Products</h2>

		<div class="pro_container">
			<?php

			$most_bid = $conn->query("SELECT * FROM products where status = 'approved' and bid_status = 'open' ORDER BY no_of_bids DESC");

				$counter = 0;
				$max = 5;

				while($rows=mysqli_fetch_assoc($most_bid) and ($counter < $max)){
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

				<p id="item-det"><span>View Details</span></p></a>
				

			</div>

			<?php
				}
			?>


		</div>

		
		
	</div>

	<!-- Footer Section -->

	<div class="footer">
		<div class="company">
			<img src="../images/logo2.png" height="150px" width="150px">
			<p><span class="com_name">SNS SPORTS HOUSE</span> <br><br> <span class="address">160 New Baneshwor<br> Kathmandu, Nepal 44600<br> +01-4425546 </span></p>
			
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



<?php
};
?>


<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


</body>



</html>