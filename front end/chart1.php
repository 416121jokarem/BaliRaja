<?php
		
			$con = mysqli_connect("localhost","root","","baliraja");
			if (mysqli_connect_errno())						
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			/*
if(isset($_POST['submit']))
		  {
			  $nation=$_POST['nation'];
			  $state = isset($_POST['state']) ? $_POST['state'] : '';
			  $district = isset($_POST['district']) ? $_POST['district'] : '';
			  echo $nation;
			  echo $state;
			  echo $district;
			  if(empty(state))
			  {echo"empty state"}
				if(empty())
		
		  }*/
		  
		  
?>

<html>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
													
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
	
		  
		  if(isset($_POST['submit']))
		  {
			  $nation=$_POST['nation'];
			  $state = isset($_POST['state']) ? $_POST['state'] : '';
			  $district = isset($_POST['district']) ? $_POST['district'] : '';
		   //$sqlq="SELECT COUNT(crop_details.crop_id) as cropid,crop_details.crop_name FROM crop_details INNER JOIN farmer_details ON crop_details.farmer_id=farmer_details.farmer_id GROUP BY crop_details.crop_name";
		   
			  if(empty($state) and empty($district))
		   {
			    $sqlq="SELECT COUNT(crop_details.crop_id) as cropid,crop_details.crop_name FROM crop_details INNER JOIN farmer_details ON crop_details.farmer_id=farmer_details.farmer_id GROUP BY crop_details.crop_name";
				$fire=mysqli_query($con,$sqlq);
				while($result=mysqli_fetch_assoc($fire))
				{
					//echo $result['cropid'];
					// $result['crop_name'];
					echo "['".$result['crop_name']."',".$result['cropid']."],";
				}
		   }   
			else if(empty($district))
		   {
		   $sqlq="SELECT COUNT(crop_details.crop_id) as cropid,crop_details.crop_name FROM crop_details INNER JOIN farmer_details ON crop_details.farmer_id=farmer_details.farmer_id WHERE farmer_details.state=$state GROUP BY crop_details.crop_name";
		  $fire=mysqli_query($con,$sqlq);
			while($result=mysqli_fetch_assoc($fire))
			{
				//echo $result['cropid'];
				// $result['crop_name'];
				echo "['".$result['crop_name']."',".$result['cropid']."],";
			}
		   }
			else
			{
			$sqlq="SELECT COUNT(crop_details.crop_id) as cropid,crop_details.crop_name FROM crop_details INNER JOIN farmer_details ON crop_details.farmer_id=farmer_details.farmer_id WHERE farmer_details.state=$state and farmer_details.district='$district' GROUP BY crop_details.crop_name";
			$fire=mysqli_query($con,$sqlq);
			while($result=mysqli_fetch_assoc($fire))
			{
				//echo $result['cropid'];
				// $result['crop_name'];
				echo "['".$result['crop_name']."',".$result['cropid']."],";
			}
			}
		  }

		  ?>
        ]);

        var options = {
          title: 'List of Crops',
		  width:'100%',
		  height:'500px',
		  is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
	  
	  /*function ddlViewBy()
	  {
	  var e = document.getElementById("ddlViewBy");
	 // window.alert(e);
	  //console.log(e);
      var strUser = e.options[e.selectedIndex].value;
	  console.log(strUser);
	  window.alert(strUser);
	  }*/
    </script>
	<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<!-- Call back function 2 -->
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
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
						
						var e = document.getElementById("state");
						var strState = e.options[e.selectedIndex].value;
						//alert(strState);
					}
					function selectCountry(val) {
					$("#search-box").val(val);
					$("#suggesstion-box").hide();
					}
function districtName()
{
	var e = document.getElementById("district-list");
	var strCity = e.options[e.selectedIndex].value;
	//console.log(strCity);
}

		</script>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style>
		#chart_wrap{
			positon: relative;
			padding-bottom:100%;
			height:800px;
			width:100%;
			overflow:hidden;
		}
		#piechart{
			positon: absolute;
			top:0;
			left:0;
			width:100%;
			height:800px;
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
			body {
			background-image: url("images/image1.jpg");
			background-color: #cccccc;
			}
		</style>
  </head>
  <body>
  <!--
	<select id="ddlViewBy" onchange="ddlViewBy();">
	<option value="1">test1</option>
	<option value="2">test2</option>
	<option value="3">test3</option>
	</select>
	-->

	 <div class="page-wrapper  p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Registration Form</h2>
                </div>
                <div class="card-body">
				<div align="right">
							<div id="google_translate_element" align="right" ></div>
							<br><br>
							<a href = "index.php">
							Home  
							</a>
							
						</div>
                    <form method="POST">
                       
                    
                  
                        
                        <div class="form-row">
                            <div class="name">Nation</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="nation" id="nation" required>
											<option value="" disabled="disabled" selected="selected">Select Nation</option>
											<option value="india">India</option>
										</select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">State</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select onChange="getdistrict(this.value);"  name="state" id="state">
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
                                        <select onChange="districtName()" name="district" id="district-list">
												<option value="" disabled="disabled" selected="selected">Select District</option>
										</select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit" id="submit">Submit</button>
                        </div><br>
<div class="name" style="color:red">Note : Please scroll down to see PieChart</div>
                    </form>
				
                           
							
									
									  
							
								
							
                </div>
            </div>
        </div>
    </div>
    <div id="chart_wrap">
		<div id="piechart"></div>
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
</html>
