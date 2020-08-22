<?php
	if(isset($_POST['submit']))
	{
	setcookie("old_mobile",$_POST['old_mobile'],time()+432000);
	  echo $_COOKIE['old_mobile'];
	header("location:ChangeMobile1.php");
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
		<script type="text/javascript" src="js/validation.js"></script>
		<!-- Title Page-->
		<title>Change Mobile Number</title>
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			background-image: url("images/b3.jpg");
			background-color: #cccccc;
			}
			#otpenter{
			display: none;
			}
			#nextpage{
			display: none;
			}
			a:link {
			color: black;
			background-color: transparent;
			text-decoration: none;
			font-size:17px;
			}
			a:hover {
			color: blue;
			}
		</style>
		<script>
			function checkMobile(){
			//alert("came");
			    
			var mobileno=document.getElementById('number');
			    var x=validateMobile(mobileno);
			    console.log(x);
			    if(x==true){
			        $.ajax({
			type:'POST',
			    url:'ChangeMobileForUpdate.php',// put your real file name 
			dataType: 'JSON',
			    data:{mobileno: mobileno.value},
			    success:function(msg){
			        
			        var dataResult = msg['statusCode'];
			                console.log(dataResult);
				if(dataResult==200){
			                    swal('Mobile Number not exists');
			                    $('#form1').find('input:text').val('');
				}
				else if(dataResult==201){
					
				}
				
			    }
			});
			
			    }
			}
		</script>
	</head>
	<body>
		<div class="page-wrapper p-t-45 p-b-50">
			<div class="wrapper wrapper--w790">
				<div class="card card-5">
					<div class="card-heading">
						<h2 class="title">Change Phone Number</h2>
					</div>
					<div class="card-body">
						<div id="google_translate_element" align="right" ></div>
						<br>
						<div align="right">
							<a href = "index.php">
							Home  
							</a>
						</div>
						<br><br>
						<form id="form1" name="first"method="POST">
							<div class="form-row m-b-55">
								<div class="name">Enter old Phone number </div>
								<div class="value">
									<div class="row row-space">
										<div class="col-2">
											<div class="input-group-desc">
												<input type="text" id="number" value="+91" class="input--style-5" name="old_mobile" onkeyup="checkMobile(this);" id="number" value="+91" required>
												<label id="phonenolabel" style="color:red"></label>
												<label class="label--desc"> Example : +919588634040 </label>
											</div>
										</div>
										<div class="input-group-desc" id="recaptcha-container"></div>
										<div class="col-2">
											<div class="input-group-desc">
												<div>
													<button type="button" id="sendotp" class="btn btn--radius-2 btn--blue" onclick="phoneAuth();">SendCode</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							<div id="otpenter">
								<div class="form-row m-b-55" >
									<div class="name">Enter OTP</div>
									<div class="value">
										<div class="row row-space">
											<div class="col-2">
												<div class="input-group-desc">
													<input type="text" id="verificationCode"  class="input--style-5" name="otp" onkeyup="validateotp(this);" required>
													<label id="otplabel" style="color:red"></label>
													<label class="label--desc"> Example : 123456 </label>
												</div>
											</div>
											<div class="col-2">
												<div class="input-group-desc">
													<div>
														<button type="button" id="otpsubmit" class="btn btn--radius-2 btn--blue" onclick="codeverify();">Verify code</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="nextpage">
								<center>
									<button class="btn btn--radius-2 btn--red" type="submit" onclick="myfunction()" name="submit">Next</button>
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
		<!-- The core Firebase JS SDK is always required and must be listed first -->
		<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
		<!-- TODO: Add SDKs for Firebase products that you want to use
			https://firebase.google.com/docs/web/setup#config-web-app -->
		<script>
			// Your web app's Firebase configuration
			var firebaseConfig = {
			apiKey: "AIzaSyCUovQi8cNTK7bk5wAakgvJ7uASK1thu5c",
			authDomain: "agriculture-3231c.firebaseapp.com",
			databaseURL: "https://agriculture-3231c.firebaseio.com",
			projectId: "agriculture-3231c",
			storageBucket: "agriculture-3231c.appspot.com",
			messagingSenderId: "875270164038",
			appId: "1:875270164038:web:09bb0cf6975e1506dec447",
			measurementId: "G-05YMLG9MLH"
			};
			// Initialize Firebase
			firebase.initializeApp(firebaseConfig);
		</script>
		<script src="NumberAuthentication.js" type="text/javascript"></script>
	</body>
	<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->