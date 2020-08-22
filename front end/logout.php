<?php
	//session_start();
	//unset($_SESSION['sess_user']);
	//session_destroy();
	if(isset($_COOKIE['sess_user']))
	{
	 setcookie("sess_user","",time()-432000);
	  setcookie("id","",time()-432000);
	  setcookie("name","",time()-432000);
	  setcookie("recommendation","",time()-432000);
	  setcookie("result","",time()-432000);
	  setcookie("cultivation_month","",time()-432000);
		setcookie("n","",time()-432000);
		setcookie("p","",time()-432000); 
		setcookie("k","",time()-432000);
		setcookie("phmin","",time()-432000);
		setcookie("phmax","",time()-432000);
		setcookie("irrigation","",time()-432000);
		setcookie("soiltype","",time()-432000);
		setcookie("budget","",time()-432000);
		setcookie("area","",time()-432000);
		setcookie("crop_name","",time()-432000);
		setcookie("chradio","",time()-432000);
		setcookie("old_mobile","",time()-432000);
		setcookie("new_mobile","",time()-432000);	
		//setcookie("googtrans", "", time()-432000);
		
			// setcookie("namem","",time()-432000);
			// setcookie("statem","",time()-432000);
			// setcookie("districtm","",time()-432000);
			// setcookie("languagem","",time()-432000);
	header("Location: index.php");
	}
	else
	{
		header("Location: index.php");
	}
	?>