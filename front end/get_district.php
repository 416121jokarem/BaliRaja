<?php
$con = mysqli_connect("localhost","root","","baliraja");
                        // Check connection
                        if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
      
if(!empty($_POST["state_id"])) 
{
	
		$query =mysqli_query($con,"SELECT district_id, district_name FROM district WHERE state_id = '" . $_POST["state_id"] . "'");
		?>
		<option value="">Select District</option>
		<?php
			while($row=mysqli_fetch_array($query))  
			{
		?>
		<option value="<?php echo $row["district_name"]; ?>"><?php echo $row["district_name"]; ?></option>
		<?php
		}
	

}
?>
