<?php
	require('includes/db.php');
	if (isset($_POST["slug"])){
		$slug = $_POST["slug"];
		$id = $_POST["id"];
		$query_check_slug = "SELECT slug FROM `users` WHERE (slug = '$slug' AND id != '$id')";
		$resut_check_slug = mysqli_query($con,$query_check_slug);

		$row = mysqli_num_rows($resut_check_slug);
		
		if ($row >0){
			echo 1;
			//trung
		}
		else{
			echo 0;
			//ok
		}
	
	}
?>