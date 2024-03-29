<?php

session_start();


?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<form method="POST" action="signup_check.php">
		<div class="login">
			<h1>Sign Up</h1>

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

				<input type="text" name="username" placeholder="Full name" required>
			</div>

			<div class="textbox">
				
				<i class="fa fa-envelope" aria-hidden="true"></i>

				<input type="email" name="email" placeholder="Email" required>
			</div>

			<div class="textbox">
				
				<i class="fa fa-phone" aria-hidden="true"></i>

				<input type="text" name="phone_number" placeholder="Phone number" required>
			</div>



			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>

				<input type="password" name="password" placeholder="Password" id="pass" required>
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>

				<input type="password" name="c_password" placeholder="Confirm Password" id="con_pass" required>
			</div>

			<div class="psw_nomatch">
				<h3 id="psw_nomatch"></h3>
				
			</div>

			<div class="signin_ins">
				<a href="login.php">Already have account?</a>
			</div>

			<input class="btn" type="submit" name="" value="Sign Up">
			
		</div>
	</form>

	



</body>
</html>