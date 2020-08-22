<?php
	$conn = mysqli_connect("localhost","root","","baliraja");
	$mobileno=$_POST['mobileno'];
		$duplicate=mysqli_query($conn,"select mobile_no from farmer_details where mobile_no='$mobileno'");
		if (mysqli_num_rows($duplicate)>0)
		{
	        echo json_encode(array("statusCode"=>201));
	    }
	else{
	    echo json_encode(array("statusCode"=>200));
	}
	mysqli_close($conn);
?>