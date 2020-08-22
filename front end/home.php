<?php
	// $_COOKIE['googtrans'];
	   //require_once("config.php");
	
	  $con = mysqli_connect("localhost","root","","baliraja");
	                     // Check connection
	                     if (mysqli_connect_errno())
	                     {
	                     echo "Failed to connect to MySQL: " . mysqli_connect_error();
	                     }
	   
			
		if(isset($_COOKIE['sess_user']))
		{
		   $n = $_COOKIE['sess_user'];
		   $q = mysqli_query($con,"SELECT farmer_name FROM farmer_details WHERE mobile_no='".$n."'");
		   $rcount = mysqli_num_rows($q);
		   $t = mysqli_fetch_row($q);
		   $na = $t[0];
		   if($rcount>0)
		   {
		   if($na=="")
		   {	$q2="DELETE FROM farmer_details WHERE mobile_no='".$n."'";
					setcookie("sess_user","",time()-432000);
			   mysqli_query($con,$q2);
			   header('location:index.php');
			   
		   }
		   }else{header('location:index.php');}
		
		}else{header('location:index.php');}
		mysqli_close($con);
		
	   ?>
<!DOCTYPE html>
<html lang="en">
	<title>Home Page</title>
	<head>
		<!-- google translate script 1
			<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			-->
		<!-- Call back function 2
			<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
			</script> -->
		<script type="text/javascript" src="js/validation.js"></script>
		<script type="text/javascript"></script>
		<!-- Required meta tags-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Colorlib Templates">
		<meta name="author" content="Colorlib">
		<meta name="keywords" content="Colorlib Templates">
		<!-- Title Page-->
		<title>Crop Recommendation System</title>
		<!-- Icons font CSS-->
		<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
		<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
		<!-- Font special for pages-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
		<!-- Vendor CSS-->
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
		<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
		<!-- Main CSS-->
		<link href="css/main.css" rel="stylesheet" media="all">
		<style>
			a:link {
			color: black;
			background-color: transparent;
			text-decoration: none;
			font-size:17px;
			}
			a:hover {
			color: blue;
			}
			body {
			background-image: url("images/b3.jpg");
			background-color: #cccccc;
			}
			.button {
			border: none;
			color: white;
			padding-left:5px;
			padding-right:5px;
			padding-bottom:15px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			transition-duration: 0.4s;
			cursor: pointer;
			}
			.button1 {
			background-color: white; 
			color: black; 
			border: 2px solid #4CAF50;
			}
			.button1:hover {
			background-color: #4CAF50;
			color: white;
			}
		</style>
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
		<!-- HTML element 3 -->
		<div class="page-wrapper p-t-45 p-b-50">
			<div class="wrapper wrapper--w790">
				<div class="card card-5">
					<div class="card-heading">
						<h2 class="title">Crop Recommendation System</h2>
					</div>
					<div class="card-body">
						<!--<div id="google_translate_element" align="right" class="a1"></div>-->
						<div align="right">
							<div id="google_translate_element" align="right" ></div>
							<br><br>
							<a href = "index.php">
							Home  
							</a>
							&nbsp&nbsp|&nbsp&nbsp
							<a href = "display3.php">
							Remove Completed Crops  
							</a>
							&nbsp&nbsp|&nbsp&nbsp
							<a href = "logout.php">
							Logout
							</a>
						</div>
						<br><br>     
						<?php
							$con = mysqli_connect("localhost","root","","baliraja");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$mobile_no = $_COOKIE['sess_user'];
							$sqln="SELECT farmer_name from farmer_details where mobile_no='$mobile_no'";
							$res = mysqli_query($con,$sqln);
							$rw = mysqli_fetch_row($res);
							echo "<center><h2 class='name'>Welcome "; echo " ".$rw[0]."!</h2></center><br><br><h4><center>Currently Cultivated Crops"; echo"</center></h4>";
							$sql= "SELECT c.crop_name, c.area from crop_details c, farmer_details f where c.farmer_id=f.farmer_id and f.mobile_no='$mobile_no' and c.outdated='No'";
							
							$result = mysqli_query($con, $sql);
							$rcount = mysqli_num_rows($result);
							//echo $rcount;
							if ($rcount > 0) {
								// output data of each row
								while($row = mysqli_fetch_assoc($result)) {
							
									echo "<br><center><h3 class='name'>".$row['crop_name']." for ".$row['area']." Hectares<h3></center>";
								}
							} else {
								echo "<br><center>No crops registered yet</center>";
							}
							/*echo $_COOKIE['recommendation'];
							$t = $_COOKIE['recommendation'];
							if ($t == "True")
							{
								echo $_COOKIE['result'];
							}*/
							//$sql_crop = "UPDATE crop_details SET crop_name='$r' where ";
							mysqli_close($con);
							
							
							
							?>
						<!-- <meta http-equiv="refresh" content="300;url=logout.php" />-->
						<br>
						<center>
						<!--<button class="button button1" onclick="window.location.href='register_crop.php'">Register for new Crop</button>
							<a class="btn btn-primary btn-sm" href="register_crop.php" role="button">Click Here to go back to Home page</a> -->
						<center> <button class="btn btn--radius-2 btn--red" onclick="window.location.href='register_crop.php'" name="submit">Register for new Crop</button></center>
						<center>
					</div>
				</div>
			</div>
		</div>
		<!-- Jquery JS-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<!-- Vendor JS-->
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/datepicker/moment.min.js"></script>
		<script src="vendor/datepicker/daterangepicker.js"></script>
		<!-- Main JS-->
		<script src="js/global.js"></script>
	</body>
	<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->