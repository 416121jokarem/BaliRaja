<?php
	//$_COOKIE['googtrans'];
	
	  $con = mysqli_connect("localhost","root","","baliraja");
	  
	  if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }	
	
	if(isset($_COOKIE['sess_user']) and isset($_COOKIE['name']))
	{
	header("Location:home.php");
	}
	  else if(isset($_COOKIE['sess_user']))
	  {
	   if(isset($_POST['submit']))
	   {
	  	 $name = $_POST['farmer_name'];
	  	 $state = $_POST['state'];
	  	 $district = $_POST['district'];
	  	 $language = $_POST['language'];
	setcookie("name","$name",time()+432000);
	  	 //echo "------------------------------";
	  	 //$sql = "U farmer_details (farmer_name,state,district,language) VALUES ('$name',$state,$district,'$language')";
	  	 $id = $_COOKIE['id'];
	  	 $mobile_no = $_COOKIE['sess_user'];
	 //$_COOKIE['name'] = $name;
	/*
	setcookie("namem","$name",time()+432000);
	setcookie("statem",$state,time()+432000);
	setcookie("districtm","$district",time()+432000);
	setcookie("languagem","$language",time()+432000);
	
	echo "---------";
	if(isset($_COOKIE['namem']))
	{
	echo $_COOKIE['namem'];
	}
	echo $_COOKIE['districtm'];
	echo $_COOKIE['languagem'];
	echo $_COOKIE['statem'];
	$namec = str_replace('+', ' ', $_COOKIE['namem']);
	$statec =  $_COOKIE['statem'];
	$districtc =  $_COOKIE['districtm'];
	$languagec =  $_COOKIE['languagem'];
	  	 echo $id;
	  	 echo $mobile_no;
	
	echo "==============";
	echo $namec;
	echo $statec;
	echo $districtc;
	echo $languagec;*/
	  	 $sql = "UPDATE farmer_details SET farmer_name = '$name', state = $state, district = '$district', language='$language' WHERE farmer_id = $id and mobile_no='$mobile_no'";
	  	 if(mysqli_query($con,$sql))
	{
	  	 echo "Registeration completed";
	}else{echo "Unsuccessfull";}
	  	 header("Location:home.php");
	   }else
	{
	 echo "Not inserted inner";
	}
	  }
	else
	{
	// echo "not inserted";
	header("Location:index.php");
	}
	  
	 //mysqli_close($con); 
	  ?>
<!DOCTYPE html>
<html lang="en">
	<title>Farmer Registeration</title>
	<head>
		<!-- google translate script 1
			<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
		<!-- Call back function 2
			<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}-->
		</script> 
		<script type="text/javascript" src="js/validation.js"></script>
		<script type="text/javascript">
			function getdistrict(val) {
						$.ajax({
						type: "POST",
						url: "get_district.php",
						data:'state_id='+val,
						success: function(data){
							$("#district-list").html(data);
						}
						});
					}
					function selectCountry(val) {
					$("#search-box").val(val);
					$("#suggesstion-box").hide();
					}
			/*		
			function myfunction(){
				var txt;
				if(confirm("Do you want to confirm details")){
					txt="";
				}
				else{
					txt="pressed";
				}
				document.getElementById("demo").innerHTML=txt;
			}
			
			*/
			
		</script>
		<!-- Required meta tags-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Colorlib Templates">
		<meta name="author" content="Colorlib">
		<meta name="keywords" content="Colorlib Templates">
		<!-- Title Page-->
		<title>Farmer Registration</title>
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
			.a1{
			padding-bottom:50px;
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
						<h2 class="title">Farmer Registration</h2>
					</div>
					<div class="card-body">
						<div id="google_translate_element" align="right" ></div><br><br>
						<div align="right">
							<a href = "main.php">
							Home
							</a>
						</div>
						<!--<div id="google_translate_element" align="right" class="a1"></div>onsubmit="return confirm('Do you really want to submit the form?');"-->
						<form method="POST" onsubmit="return RegisterForm(this);">
							<div class="form-row m-b-55">
								<div class="name">Farmer Name</div>
								<div class="value">
									<div class="col-4">
										<div class="input-group-desc">
											<input class="input--style-5" type="text" name="farmer_name" id="farmer_name" onkeyup="validateName(this);" required>
											<label id="farmernamelabel" style="color:red"></label>
											<label class="label--desc">Example : Mahesh Jokare</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="name">State</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select onChange="getdistrict(this.value);"  name="state" id="state" required>
												<option value="" disabled="disabled" selected="selected">Select State</option>
												<?php
													$query =mysqli_query($con,"SELECT state_id,state_name FROM state");
													while($row=mysqli_fetch_array($query))
													{ ?>
												<option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'];?></option>
												<?php
													}
													
													?>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="name">District</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="district" id="district-list" required>
												<option value="" disabled="disabled" selected="selected">Select District</option>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="name">Language</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="language" id="language" required>
												<option value="" disabled="disabled" selected="selected">Select Language</option>
												<option value="english">English</option>
												<option value="hindi">Hindi</option>
												<option value="marathi">Marathi</option>
												<option value="kannada">Kannada</option>
												<option value="telugu">Telugu</option>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<div>
								<center>
									<button class="btn btn--radius-2 btn--red" type="submit"  name="submit">REGISTER</button>
									<p id="demo"></p>
								</center>
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