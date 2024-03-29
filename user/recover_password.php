<!DOCTYPE html>
<html>
<head>
	<title>Account Recovery</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<form action="recover_pwd.php" method="POST">
		<div class="recover_pwd">
			<h1>Recover Your Account</h1>

			<?php
			session_start();
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

				<input type="text" name="email" placeholder="Enter your Email">
			</div>


			<input class="btn" type="submit" name="send_mail" value="Send Mail">
			
		</div>
	</form>

	



</body>
</html>