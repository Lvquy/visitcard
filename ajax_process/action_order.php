
<?php
require_once("../includes/db.php");

if (isset($_POST["mobile"])) {
	$mobile = $_POST["mobile"];
	$add = $_POST["add"];
	$note = $_POST["note"];
	$cus_name = $_POST["cus_name"];
	$qty = $_POST["qty"];
	$textcolor = $_POST["textcolor"];
	$order_date = date("Y-m-d");
	$saler = "Web online";
	$state = 0;
	
	if ($_POST["card_type"] == "Loại 1, màu gradient"){
		$price = 150000;
		$card_type ="1";
	};
	if ($_POST["card_type"] == "Loại 2, Nền đen"){
		$price = 150000;
		$card_type ="2";
	};
	if ($_POST["card_type"] == "Loại 3, Nền trắng"){
		$price = 150000;
		$card_type ="3";
	};
	if ($_POST["card_type"] == "Thiết kế theo yêu cầu"){
		$price = 160000;
		$card_type ="4";
	};
	
	$query = "INSERT into `sale_order` 
	(cus_name,cus_add,cus_mobile,card_type,price,qty,note,order_date,saler,state,text_color) VALUES 
	('$cus_name','$add','$mobile','$card_type','$price','$qty','$note','$order_date','$saler','$state','$textcolor')";
	$result = mysqli_query($con,$query);

}
