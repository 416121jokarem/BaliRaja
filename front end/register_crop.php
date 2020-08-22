<?php
	// $_COOKIE['googtrans'];
	session_start();
	   $con = mysqli_connect("localhost","root","","baliraja");
	   // Check connection
	   //$compressorEnabled = true;
	  
	   if (mysqli_connect_errno())
	   {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
	   
	   //echo $_COOKIE['result'];
	//echo $_COOKIE['sess_user'];
	   
	   if(isset($_SESSION['final']))
	   {		unset($_SESSION['final']);
	 //echo "Inside if";
	 //setcookie('result',"", time()-432000);
	 header("Location:index.php");
	}
	else if(isset($_COOKIE['sess_user']))
	{
	 //echo "Inside else if";
	  setcookie('result',"", time()-432000);
	    if(isset($_POST['submit']))
	    {	
	   	$recommendation = $_POST['rdbutton'];
	   	if($recommendation == "True")
	   	{
	   		$crop_name = null;
			
	   	}
	   	else
	   	{
	   		$crop_name = $_POST['crop'];
			setcookie("crop_name","$crop_name",time()+432000);
	   	}		
	   	
	   	$cultivation_month = $_POST['cultivation_month'];
	   	$n = $_POST['nvalue'];
	   	$p = $_POST['pvalue'];
	   	$k = $_POST['kvalue'];
	   	$phmin = $_POST['phvaluemin'];
	   	$phmax = $_POST['phvaluemax'];
	   	$irrigation = $_POST['irrigated'];
	     $soiltype = $_POST['soiltype'];
	   	$budget = $_POST['budget'];
		
	   	$area = $_POST['land'] ;
	
		
		setcookie("cultivation_month","$cultivation_month",time()+432000);
		setcookie("n","5r$n",time()+432000);
		setcookie("p","$p",time()+432000); 
		setcookie("k","$k",time()+432000);
		setcookie("phmin","$phmin",time()+432000);
		setcookie("phmax","$phmax",time()+432000);
		setcookie("irrigation","$irrigation",time()+432000);
		setcookie("soiltype","$soiltype",time()+432000);
		setcookie("budget","$budget",time()+432000);
		setcookie("area","$area",time()+432000);
				 
		// gettype($a);
		//$area = $a *  0.404685642;
		//echo $area;
	   	$id = $_COOKIE['id'];
	   	//echo $_COOKIE['id'];
	   	//echo "----------";
	   	//echo $id;
	   	//echo "----------";
	   	//$_COOKIE['recommendation'] = $recommendation;
		setcookie("recommendation","$recommendation",time()+432000);
	   	if($recommendation == "True")
	   	{
	   		$sql = "SELECT state,district FROM farmer_details where mobile_no='" . $_COOKIE["sess_user"] . "'";
	   		$result = mysqli_query($con, $sql);
	   		if (!$result) {
	   			echo 'Could not run query: ' . mysqli_error();
	   			exit;
	   		}
	   		$row = mysqli_fetch_row($result);
	   		$state=$row[0];
	   		$district=$row[1];
	   		/*echo $state;
	   		echo $district;*/
	   		if($irrigation=="Irrigated"){
	   			$url = 'http://127.0.0.1:5000/IrrigatedCrop';
	   			$data = array("Soil" => $soiltype,"Month" =>$cultivation_month,"State"=>$state,"N"=>(int)$n,"P"=>(int)$p,"K"=>(int)$k,"MinpH"=>$phmin,"MaxpH"=>$phmax );
	   			$postdata = json_encode($data);
	   			#echo $_COOKIE['sess_user'];
	   			echo $postdata;
	   			$ch = curl_init($url);
	   			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	   			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	   			curl_setopt($ch, CURLOPT_POST, 1);
	   			curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	   			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	   			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	   			$result = curl_exec($ch);
	   			curl_close($ch);
	   			$res = json_decode($result);
	   			print_r ($res);  
		//$compressorEnabled = false;
		$_SESSION['final']=$res;
		 setcookie('result', $res, time()+432000);
		 if(empty($res))
		 {
				$res='crop';
				$_SESSION['final']=$res;
				header("Location:rec_unsuccessfull.php");
		 }
		else
		{
		 $sqli1 = "INSERT INTO crop_details(farmer_id,crop_name,n,p,k,irrigation,budget,area,cultivation_month,recommendation,phmin,phmax,soil_type,outdated) VALUES($id,'$res',$n,$p,$k,'$irrigation','$budget',$area,'$cultivation_month','$recommendation',$phmin,$phmax,'$soiltype','No')";
		 if(mysqli_query($con,$sqli1))
		 {		
			 header("Location:success.php");
			 //echo "inserted irrigaed";
		 }
		 else
		 {
	                  echo $con->error;
	                 //echo "inserted non-irrigated";
	     }
	   			}
		
	   	  }
	   	  else{
	   		  $url = 'http://127.0.0.1:5000/NonIrrigatedCrop';
	   		  $data = array("State"=>$state,"District"=>$district,"Month" =>$cultivation_month);
	   		  $postdata = json_encode($data);
	   		  $ch = curl_init($url);
	   		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	   		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	   		  curl_setopt($ch, CURLOPT_POST, 1);
	   		  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	   		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	   		  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	   		  $result = curl_exec($ch);
	   		  curl_close($ch);
	   		  $res = json_decode($result);
	   		  print_r ($res);  
	  //$compressorEnabled = false;
	  $_SESSION['final']=$res;
	           //echo $res[0];
	           //echo $res[1];
	  //setcookie("result1",json_encode($res[0]),time()+432000);		 
	//setcookie("result",json_encode($res[1]),time()+432000);	
	
	 //$comma_separated = implode(",", $res);
	
	  //echo $comma_separated;
	     // $data = json_decode($_COOKIE['result1'], true);
	               //foreach($data as $p){
		//	print_r($p);
			///}
	            // $data1 = json_decode($_COOKIE['result'], true);
	  setcookie('result',$res[1], time()+432000);
	             if(empty($res))
		 {
			 $res='crop';
				$_SESSION['final']=$res;
				header("Location:rec_unsuccessfull.php");
		 }else
		 {
	           //echo gettype($res[0]);
	           $length=sizeof($res[0]);
	           //echo $length;
	               if($length==0){
	                   $value=$res[1][0];
	                   //echo "hii";
	                   //echo $value;
	                 $sqli = "INSERT INTO crop_details(farmer_id,crop_name,n,p,k,irrigation,budget,area,cultivation_month,recommendation,phmin,phmax,soil_type,outdated) VALUES($id,'$value',$n,$p,$k,'$irrigation','$budget',$area,'$cultivation_month','$recommendation',$phmin,$phmax,'$soiltype','No')";
		 if(mysqli_query($con,$sqli))
		 {
			 echo "inserted n irrigaed<br>";
			 header("Location:success.php");
		 }
		 else
		 {
			 echo "inserted non-irrigated<br>";
	     }  
	               }
	           else{
			foreach($res[0] as $key => $value)
			{
				echo $value;
			 $sqli = "INSERT INTO crop_details(farmer_id,crop_name,n,p,k,irrigation,budget,area,cultivation_month,recommendation,phmin,phmax,soil_type,outdated) VALUES($id,'$value',$n,$p,$k,'$irrigation','$budget',$area,'$cultivation_month','$recommendation',$phmin,$phmax,'$soiltype','No')";
			 if(mysqli_query($con,$sqli))
			 {
				 echo "inserted n irrigaed<br>";
			 }
			 else
			 {
				 echo "inserted non-irrigated<br>";
			 }
			}
				header("Location:success.php");
	           }
		 }
		
		
	   			 
	
	   	  }
	    }
	else if($recommendation=="False")
	{
		$_SESSION['final']=$crop_name;
	//$compressorEnabled = false;
		$sql = "INSERT INTO crop_details(farmer_id,crop_name,n,p,k,irrigation,budget,area,cultivation_month,recommendation,phmin,phmax,soil_type,outdated) VALUES($id,'$crop_name',$n,$p,$k,'$irrigation','$budget',$area,'$cultivation_month','$recommendation',$phmin,$phmax,'$soiltype','No')";
		if(mysqli_query($con,$sql))
		{
			header("Location:successa.php");
			//print("Alert Insert");
			
		}
		else
		{
			echo "<script>alert('Failed to register, Please try again!')</script>";
			//print("Alert insert fail");
		}
		
	}
	 }
	}
	   else
	   {
	// echo "Inside else";
		   header("location:index.php");
	   }
	   mysqli_close($con);
	   ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- google translate script 1
			<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>		-->
		<!-- Call back function 
			<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}2-->
		</script> 
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript" src="js/validation.js"></script>
		<script type="text/javascript">
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
				}*/
				/*
				function test(){
				 var selectvalue = $('input[name=exist]:checked').val();
				 if(selectvalue=='yes'){
				 window.location.href='CropRecommendation.php';
				 }
				 else{
				 window.location.href='CropAlert.php';
				 }
				}
				function display(x)
				{
					if(x==0)
						document.getElementById('crop').style.display='block';
					else
						document.getElementById('crop').style.display='none';
					return;
						
				}*/
				
				
				
		</script>
		<!-- google translate script 1-->
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<!-- Call back function 2 -->
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
		<!-- Required meta tags-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Colorlib Templates">
		<meta name="author" content="Colorlib">
		<meta name="keywords" content="Colorlib Templates">
		<!-- Title Page-->
		<title>Crop Registration</title>
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
			.a1{
			padding-bottom:50px;
			}
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
			$(function () {
			    $("input[name='rdbutton']").click(function () {
			        if ($("#chkYes").is(":checked")) {
			            $("#dvPassport").hide();
			        } else {
			            $("#dvPassport").show();
			        }
			    });
			});
		</script>
	</head>
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
	<body>
		<!-- HTML element 3 -->
		<div class="page-wrapper  p-t-45 p-b-50">
			<div class="wrapper wrapper--w790">
				<div class="card card-5">
					<div class="card-heading">
						<h2 class="title">Crop Registration</h2>
					</div>
					<div class="card-body">
						<div id="google_translate_element" align="right" ></div>
						<div align="right">
							<a href = "main.php">
							Home
							</a>
						</div>
						<!--<div id="google_translate_element" align="right" class="a1"></div>onsubmit="return confirm('Do you really want to submit the form?');"-->
						<form method="POST" onsubmit="return validateForm(this);">
							<div class="form-row p-t-20">
								<label class="label label--block">Do you want recommendation for crop cultivation?</label>
								<div class="p-t-15">
									<label class="radio-container m-r-55">Yes
									<input type="radio" name="rdbutton" id = "chkYes" value="True" required="required">
									<span class="checkmark"></span>
									</label>
									<label class="radio-container">No
									<input type="radio" name="rdbutton"  id = "chkNo" value="False"  >
									<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<!--
								<div class="form-row" id = "dvPassport">
								   <div class="name">php echo _t_crop_name ?></div>
								   <div class="value">
								      <div class="input-group">
								         <div class="rs-select2 js-select-simple select--no-search">
								            <select name="crop" id="crop" required="required">
								               <option disabled="disabled" selected="selected"><?php echo _t_select_crop ?></option>
								               <option value="Sugarcane">Sugarcane</option>
								               <option value="Jawar">Jawar</option>
								               <option value="PigeonPea">PigeonPea</option>
								               <option value="Chickpea">Chickpea</option>
								               <option value="Wheat">Wheat</option>
								               <option value="Bajra">Bajra</option>
								               <option value="Tomato">Tomato</option>
								               <option value="Brinjal">Brinjal</option>
								               <option  value="Chilli">Chilli</option>
								               <option value="Onion">Onion</option>
								               <option value="Garlic">Garlic</option>
								               <option value="Okra">Okra</option>
								               <option value="Safflower">Safflower</option>
								               <option value="Sunflower">Sunflower</option>
								               <option value="Potato">Potato</option>
								            </select>
								            <div class="select-dropdown"></div>
								         </div>
								      </div>
								   </div>
								</div>-->
							<br>
							<div class="form-row" id = "dvPassport">
								<div class="name">Crop Name</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="crop" id="crop">
												<option value="" selected disabled>Select Crop</option>
												<option value="Sugarcane">Sugarcane</option>
												<option value="Jawar">Jawar</option>
												<option value="PigeonPea">Pigeon Pea</option>
												<option value="Chickpea">Chick Pea</option>
												<option value="Wheat">Wheat</option>
												<option value="Bajra">Bajra</option>
												<option value="Tomato">Tomato</option>
												<option value="Brinjal">Brinjal</option>
												<option  value="Chilli">Chilli</option>
												<option value="Onion">Onion</option>
												<option value="Garlic">Garlic</option>
												<option value="Okra">Okra</option>
												<option value="Safflower">Safflower</option>
												<option value="Sunflower">Sunflower</option>
												<option value="Potato">Potato</option>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="name">Cultivation Month</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="cultivation_month" id="month" required="required">
												<option value="" selected disabled>Select Month</option>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May"> May </option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<!--
								<div class="form-row m-b-55">
								    <div class="name"> echo _t_soiltestingresult ?></div>
								    <div class="value">
								        <div class="row row-refine">
								            <div class="col-4">
								                <div class="input-group-desc">
								                    <input class="input--style-5" type="text" name="nvalue" onkeyup="validateN(this);">
								                    <label class="label--desc"><echo _t_n ?></label>
								<label id="labeln" style="color:red"></label>
								                </div>
								            </div>
								<div class="col-4">
								                <div class="input-group-desc">
								                    <input class="input--style-5" type="text" name="pvalue" onkeyup="validateN(this);">
								                    <label class="label--desc">< echo _t_p ?></label>
								<label id="labeln" style="color:red"></label>
								                </div>
								            </div>
								
								            
								        </div>
								<div class="row row-refine">
								<div class="col-4">
								                <div class="input-group-desc">
								                    <input class="input--style-5" type="text" name="kvalue" onkeyup="validateN(this);">
								                    <label class="label--desc"><echo _t_k ?></label>
								<label id="labeln" style="color:red"></label>
								                </div>
								            </div>
								<div class="col-4">
								                <div class="input-group-desc">
								                    <input class="input--style-5" type="text" name="phvalue" onkeyup="validateN(this);">
								                    <label class="label--desc"><echo _t_ph ?></label>
								<label id="labeln" style="color:red"></label>
								                </div>
								            </div>
								</div>
								    </div>
								</div>
								-->
							<div class="form-row m-b-55">
								<div class="name">Soil Testing Results</div>
								<div class="value">
									<div class="row row-space">
										<div class="col-3">
											<div class="input-group-desc">
												<input class="input--style-5" type="text" name="nvalue" onkeyup="validateN(this);" required="required">
												<label id="labeln" style="color:red"></label>
												<label class="label--desc">Nitrogen (N)</label>
											</div>
										</div>
										<div class="col-3">
											<div class="input-group-desc">
												<input class="input--style-5" type="text" name="pvalue" onkeyup="validateP(this);" required="required">
												<label id="labelp" style="color:red"></label>
												<label class="label--desc">Phosphorus (P)</label>
											</div>
										</div>
										<div class="col-3">
											<div class="input-group-desc">
												<input class="input--style-5" type="text" name="kvalue" onkeyup="validateK(this);" required="required">
												<label id="labelk" style="color:red"></label>
												<label class="label--desc">Potassium (K)</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row m-b-55">
								<div class="name"></div>
								<div class="value">
									<div class="row row-space">
										<div class="col-2">
											<div class="input-group-desc">
												<input class="input--style-5" type="text" name="phvaluemin" onkeyup="validatePHMin(this);" required="required">
												<label id="labelphmin" style="color:red"></label>
												<label class="label--desc">Potential of Hydrogen (Minimum pH)</label>
											</div>
										</div>
										<div class="col-2">
											<div class="input-group-desc">
												<input class="input--style-5" type="text" name="phvaluemax" onkeyup="validatePHMax(this);" required="required">
												<label id="labelphmax" style="color:red"></label>
												<label class="label--desc">Potential of Hydrogen (Maximum pH)</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row p-t-20">
								<label class="label label--block">Irrigation Type</label>
								<div class="p-t-15">
									<label class="radio-container m-r-55">Irrigated
									<input type="radio" checked="checked" name="irrigated" value="Irrigated" required="required">
									<span class="checkmark"></span>
									</label>
									<label class="radio-container">Non-Irrigated
									<input type="radio" name="irrigated" value="Non-Irrigated">
									<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="form-row">
								<div class="name">Soil</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="soiltype" id="soiltype" required="required">
												<option value="" selected disabled>Choose Soil type</option>
												<option value="Alluvial">Alluvial Soil</option>
												<option value="Red">Red Soil</option>
												<option value="Black">Black loamy soil</option>
												<option value="Mountain">Mountain Soil</option>
												<option value="Laterite">Laterite Soil</option>
												<option value="Desert">Desert Soil</option>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<!--
								<div class="form-row">
								   <div class="name">Soil Type</div>
								   <div class="value">
								      <div class="input-group">
								         <div class="rs-select2 js-select-simple select--no-search">
								            <select name="soiltype" id="soiltype" required="required">
								               <option disabled="disabled" selected="selected">Choose option</option>
								               <option>Alluvial</option>
								               <option>Red</option>
								               <option>Black</option>
								               <option>Mountain</option>
								               <option>Laterite</option>
								               <option>Desert</option>
								            </select>
								            <div class="select-dropdown"></div>
								         </div>
								      </div>
								   </div>
								</div>-->
							<div class="form-row">
								<div class="name">Budget / Hectare</div>
								<div class="value">
									<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
											<select name="budget" id="budget" required="required">
												<option value="" disabled="disabled" selected="selected">Select amount</option>
												<option value="1000 - 10000">1000 - 10000</option>
												<option value="10000 - 30000">10000 - 30000</option>
												<option value="30000 - 50000">30000 - 50000</option>
												<option value="50000 - 100000">50000 - 100000</option>
												<option value="00000 - 300000">100000 - 300000</option>
												<option value="300000 and above">300000 and above</option>
											</select>
											<div class="select-dropdown"></div>
										</div>
									</div>
								</div>
							</div>
							<br>
							<!--
								<div class="form-row">
								   <div class="name"><?php //echo _t_budget ?></div>
								   <div class="value">
								      <div class="input-group">
								         <div class="rs-select2 js-select-simple select--no-search">
								            <select name="budget" id="budget" required="required">
								               <option disabled="disabled" selected="selected"><?php echo _t_select_amt ?></option>
								               <option>1000 - 10000</option>
								               <option>10000 - 30000</option>
								               <option>30000 - 50000</option>
								               <option>50000 - 100000</option>
								               <option>100000 - 300000</option>
								               <option>300000 and above</option>
								            </select>
								            <div class="select-dropdown"></div>
								         </div>
								      </div>
								   </div>
								</div>-->
							<div class="form-row m-b-55">
								<div class="name">Land Area (in Hectare)</div>
								<div class="value">
									<div class="col-4">
										<div class="input-group-desc">
											<input class="input--style-5" type="text" name="land" onkeyup="validateland(this);" required="required">
											<label id="labelarea" style="color:red"></label>
											<l<label class="label--desc">[Reference 1 Hectare : 2.47105 Acre] </label>
										</div>
									</div>
								</div>
							</div>
							<div>
								<center>
									<button class="btn btn--radius-2 btn--red" type="submit"  name="submit" id="submit" >Register</button>
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
		<script>
			/*
			$('input[name="rdbutton"]').on('change',function()
			{
				$('select[name="crop"]').attr('disabled',this.value!="False")
			
			});*/
			/*
			$(document).ready(
			function()
			{
				$("#option1,#option2").click(
					function({
						if(this.id == "option1")
							$("#crop").hide();
						else
							$("#crop").show();
					});
				
			});*/
		</script>
	</body>
	<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->