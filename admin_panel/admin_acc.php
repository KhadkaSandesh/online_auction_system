<?php

session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_acc.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<form method="POST" action="check.php">
		<div class="login">
			<h1>Login</h1>
			<div class="textbox">
				
				<i class="fa fa-user" aria-hidden="true"></i>

				<input type="text" name="username" placeholder="Username">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>

				<input type="password" name="password" placeholder="Password" id="pass">
			</div>


			

			<input class="btn" type="submit" name="" value="Login">
			<?php 
				if(isset($_SESSION['error'])){
					$error = $_SESSION["error"];
			?>
					<span class="inv_login"><?php echo "$error"; 
					unset($_SESSION['error']); ?></span>

			<?php
				}

			?>
			
		</div>
	</form>

	



</body>
</html>