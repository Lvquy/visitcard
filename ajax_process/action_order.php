
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
	$order_date = date("Y-m-d");
	$saler = "Web online";
	$state = 0;
	
	if ($_POST["card_type"] == "Loại 1, màu gradient"){
		$card_type ="1";
		$price = 150000;
	};
	if ($_POST["card_type"] == "Loại 2, Nền đen"){
		$card_type ="2";
		$price = 150000;
	};
	if ($_POST["card_type"] == "Loại 3, Nền trắng"){

		$card_type ="3";
		$price = 150000;
	};
	if ($_POST["card_type"] == "Thiết kế theo yêu cầu"){
		$card_type ="4";
		$price = 160000;
	};
	if($qty >=5){
		$price = $price-50000;
	};
	
	$query = "INSERT into `sale_order` 
	(cus_name,cus_add,cus_mobile,card_type,price,qty,note,order_date,saler,state,text_color,total,username) VALUES 
	('$cus_name','$add','$mobile','$card_type','$price','$qty','$note','$order_date','$saler','$state','$textcolor','$total','$username')";
	$result = mysqli_query($con,$query);

}
