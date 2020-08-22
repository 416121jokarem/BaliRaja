<?php
	//$_COOKIE['googtrans'];
	if(!isset($_COOKIE['sess_user']))
	{
	header("location:index.php");
	}
	?>
<html>
	<title>Alert Success</title>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<!-- google translate script 1-->
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<!-- Call back function 2 -->
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
		<style>
			body {
			background-image: url("images/image1.jpg");
			background-color: #cccccc;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div id="google_translate_element" align="right" ></div>
			<div class="jumbotron text-xs-center">
				<center>
				<h1 class="display-5">Thank You !</h1>
				<center>
				<p class="lead">Crop Registered Successfully to <strong>BaliRaja<strong></p>
				<br>
				<p class="lead">We will alert you in the form of SMS.</p>
				<hr>
				<p>
				<center>
				<h1 class="display-5">
				</h1>
				<center>
				<p class="lead">Have trouble ?&nbsp&nbsp<a href="contact.php">Contact Us</a></p>
				</p>
				<p class="lead">
				</p>
				<a class="btn btn-primary btn-sm" href="index.php" role="button">Click Here to go back to Home page</a>         
			</div>
		</div>
	</body>
</html>