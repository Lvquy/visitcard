
<?php
require_once("../includes/db.php");
if (isset($_POST["mobile"])) {
	$mobile = $_POST["mobile"];
	$add = $_POST["add"];
	$note = $_POST["note"];
	$cus_name = $_POST["cus_name"];
	$qty = $_POST["qty"];
	$textcolor = $_POST["textcolor"];
	$total = $_POST["total"];
	$username = $_POST["username"];
	$session = $_POST["session"];
	$type = $_POST["card_type"];
	$order_date = date("Y-m-d");
	$saler = "Web online";
	$state = 0;
	$password = "vncard";
	$ip = 	getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');
	
	if ($type == "Loại 1, màu gradient"){
		$card_type ="1";
		$price = 150000;
	};
	if ($type == "Loại 2, Nền đen"){
		$card_type ="2";
		$price = 150000;
	};
	if ($type == "Loại 3, Nền trắng"){

		$card_type ="3";
		$price = 150000;
	};
	if ($type == "Thiết kế theo yêu cầu"){
		$card_type ="4";
		$price = 160000;
	};
	if($qty >=5){
		$price = $price-50000;
	};
	
	$query = "INSERT into `sale_order` 
	(cus_name,cus_add,cus_mobile,card_type,price,qty,note,order_date,saler,state,text_color,total,username,ip) VALUES 
	('$cus_name','$add','$mobile','$card_type','$price','$qty','$note','$order_date','$saler','$state','$textcolor','$total','$username','$ip')";
	$result = mysqli_query($con,$query);

	if ($session == "false"){
		// chưa có tài khoản đăng nhập -> tạo tài khoản mới
		echo 'session false';
		$query_adduser = "INSERT into `users` (slug, fullname,active, password,reg_date,top_bg_color,intro,avata,top_text_color,ip) VALUES ('$username','$cus_name','0','".md5($password)."','$order_date','white','Giới thiệu một chút về bạn đi...','none-avata.png','black','$ip')";
		$result = mysqli_query($con,$query_adduser);
	}	
}