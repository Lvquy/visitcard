<?php
	require('includes/db.php');
	if (isset($_POST["mobile"])){
		$mobile = $_POST["mobile"];
		$id = $_POST["id_user"];
		$query_check_mobile = "SELECT mobile FROM `users` WHERE (mobile != '' AND mobile = '$mobile' AND id != '$id')";
		$resut_check_mobile = mysqli_query($con,$query_check_mobile);

		$row = mysqli_num_rows($resut_check_mobile);
		
		if ($row >0){
			//trung
			echo 1;
		}
		else{
			//khong trung
			echo 0;
		}
	
	}
?>