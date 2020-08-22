<?php
	//echo"tyhg";
	$c=$_COOKIE['chradio'];
	//echo $c;
	 $con = mysqli_connect("localhost","root","","baliraja");
	                     // Check connection
	                     if (mysqli_connect_errno())
	                     {
	                     echo "Failed to connect to MySQL: " . mysqli_connect_error();
	                     }	
					//echo "---------------";	 
		 if(isset($_POST['submit']))
	       {	
	   //echo"----------";
	   
			$id=$_COOKIE['id'];
			$crop=$_POST['crop'];
			$mesg=$_POST['mesg'];
				$performance=$_POST['performance'];
			//echo $id;
			//echo $crop;
			//echo $mesg;
			//echo $performance;
			
			$sqln="INSERT INTO farmer_feedback (farmer_id,crop_id,mesg,rating)VALUES($id,$crop,'$mesg','$performance')";
			if(mysqli_query($con,$sqln))
			{
				echo"<script>alert('Feedback Submitted')</script>";
				mysqli_close($con);
				header("Location:display3.php");
			
			}
			else
			{
				//mysqli_error($con);
				echo"<script>alert('Feedback not submitted,Please try again')</script>";
			}
				//header("Location:home.php");
		}
						
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
		<title>Au Register Forms by Colorlib</title>
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
						<h2 class="title">Feedback For Crop</h2>
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
						<form method="post" onsubmit="return confirm('Do you really want to submit the form?');">
							<!--<div class="form-row">
								<div class="name">Email</div>
								<div class="value">
								    <div class="input-group">
								        <input class="input--style-5" type="email" name="email">
								    </div>
								</div>
								</div>
								<div class="form-row m-b-55">
								<div class="name">Phone</div>
								<div class="value">
								    <div class="row row-refine">
								        <div class="col-3">
								            <div class="input-group-desc">
								                <input class="input--style-5" type="text" name="area_code">
								                <label class="label--desc">Area Code</label>
								            </div>
								        </div>
								        <div class="col-9">
								            <div class="input-group-desc">
								                <input class="input--style-5" type="text" name="phone">
								                <label class="label--desc">Phone Number</label>
								            </div>
								        </div>
								    </div>
								</div>
								</div>-->
							<div class="form-row">
								<div class="name">Crop</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="crop" id="month" required="required">
												<option value="" selected disabled>Choose completed crop</option>
												<?php
													$mobile_no = $_COOKIE['sess_user'];
													$c=$_COOKIE['chradio'];
													$sql= "SELECT c.crop_name,c.area from crop_details c, farmer_details f where c.farmer_id=f.farmer_id and f.mobile_no='$mobile_no' and c.outdated='No' and crop_id=$c";
													$result = mysqli_query($con, $sql);
													$rcount = mysqli_num_rows($result);
													//echo $rcount;
													
													
													$row = mysqli_fetch_row($result);
													
													echo"<option value='$c'>".$row[0]." for ".$row[1]." Hectares</option>";	
													mysqli_query($con,"UPDATE crop_details SET outdated='Yes' WHERE crop_id=$c");
													
																
													
													?>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<!--
								<div class="form-row">
								    <div class="name">Crop</div>
								    <div class="value">
								        <div class="input-group">
								            <div class="rs-select2 js-select-simple select--no-search">
								                <select name="crop" required="required">
								                    <option disabled="disabled" selected="selected">Choose completed crop</option>
								
								                  
								                </select>
								                <div class="select-dropdown"></div>
								            </div>
								        </div>
								    </div>
								</div>-->
							<div class="form-row">
								<div class="name">Additional Message</div>
								<div class="value">
									<div class="input-group">
										<!-- <input class="input--style-5" name="mesg" type="textarea" rows="4" cols="50" name="company">-->
										<input type="textarea" class="input--style-5" id="w3review" name="mesg" rows="4" cols="50"></textarea>
									</div>
								</div>
							</div>
							<div class="form-row p-t-20">
								<label class="label label--block">How does Recommended crop works?</label>
								<div class="p-t-15">
									<label class="radio-container ">Very Satisfied
									<input type="radio" name="performance" id = "chkYes" value="Very Satisfied" required="required">
									<span class="checkmark"></span>
									</label>
									<label class="radio-container ">Satisfied
									<input type="radio" name="performance" id = "chkYes" value="Satisfied">
									<span class="checkmark"></span>
									</label>
									<label class="radio-container ">Neutral
									<input type="radio" name="performance" id = "chkYes" value="Neutral">
									<span class="checkmark"></span>
									</label>
									<label class="radio-container ">Unsatisfied
									<input type="radio" name="performance" id = "chkYes" value="Neutral">
									<span class="checkmark"></span>
									</label>
									<label class="radio-container">Very Unsatisfied
									<input type="radio" name="performance"  id = "chkNo" value="Very Unsatisfied"  >
									<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<!-- <div class="form-row p-t-20">
								<label class="label label--block">How does Recommended crop works?</label>
								<div class="p-t-15">
								    <label class="radio-container m-r-55">Unsatisfied
								        <input type="radio" checked="checked" name="performance" value="Good" required>
								        <span class="checkmark"></span>
								    </label>
								    <label class="radio-container m-r-55">Satisfied
								        <input type="radio" name="performance" value="Better">
								        <span class="checkmark"></span>
								    </label>
								<label class="radio-container m-r-55">Good
								        <input type="radio" name="performance" value="Better">
								        <span class="checkmark"></span>
								    </label>
								<label class="radio-container">Best
								        <input type="radio" name="performance" value="Best">
								        <span class="checkmark"></span>
								    </label>
								</div>
								</div>-->
							<div>
								<center> <button class="btn btn--radius-2 btn--red" type="submit" name="submit">Submit</button></center>
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