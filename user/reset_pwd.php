<?php 
session_start();


if (isset($_GET['token'])) {
	
	$user_token = $_GET['token'];
	$_SESSION['user_token'] = $user_token;
	?>

	<<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Password Reset</title>
		<link rel="stylesheet" type="text/css" href="signup.css">
	</head>
	<body>

		<form action="reset_success.php" method="POST">
			<div class="recover_pwd">
				<h1>Password Reset</h1>

				<?php
				if(isset($_SESSION['msg'])){ ?>

					<div class="textbox">

						<p> 
						<?php
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
							?>
					
					
						</p>
					</div>
				<?php } ?>
				<div class="textbox">
					
					<i class="fa fa-user" aria-hidden="true"></i>

					<input type="password" name="password" placeholder="Enter new password">
				</div>

				<div class="textbox">
					
					<i class="fa fa-user" aria-hidden="true"></i>

					<input type="password" name="cpassword" placeholder="Confirm new password">
				</div>


				<input class="btn" type="submit" name="reset_pwd" value="Reset Password">
				
			</div>
		</form>
	
	</body>
	</html>

	<?php
}else{
	header('location:../sns/index.php');
}




?>