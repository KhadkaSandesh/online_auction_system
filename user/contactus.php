<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta class="viewport" content="width=device-width, initial-scale=0.1"></meta>
	<title>Contact Form</title>
	<link rel="stylesheet" type="text/css" href="contactus.css">
	<link rel="stylesheet" link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
	
	<div class="contact-section">

		<div class="contact-info">
			<div><i class="fas fa-map-marker-alt"></i>Satdobato, lalitpur, Nepal</div>
			<div><i class="fas fa-envelope"></i>Email</div>
			<div><i class="fas fa-phone"></i>9840392920</div>
			<div><i class="fas fa-clock"></i>MON - FRI 10:00 AM to 10:00 PM</div>
		</div>
		<form action="message.php" method="POST">
		<div class="contact-form">
			<h2>Contact Us</h2>
			<form class="contact" action="" method="post">
				<input type="text" name="firstname" class="text-box" placeholder="Your First Name" required>

				<input type="text" name="lastname" class="text-box" placeholder="Your Last Name" required>

				<input type="email" name="email" class="text-box" placeholder="Your Email" required><br>
				<textarea name="message" rows="5" placeholder="Your Message" required></textarea>
				<input type="submit" name="submit" class="send-btn" value="Send">

			</form>
		</div>
		</form>
	</div>

</body>
</html>
