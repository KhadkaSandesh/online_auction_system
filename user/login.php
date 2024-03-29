<?php
session_start();

$no_login_err = "You need to login first.";


?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<form method="POST" action="login_check.php">
		<div class="login">
			<?php if (isset($_SESSION['no_login'])) {
				?>
				
			
			<h3 style="color: red; text-align: center;"><?php echo $no_login_err; ?></h3>
		<?php } unset($_SESSION['no_login']);?>
			
			<h1>Sign In</h1>

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

				<input type="text" name="username" placeholder="Username" id="username">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>

				<input type="password" name="password" placeholder="Password">
			</div>

			<div class="forgot_pw">
				<a href="recover_password.php">Forgot Password ?</a> 
			</div>
			<?php 
				if(isset($_SESSION['error'])){
					$error = $_SESSION["error"];
			?>
					<br><span class="inv_login" style="color:red;"><?php echo "$error"; 
					unset($_SESSION['error']); ?></span>

			<?php
				}

			?>

			<input class="btn" type="submit" name="login" value="Login">
			<div class="signup_ins">
				<a href="signup.php">Don't have account? Sign Up</a>
			</div>
			
		</div>
	</form>


	

</body>
</html>