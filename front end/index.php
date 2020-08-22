<!--A Design by W3layouts
	Author: W3layout
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
	-->
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>BaliRaja:Crop recommendation and Alerting System</title>
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
		<div class="main-top" id="home">
			<!-- header -->
			<div class="headder-top">
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
							  }
							  if($rcount>0)
							  {
							   if($na=="")
							   {
								   $q2="DELETE FROM farmer_details WHERE mobile_no='".$n."'";
									mysqli_query($con,$q2);
									setcookie("sess_user","",time()-432000);
								   header('location:index.php');
							   }
							   else if($na!="")
							   {
								   
								   echo "<li><a href='home.php'>$na</a></li>";
								  
							   }
							
							  }
							  else{echo "<li><a href='main.php'>SignIn / SignUp</a></li>";}
							
							}
							else
							{
							echo "<li><a href='main.php'>SignIn / SignUp</a></li>";
							}
							//mysqli_close($con);
							?>
						<!--<li><a href="main.php">Login</a></li>-->
						<li class="mx-lg-3 mx-md-2 my-md-0 my-1">
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
						<li><a href="contact.php">Contact</a></li>
						<li>
							<a href="ChangeMobile.php">Change Mobile Number</a>
						</li>
						<li>
							<a href="chart1.php">Crop Visualization</a>
						</li>
					</ul>
				</nav>
				<!--<div>
					<br>
					                   <div class="name"><p style="color:white">echo _select_language </p> </div>
					                   
					                   <a href="switch_lang.php?lang=1" >Marathi  |</a>  <a href="switch_lang.php?lang=2">English</a>
					                 <?php
						//echo $myPhpVar= $_COOKIE['lang'];
						?>
					                </div>-->
				<!-- //nav -->
			</div>
			<!-- //header -->
			<!-- banner Offering Farming Solutions in Maharashtra-->
			<div class="main-banner text-center">
				<div class="container">
					<div class="style-banner">
						<h4 class="mb-2">Welcome to BaliRaja<br></h4>
						<h5>Crop Recommendation and Alerting System
						</h5>
					</div>
					<div class="two-demo-button mt-md-4 mt-3">
					</div>
				</div>
			</div>
		</div>
		<!-- //banner -->
		<!-- about -->
		<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
			<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
			<div class="row">
				<div class="col-lg-6 about-imgs-txt">
					<img src="images/1.jpg" alt="news image" class="img-fluid">
				</div>
				<div class="col-lg-6 text-right about-two-grids">
					<h3 class="title  mb-md-4 mb-sm-3 mb-3">About Our BaliRaja</h3>
					<div class="about-para-txt">
						<p>As India is a huge Agricultural Hub, but even after using advanced farming techniques and various types of agricultural equipment, the crop yield is not that significant, due to various risk factors. The major problem faced by today’s farmers is selecting a new crop for cultivation in his field which will give him maximum production with minimal crop losses. So this project, “BaliRaja”: A Crop Recommendation And Risk Alerting System has been developed, which comprises various data sets that depict Crop selection based on different features that will overcome those risks. Majorly, the Ensemble algorithm for better prediction which is classification-based, Regression-based, and Rule-based algorithms are also used to predict Crop with fewer risks based on farmer's Soil Tests Card results. Also, Alert Model named NaradWani, alerts Farmer through his mobile number by sending SMS alerts in their local language.</p>
						<!--<p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et consectetur adipiscing sed do eiusmod</p>
							</div>
							<div class="view-buttn mt-lg-5 mt-md-4 mt-3">
							  <a href="single.html" class=" scroll">Read More</a>
							</div>-->
					</div>
				</div>
			</div>
		</section>
		<!-- //about -->
		<section class="blog_w3ls pb-5" id="why">
			<div class="container pb-xl-5 pb-lg-3">
				<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Why Choose Us</h3>
				<div class="row">
					<!-- blog grid -->
					<div class="col-lg-4 col-md-6">
						<div class="card border-0 med-blog">
							<div class="card-header p-0">
								<a href="single.html">
								<img class="card-img-bottom" src="images/g1.jpg" alt="Card image cap">
								</a>
							</div>
							<div class="card-body border border-top-0">
								<div class="mb-3">
									<h5 class="blog-title card-title m-0">High Accuracy Prediction
									</h5>
									<div class="blog_w3icon">
										<!--<span>
											Magna Kictum - loremipsum</span>-->
									</div>
								</div>
								<!--	<p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>-->
							</div>
						</div>
					</div>
					<!-- //blog grid -->
					<!-- blog grid -->
					<div class="col-lg-4 col-md-6 mt-md-0 mt-5">
						<div class="card border-0 med-blog">
							<div class="card-header p-0">
								<a href="single.html">
								<img class="card-img-bottom" src="images/g2.jpg" alt="Card image cap">
								</a>
							</div>
							<div class="card-body border border-top-0">
								<div class="mb-3">
									<h5 class="blog-title card-title m-0">
									Variety of Crops for Irrigated and Non Irrigated System
									<div class="blog_w3icon">
										<span>
										<!--Magna Kictum - loremipsum</span>-->
									</div>
								</div>
								<!--<p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>-->
							</div>
						</div>
					</div>
					<!-- //blog grid -->
					<!-- blog grid -->
					<div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
						<div class="card border-0 med-blog">
							<div class="card-header p-0">
								<a href="single.html">
								<img class="card-img-bottom" src="images/g3.jpg" alt="Card image cap">
								</a>
							</div>
							<div class="card-body border border-top-0">
								<div class="mb-3">
									<h5 class="blog-title card-title m-0">
									NaradWani Alerting System
									<div class="blog_w3icon">
										<span>
										<!--Magna Kictum - loremipsum</span>-->
									</div>
								</div>
								<!--<p>Cras ultricies ligula sed magna dictum porta auris blandita.</p>-->
							</div>
						</div>
					</div>
					<!-- //blog grid -->
				</div>
			</div>
		</section>
		<!-- stats -->
		<section class="stats-count py-lg-4 py-md-3 py-sm-3 py-3">
			<div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
				<div class="row text-center">
					<div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info ">
						<!-- <span class="fa fa-smile-o" data-blast="bgColor"></span>-->
						<h5></h5>
						<h6 class="pt-2"></h6>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info">
						<span class="fa fa-shield" data-blast="bgColor"></span>
						<h5>Jai Jawan</h5>
						<!-- <h6 class="pt-2">Awards Win</h6>-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info">
						<span class="fa fa-leaf" data-blast="bgColor"></span>
						<h5>Jai Kisan</h5>
						<!--<h6 class="pt-2">Products</h6>-->
					</div>
					<!--<div class="col-lg-3 col-md-3 col-sm-6 col-6 number-w3three-info">
						<span class="fa fa-thumbs-o-up" data-blast="bgColor"></span>
						<h5>225</h5>
						<h6 class="pt-2">Ratings</h6>
						</div>-->
				</div>
			</div>
		</section>
		<!--//stats -->
		<!-- service -->
		<section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
			<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
				<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Services</h3>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6 service-grid-wthree text-center">
						<div class="ser-Agriculture-grid">
							<div class="about-icon mb-md-4 mb-3">
								<!--<span class="fa fa-apple" aria-hidden="true"></span>
									<span class="fa fa-yelp" aria-hidden="true"></span>-->
								<span class="fa fa-pagelines" aria-hidden="true"></span>
							</div>
							<div class="ser-sevice-grid">
								<h4 class="pb-3">Crop Recommendation</h4>
								<p>Machine Learning which is trained on a huge dataset consisting of various features, which helps to recommend Crop more accurately</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 service-grid-wthree text-center">
						<div class="ser-Agriculture-grid">
							<div class="about-icon mb-md-4 mb-3">
								<span class="fa fa-skyatlas" aria-hidden="true"></span>
							</div>
							<div class="ser-sevice-grid">
								<h4 class="pb-3">Weather Forcast</h4>
								<p>Forecasts about Rainfall as well as mean temperature and humidity are sent through SMS to all users so that even non-smartphones can get the weather updates</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 service-grid-wthree text-center">
						<div class="ser-Agriculture-grid">
							<div class="about-icon mb-md-4 mb-3">
								<span class="fa fa-yelp" aria-hidden="true"></span>
							</div>
							<div class="ser-sevice-grid">
								<h4 class="pb-3">Crop Alerts</h4>
								<p>If conditions are favorable to Pest/Diseases/Insecticides outbreak then alerts with the name of most probable Pest/Diseases/Insecticides are sent through SMS along with the Treatment/Precautions in their local language</p>
							</div>
						</div>
					</div>
					<!--
						<div class="col-lg-4 col-md-6 col-sm-6 mt-lg-4 mt-3 service-grid-wthree text-center">
						  <div class="ser-Agriculture-grid">
						    <div class="about-icon mb-md-4 mb-3">
						      <span class="fa fa-viadeo" aria-hidden="true"></span>
						    </div>
						    <div class="ser-sevice-grid">
						      <h4 class="pb-3">Always Fresh</h4>
						      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna</p>
						    </div>
						  </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 mt-lg-4 mt-3 service-grid-wthree text-center">
						  <div class="ser-Agriculture-grid">
						    <div class="about-icon mb-md-4 mb-3">
						      <span class="fa fa-pagelines" aria-hidden="true"></span>
						    </div>
						    <div class="ser-sevice-grid">
						      <h4 class="pb-3">Garden Care</h4>
						      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna</p>
						    </div>
						  </div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 mt-lg-4 mt-3 service-grid-wthree text-center">
						  <div class="ser-Agriculture-grid">
						    <div class="about-icon mb-md-4 mb-3">
						      <span class="fa fa-leaf" aria-hidden="true"></span>
						    </div>
						    <div class="ser-sevice-grid">
						      <h4 class="pb-3">Plant Renovation</h4>
						      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna</p>
						    </div>
						  </div>
						</div>-->
				</div>
			</div>
		</section>
		<!-- //service -->
		<!-- client -->
		<section class="client py-lg-4 py-md-3 py-sm-3 py-3" id="client">
			<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
				<h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Team</h3>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 cilent-item text-center">
						<div class="mb-lg-4 mb-3 clients-ile-img">
							<img src="images/mahesh.jpg" alt=" " class="img-fluid">
						</div>
						<div class="clients-color-ile text-center">
							<div class="mt-3 clients-txt-ile">
								<h4>Mahesh Jokare</h4>
								<br>
								<a href = "mailto:416121jokarem@gmail.com">416121jokarem@gmail.com</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 cilent-item text-center">
						<div class="mb-lg-4 mb-3 clients-ile-img">
							<img src="images/shra.jpg" alt=" " class="img-fluid">
						</div>
						<div class="clients-color-ile text-center">
							<div class="mt-3 clients-txt-ile">
								<h4>Shravani Sargam</h4>
								<br>
								<a href = "mailto:shravanisargam26@gmail.com">shravanisargam26@gmail.com</a>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 cilent-item text-center">
						<div class="mb-lg-4 mb-3 clients-ile-img">
							<img src="images/namrata.jpg" alt=" " class="img-fluid">
						</div>
						<div class="clients-color-ile text-center">
							<div class="mt-3 clients-txt-ile">
								<h4>Namrata Jindam</h4>
								<br>
								<a href = "mailto:namratajindam2017@gmail.com">namratajindam2017@gmail.com</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 cilent-item text-center">
						<div class="mb-lg-4 mb-3 clients-ile-img">
							<img src="images/rishi.jpg" alt=" " class="img-fluid">
						</div>
						<div class="clients-color-ile text-center">
							<div class="mt-3 clients-txt-ile">
								<h4>Rishikesh Kemshetti</h4>
								<br>
								<a href = "mailto:rishikeshkemshetti@gmail.com">rishikeshkemshetti@gmail.com</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--//client -->
		<!-- collection 
			<section class="collection py-lg-4 py-md-3 py-sm-3 py-3">
			  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
			    <h3 class="title mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Features</h3>-->
		<!--row
			<div class="row">
			  <div class="col-lg-7 col-md-6 collection-w3layouts">
			    <h4> Tropical Fruit Mix Smoothie</h4>
			    <p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et consectetur adipiscing sed do eiusmod</p>
			    <div class="view-buttn mt-lg-4 mt-3">
			      <a href="single.html" class="">Read More</a>
			    </div>
			  </div>
			  <div class="col-lg-5 col-md-6">
			    <img src="images/2.jpg" alt="news image" class="img-fluid">
			  </div>
			</div> -->
		<!--// row -->
		<!-- row
			<div class="row my-lg-5 my-md-4 my-3">
			  <div class="col-lg-5 col-md-6">
			    <img src="images/3.jpg" alt="news image" class="img-fluid">
			  </div>
			  <div class="col-lg-7 col-md-6 collection-w3layouts">
			    <h4>Veggie Diet Pros And Cons</h4>
			    <p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et consectetur adipiscing sed do eiusmod</p>
			    <div class="view-buttn mt-lg-4 mt-3">
			      <a href="single.html" class="">Read More</a>
			    </div>
			  </div>
			</div> -->
		<!--// row -->
		<!-- row
			<div class="row">
			  <div class="col-lg-7 col-md-6 collection-w3layouts">
			    <h4>Organic Farming Revert Back</h4>
			    <p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et consectetur adipiscing sed do eiusmod</p>
			    <div class="view-buttn mt-lg-4 mt-3">
			      <a href="single.html" class=" scroll">Read More</a>
			    </div>
			  </div>
			  <div class="col-lg-5 col-md-6">
			    <img src="images/4.jpg" alt="news image" class="img-fluid">
			      
			  </div>
			</div> -->
		<!--// row 
			</div>
			</section>-->
		<!-- collection -->
		<br>
		<!--
			<script>
			$('.goog-te-combo').on('change',function(){
			    language = $("select.goog-te-combo option:selected").text();
			     alert(language);
			 });
			</script>-->
		<div class="clients-color-ile text-center">
			<div class="mt-3 clients-txt-ile">
				<h3><b>Support System</b></h3>
				<br>
				<h4>P. S. R. Patnaik</h4>
				<p style="font-size:16px;">(Project Guide)</p>
			</div>
			<br><br>
			<center>
				<h3><b>Special Thanks</b></h3>
			</center>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 cilent-item text-center">
				<div class="mt-3 clients-txt-ile">
					<h4>S. A. Halkude</h4>
					<p style="font-size:16px;">(Hon. Principal, WIT Solapur)</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 cilent-item text-center">
				<div class="mt-3 clients-txt-ile">
					<h4>A. M. Pujar</h4>
					<p style="font-size:16px;">(HOD, CSE)</p>
				</div>
			</div>
		</div>
		<br>
		<!-- footer -->
		<script>
			//setcookie("googtrans", "/en/ja", time()+432000);
		</script>
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
						<li><a href = "mailto:416121jokarem@gmail.com"><span class="fa fa-envelope"></span></a></li>
					</ul>
				</div>
				<div class="bottem-wthree-footer text-center pt-md-4 pt-3">
					<p> 
						©  2020 BaliRaja. All Rights Reserved | Design by W3Layouts<a href="http://www.W3Layouts.com" target="_blank"> W3Layouts</a>
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