<?php
 
	if(isset($_POST["submit"])) 
	{	 
	  $recipient="416121jokarem@gmail.com";
	  $subject=$_POST["phoneno"];
	  $sender=$_POST["name"];
	  $senderEmail=$_POST["email"];
	  $message=$_POST["mesg"];
	
	  $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";
	
	  if(mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>"))
	  {
	echo"<script>alert('Mail sent sucessfully')</script>";
	}
	else{
	echo"<script>alert('Mail not sent Please try again')</script>";
	}
	
	  //$thankYou="<p>Thank you! Your message has been sent.</p>";
	}
	
	?>
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Contact Us</title>
		<!--meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="Mulching Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
			Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);
			
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!--//meta tags ends here-->
		<!--booststrap-->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
		<!--//booststrap end-->
		<!-- font-awesome icons -->
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<!-- //font-awesome icons -->
		<!--stylesheets-->
		<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
		<!--//stylesheets-->
		<!-- Web-Fonts -->
		<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Mada:200,300,400,500,600,700,900&amp;subset=arabic" rel="stylesheet">
		<!-- //Web-Fonts -->
		<!-- google translate script 1-->
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<!-- Call back function 2 -->
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
	</head>
	<body>
		<!--headder-->
		<div class="header-outs inner_page-banner " id="home">
			<div class="headder-top">
				<!--//navigation section -->
				<!-- nav -->
				<nav >
					<div id="logo">
						<h1><a href="index.html">BaliRaja</a></h1>
					</div>
					<div id="google_translate_element" align="right"></div>
					<label for="drop" class="toggle">Menu</label>
					<input type="checkbox" id="drop">
					<ul class="menu mt-2">
						<li class="active"><a href="index.php">Home</a></li>
						<!-- <li class="mx-lg-3 mx-md-2 my-md-0 my-1"><a href="about.html">About</a></li>-->
						<?php
							if(isset($_COOKIE['sess_user']))
							{
							$con = mysqli_connect("localhost","root","","baliraja");
							 
							  if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							$n = $_COOKIE['sess_user'];
							  $q = mysqli_query($con,"SELECT farmer_name FROM farmer_details WHERE mobile_no='".$n."'");
							  $rcount = mysqli_num_rows($q);
							  $t = mysqli_fetch_row($q);
							  if(!empty($t))
							  {
							  $na = $t[0];
							echo "<li><a href='home.php'>$na</a></li>";
							  }
							else
							{
							// echo "<script>alert('')</script>"
							}
							   
								   
								   
								  
							   
							  }
							  else{  echo "<li><a href='main.php'>SignIn / SignUp</a></li>";}
							
							
							?>
						<!--<li><a href="main.php">Login</a></li>-->
						<!--<li class="mx-lg-3 mx-md-2 my-md-0 my-1">-->
						<!-- First Tier Drop Down 
							<label for="drop-2" class="toggle toogle-2">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span>
							</label>
							<a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2">
							<ul>
							  <li><a href="gallery.html" class="drop-text">Gallery</a></li>
							  <li><a href="blog.html" class="drop-text">Blog</a></li>
							</ul>
							</li>-->
						<li>
							<div id="google_translate_element" align="right" ></div>
						</li>
					</ul>
				</nav>
				<!-- //nav -->
			</div>
		</div>
		<!-- //Navigation -->
		<!--//headder-->
		<!-- short -->
		<div class="using-border py-3">
			<div class="inner_breadcrumb  ml-4">
				<ul class="short_ls">
					<!--<li>
						<a href="index.html">Home</a>
						<span>/ /</span>
						</li>
						<li>Contact</li>-->
				</ul>
			</div>
		</div>
		<!-- //short-->
		<!--contact -->
		<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
			<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
				<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact Us</h3>
				<div class="row">
					<!--//contact-map -->
					<div class="address_mail_footer_grids col-lg-6 col-md-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7603.288688029661!2d75.9206668!3d17.666996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5d57448c7b5fb%3A0x207b923d36647782!2sKandalgaon%2C%20Maharashtra%20413221!5e0!3m2!1sen!2sin!4v1591988655393!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
					<!--contact-map -->
					<div class="col-lg-6 col-md-6 contact-form-txt">
						<form method="post">
							<div class="w3pvt-wls-contact-mid">
								<div class="form-group contact-forms">
									<input type="text" class="form-control" placeholder="Name" name="name" required="">
								</div>
								<div class="form-group contact-forms">
									<input type="email" class="form-control" placeholder="Email" name="email" required="">
								</div>
								<div class="form-group contact-forms">
									<input type="text" class="form-control" placeholder="Phone" name="phoneno" required=""> 
								</div>
								<div class="form-group contact-forms">
									<textarea class="form-control" placeholder="Message" rows="3" name="mesg" required=""></textarea>
								</div>
								<button type="submit" class="btn sent-butnn">Send</button>
							</div>
						</form>
						<!--<div class="row mt-lg-5 mt-md-4 mt-3">
							<div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
							  <h4>Branch 1</h4>
							  <p class="pt-2">Melbourne St,South Birbane 4101</p>
							  <p>Austraila</p>
							</div>
							<div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
							  <h4>Branch 2</h4>
							  <p class="pt-2">Melbourne St,South Birbane 4101</p>
							  <p>Austraila</p>
							</div>
							</div>-->
						<br><br><br>
						<div class="row mt-lg-4 mt-3">
							<div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
								<h4>Phone</h4>
								<p class="pt-2">+917720882794</p>
								<!--<p>+(000) 123 4565 32</p>-->
							</div>
							<div class="contact-list-grid col-lg-6 col-md-6 col-sm-6">
								<h4>Email</h4>
								<p class="pt-2"><a href = "mailto:416121jokarem@gmail.com">416121jokarem@gmail.com</a> 
								</p>
								<!--<p class="pt-2"><a href="mailto:info@example.com">info@example.com</a>-->
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--//contact  -->
		<!-- footer -->
		<footer class="py-lg-4 py-md-3 py-sm-3 py-3">
			<div class="container py-lg-5 py-md-5 py-sm-4 py-3">
				<div class="footer-w3layouts-head text-center">
					<h2><a href="index.html">BaliRaja</a></h2>
				</div>
				<div class="social-icons mt-lg-5 mt-md-4 mt-3 text-center">
					<ul>
						<!--
							<li><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-rss"></span></a></li>
							<li><a href="#"><span class="fa fa-instagram"></span></a></li>-->
					</ul>
				</div>
				<div class="bottem-wthree-footer text-center pt-md-4 pt-3">
					<p> 
						© 2020 BaliRaja. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
					</p>
				</div>
				<!-- move icon -->
				<div class="text-center">
					<a href="#home" class="move-top text-center mt-3"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
				</div>
				<!--//move icon -->
			</div>
		</footer>
		<!--//footer -->
	</body>
</html>