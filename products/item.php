<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- 		<script>
	$(document).ready(function(){
		setInterval(function(){
			$("#show").load("item.php");
		}, 1000);
	});

</script> -->


<!-- <p id = "show"></p> -->

<?php
include_once('../sns/connection.php');
session_start();

$item_id = $_GET['ID'];
$_SESSION['item_id'] = $item_id;


$database = 'products';
$conn = mysqli_connect($servername, $username, $password, $database);
$pro_result = $conn->query("SELECT * from products where ID = '$item_id'");

if (isset($_SESSION['username'])){
	$_SESSION['is_login'] = 'yes';
	$username = $_SESSION['username'];
	$_SESSION['user_name'] = $username;


};




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="item.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<a href="../welcome/welcome.php"><button style="background-color: green; color: white; padding:6px; cursor: pointer;">HOME</button></a>

	<div class="pro_page">
		<?php while($prod_det = mysqli_fetch_assoc($pro_result)){ 

				
			?>

		<div class="pro_image">
			<img class="pro_img" src="../images/<?php echo $prod_det['image'] ?>" height="250px" width="250px">
			
		</div>
		<div class="pro_details">
		<form method="POST">
			
				<p id="pro_name"><?php echo $prod_det['name'];  ?></p>

				<?php  
				$min_bid_amount = $prod_det['min_bid_amount'];
				$latest_bid_amount = $prod_det['latest_bid_amount'];
				$timer_start = $prod_det['added_time'];
				// echo $timer_start;

				$bid_duration_time = 1340;
				if (!isset($_SESSION['time'])) {
					$_SESSION['time'] = time($timer_start);
				}else{
					$diff = time()-$_SESSION['time'];
					$diff = $bid_duration_time-$diff;

					$hour = floor($diff/60);
					$minute = (int)($diff/60);
					$second = $diff%60;

					$show = $hour.":".$minute.":".$second;

					if ($diff==0 || $diff<0) {
					 	$set_bid_close = $conn->query("UPDATE products SET bid_status = 'closed' where ID='$item_id'");

					 } else{
					 	echo "Time Remaining: ".$show;
					 }
				}
				



				 if ($min_bid_amount < $latest_bid_amount) { ?>
					<p id="pro_price">Min Bid: Rs. <?php echo $latest_bid_amount;
					
				}else{ ?>
				<p id="pro_price">Min Bid: Rs. <?php echo $min_bid_amount;} ?></p>
			



				<p><?php echo $prod_det['descr'];  ?></p><br>

				

			<?php 
		}
		?>






			<form method="POST">
				<label style="font-weight:bold; width: 10%;">Enter Bid Amount: </label> <br> 
				<div class="error" style="color:red; font-size: 17px;">

				<?php 
				if (isset($_SESSION['same_user_error'])) {
					echo $_SESSION['same_user_error'];
					unset($_SESSION['same_user_error']);
					
				}

				elseif (isset($_SESSION['no_amount_error'])) { echo "Please enter amount";
				
				unset($_SESSION['no_amount_error']);}
				elseif(isset($_SESSION['less_bid_amount'])) { echo $_SESSION['less_bid_amount'];
				unset($_SESSION['less_bid_amount']);}

				elseif(isset($_SESSION['bid_reached'])){ echo $_SESSION['bid_reached'];
				unset($_SESSION['bid_reached']);
			}

				elseif (isset($_SESSION['low_balance'])) { echo $_SESSION['low_balance'];
				unset($_SESSION['low_balance']);
				}
			
				

					?>
					</div>
				<br>
				<input type="text" name="new_bid_amount"><br><br> 

				<input type="submit" name="submit" value="Place a Bid" formaction="bid_placed.php" id="addtocart_button">
				</form>
			

				


				<p id="delivery_txt">*** Delivery All Over Nepal</p>
				
			
		</form>
		</div>

	</div>





</body>
</html>