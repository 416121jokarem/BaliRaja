<?php
	//session_start();
	//unset($_SESSION['sess_user']);
	//session_destroy();
	if(isset($_COOKIE['old_mobile']) and isset($_COOKIE['new_mobile']))
	{
	 setcookie("sess_user","",time()-432000);
	  setcookie("id","",time()-432000);
	  setcookie("name","",time()-432000);
	  setcookie("recommendation","",time()-432000);
	  setcookie("result","",time()-432000);
	  setcookie("cultivation_month","",time()-432000);
		setcookie("n","",time()-432000);
		setcookie("p","",time()-432000); 
		setcookie("k","",time()-432000);
		setcookie("phmin","",time()-432000);
		setcookie("phmax","",time()-432000);
		setcookie("irrigation","",time()-432000);
		setcookie("soiltype","",time()-432000);
		setcookie("budget","",time()-432000);
		setcookie("area","",time()-432000);
		setcookie("crop_name","",time()-432000);
		setcookie("chradio","",time()-432000);
			setcookie("old_mobile","",time()-432000);
		setcookie("new_mobile","",time()-432000);
	}
	else
	{
		echo"<script>alert('Cannot Update Mobile Number,Please try again!')</script>";
		header("Location:index.php");
		
	}
		//setcookie("googtrans", "", time()-432000);
		
			// setcookie("namem","",time()-432000);
			// setcookie("statem","",time()-432000);
			// setcookie("districtm","",time()-432000);
			// setcookie("languagem","",time()-432000);
	//header("Location: index.php");
	?>
<html>
	<head>
		<title>Change Mobile Number </title>
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
				<h1 class="display-5">Thank you !</h1>
				<center>
				<p class="lead">Phone Number Updated Successfully to <strong>BaliRaja<strong></p>
				<br>
				<p class="lead">Please login with Updated Phone Number.</p>
				<hr>
				<p>
				<center>
				<h1 class="display-5">
				</h1>
				<center>
				<p class="lead">Have trouble ? &nbsp&nbsp<a href="contact.php">Contact Us</a></p>
				</p>
				<p class="lead">
					<a class="btn btn-primary btn-sm" href="index.php" role="button">Click Here to go back to Home page</a>
				</p>
			</div>
		</div>
	</body>
</html>