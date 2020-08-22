<?php
	//$_COOKIE['googtrans'];
	if(!isset($_COOKIE['sess_user']))
	{
	header("location:index.php");
	}
	?>
<html>
	<head>
		<title>Recommendation Success </title>
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
				<p class="lead">Crop information Registered Successfully to <strong>BaliRaja<strong></p>
				<br>
				<p class="lead">Your recommended crop is</p>
				<hr>
				<p>
				<center>
				<h4 class="display-5">
					<?php 
						//$data = unserialize($_COOKIE['result']);
						//echo "1------------------";
						//echo $data;
						// echo "2------------------";
						//echo $_COOKIE['result'];//a:2:{i:0;s:5:"Jowar";i:1;s:8:"Sannhamp";}
						// echo "3------------------";
						// print_r $_COOKIE['result'];
						// echo "4------------------";
						//print_r $data;
						// echo "5------------------";
						//$var1 = unserialize($_COOKIE['result']);
						// Show the unserialized data;
						
						//print_r $var1;
						//var_dump ($var1);//array(2) { [0]=> string(5) "Jowar" [1]=> string(8) "Sannhamp" }
						//print_r $var1;
						//foreach ($var1  as $name => $var){
						// echo "variable ".$name."=";
						// var_dump($var1);
						//}
						//echo $var1;
						//print_r $var1;
						//$data = json_decode($_COOKIE['result'], true);
						//echo $data;
						echo $_COOKIE['result'];
						//echo $data1;
						//echo $comma_separated; // lastname,email,phone
						
						// Empty string when using an empty array:
						//var_dump(implode(' ', $_COOKIE['result']);
						?>
				</h4>
				<center>
				<p class="lead">Have trouble ?&nbsp&nbsp<a href="contact.php">Contact Us</a></p>
				</p>
				<p class="lead">
					<a class="btn btn-primary btn-sm" href="index.php" role="button">Click Here to go back to Home page</a>
				</p>
			</div>
		</div>
	</body>
</html>