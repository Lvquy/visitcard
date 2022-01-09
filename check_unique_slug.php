<?php
	require('includes/db.php');
	if (isset($_POST["id"])){
		$slug = $_POST["slug"];
		$id = $_POST["id"];
		$query_check_slug = "SELECT slug FROM `users` WHERE (slug = '$slug' AND id != '$id')";
		$resut_check_slug = mysqli_query($con,$query_check_slug);
		
	}
	if (isset($_POST["slug"])){
		$slug = $_POST["slug"];
		$query_check_slug = "SELECT slug FROM `users` WHERE (slug = '$slug')";
		$resut_check_slug = mysqli_query($con,$query_check_slug);
	}
	if (!preg_match("/^[a-zA-Z0-9]{3,30}$/",$slug)) {
          echo 2;
          exit();
            //Lỗi, không đc chứa kí tự đặc biệt
    }
		


	$row = mysqli_num_rows($resut_check_slug);
	
	if ($row >0){
		echo 1;
		exit();
		//trung
	}
	else{
		echo 0;
		exit();
		//ok
	}
	echo $output;
	
	
?>