<?php 
	$con = mysqli_connect("localhost","root","","baliraja");
	                    // Check connection
	                    if (mysqli_connect_errno())
	                    {
	                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	                    }					
					//echo"-------";
					 if(isset($_POST["submit"]))
					 {	 
						 $chradio = $_POST['crops'];
						 echo $chradio;
								setcookie("chradio","$chradio",time()+432000);
								$fid=$_COOKIE['id'];
								//$sql2="SELECT feedback_id FROM farmer_feedback WHERE crop_id=$chradio and farmer_id=$fid";
								//$tres=mysqli_query($con,$sql2);
								//$trow=mysqli_num_rows($tres);
								//echo $id;
								//if($trow>0)
							
						//{
							mysqli_close($con);
							header("Location:feedback.php");
								
								//}
								
						 }
						 
						
					 
					    //mysqli_close($con);
					 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Colorlib Templates">
		<meta name="author" content="Colorlib">
		<meta name="keywords" content="Colorlib Templates">
		<!-- Title Page-->
		<title>Delete Crops</title>
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
		<!-- google translate script 1-->
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<!-- Call back function 2 -->
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
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
			background-image: url("images/image1.jpg");
			background-color: #cccccc;
			}
		</style>
	</head>
	<body>
		<div class="page-wrapper p-t-45 p-b-50">
			<div class="wrapper wrapper--w790">
				<div class="card card-5">
					<div class="card-heading">
						<h2 class="title">Remove Completed Crops</h2>
					</div>
					<div class="card-body">
						<div id="google_translate_element" align="right" ></div>
						<br>
						<div align="right">
							<a href = "main.php">
							Home
							</a>
						</div>
						<br>
						<form method="POST" action="" name="form1" onsubmit="return confirm('Do you really want to remove the crop')";>
							<div class="name" style="color:red">Note : If you removed crops from here it will be removed permanently from currently cultivated crops and you won't receive any alert regarding these crops.</div>
							<br><br>
							<?php
								$mobile_no = $_COOKIE['sess_user'];
								// $sqln="SELECT farmer_name from farmer_details where mobile_no='$mobile_no'";
								//$res = mysqli_query($con,$sqln);
								// $rw = mysqli_fetch_row($res);
								// echo "<center><h2 class='name'>Welcome"; echo " ".$rw[0]."!</h2></center><br><br><h4><center>Previously Registered Crops"; echo"</center></h4>";
								$sql= "SELECT c.crop_name, c.area,c.crop_id from crop_details c, farmer_details f where c.farmer_id=f.farmer_id and f.mobile_no='$mobile_no' and c.outdated='No'";
								$result = mysqli_query($con, $sql);
								$rcount = mysqli_num_rows($result);
								//echo $rcount;
								if ($rcount > 0) {
									// output data of each row
								//echo "<table>";
									while($row = mysqli_fetch_assoc($result)) {
								//echo "<tr>";
										echo "<div class='form-row m-b-55'>
								       
								       <div class='value'>
								           <div class='row row-space'>
								               <div class='col-3'>
								                   <div class='input-group-desc'><div class='name'>".$row['crop_name']." for ".$row['area']." Hectares</div></div>
								               </div>";
								//echo "<td>".$row['crop_id']."</td>";
								
								echo "<div class='col-3'>
								                   <div class='input-group-desc'><input type='radio' name='crops' class='other' value='".$row['crop_id']."' required></div>
								               </div>
								           </div>
								       </div>
								   </div>";
								/*echo "<td><input type='radio' id='p1' name='".$row['crop_id']."' value='Best'>Good
								
								<input type='radio' id='p2' name='".$row['crop_id']."' value='Better'>Better
								
								<input type='radio' id='p3' name='".$row['crop_id']."' value='Good'>Best</td>";
								*/  
								
								//echo "<tr>";
								}
								//echo "</table>";
								} else {
									echo "<br><center>No crops registered yet</center>";
								}
								     ?>      
							<div>
								<center><button class="btn btn--radius-2 btn--red" type="submit" name="submit">REMOVE COMPLETED CROP</button></center>
							</div>
						</form>
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