<?php
require('includes/db.php');
    if (isset($_POST['username'])){
		$fullname = stripslashes($_REQUEST['fullname']);
		$fullname = mysqli_real_escape_string($con,$fullname);
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$reg_date = date("Y-m-d H:i:s");
		$sql_check_unique = "SELECT slug FROM `users` WHERE slug = '$username'";
		$result_check_unique = mysqli_query($con, $sql_check_unique);

		if (!preg_match("/^[a-zA-Z0-9]{3,30}$/",$username)) {
          echo 2;
          exit();
            //Lỗi, không đc chứa kí tự đặc biệt
    }

		$ip = 	getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');
		if (mysqli_num_rows($result_check_unique) > 0){
            // ID này đã có người dùng!
			echo 0;
			exit();
		}
		else {
		    $query_user = "INSERT into `users`
		    (fullname, password, reg_date,top_bg_color,slug,intro,avata,top_text_color,ip) VALUES
		    ('$fullname','".md5($password)."', '$reg_date','white','$username','Giới thiệu một chút về bạn đi...','none-avata.png','black','$ip')";
            $result_user = mysqli_query($con,$query_user);
             if($result_user){
               // Đăng ký thành công
               echo 1;
               exit();
             }
		}
	}
?>