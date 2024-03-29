<?php 

include "../sns/connection.php";
$database = 'user';
$conn = mysqli_connect($servername, $username, $password, $database);




if (isset($_GET['email'])) {
	$email = $_GET['email'];
	

	$query_message = "SELECT * FROM messages WHERE email='$email'";
	$query = mysqli_query($conn, $query_message);

	while($row_mes = mysqli_fetch_assoc($query)){
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="reply_msg.css">
		<title></title>
	</head>
	<body>


	<form method="POST" class="reply_msg">
		<div class="reply">
			<h1>Reply to Customer</h1>

			<div class="textbox">
				<span style="font-weight:bold;">Name:</span> <?php  echo $row_mes['firstname']; echo ' '.$row_mes['lastname'];  ?>
			</div>

			<div class="textbox">
				<span style="font-weight:bold;">Email:</span> <?php  echo $row_mes['email']; ?>
			</div>

			<div class="textbox">
				<span style="font-weight:bold;">User Message:</span><br> <?php echo $row_mes['message']; ?>
			</div>

			<div class="textbox">
				<span style="font-weight:bold;">Reply Message:</span><textarea name="admin_reply" rows="11" cols="70"></textarea>
			</div>

			<div class="buttons">
				<input type="submit" id="reply_btn" value="REPLY" name="reply_submit">
				<a href="admin.php"><button type="button" id="cancel_btn">CANCEL</button></a>
			</div>
			
		</div>
	</form>




	<?php
}

	if (isset($_POST['reply_submit'])) { 

		$to_email = $email;
		$subject = "Message From SNS Sports";
		$body = $_POST['admin_reply'];
		$sender = "From: SNSS Online Auction";

		if (mail($to_email, $subject, $body, $sender)) {

			//update message status
			$query_status = "UPDATE messages SET status='replied' WHERE email='$email'";
			$query = mysqli_query($conn, $query_status);
			?>
			<div class="reply_success">
		<div class="reply_suc_con">
			<p style="font-size:20px;"> Message sent successfully.</p>
			<a href="admin.php"><button type="button" id="return_to_home">Return to Home Page</button></a>
		</div>
		
	</div>
	<?php 
		    
		} else {
		    echo "Email sending failed...";
}







		?>
			


	
<?php
}

 

	?>


	</body>
	<script type="text/javascript" src="main.js"></script>
	</html>


<?php
}







?>

