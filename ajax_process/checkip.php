
<?php
require_once("../includes/db.php");
require "../libs/PushBullet.class.php";


if (isset($_POST["ip"])) {
	$mobile=$_POST['mobile'];
	// get token
	$query_gettoken = "SELECT * from push WHERE active ='1' LIMIT 0,1 ";
	$result_gettoken = mysqli_query($con,$query_gettoken);
	$data_token = mysqli_fetch_array($result_gettoken);

	$mobile_token = $data_token["token"];
	$mobile_iden = $data_token["mobile_iden"];
	// get ip lại từ đầu
	$ip =   getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');

	$query ="SELECT ip FROM sale_order WHERE ip = '$ip'";
	$result = mysqli_query($con,$query);
	$query_user ="SELECT ip FROM users WHERE ip = '$ip'";
	$result_user = mysqli_query($con,$query_user);

	$row = mysqli_num_rows($result);
	$row_user = mysqli_num_rows($result_user);
	$trung_ip = true;
	if ($row_user >0 || $row > 0) {
		// trung ip
		$trung_ip = true;
		
	}
	else{
		$trung_ip = false;
	};

	if ($trung_ip == true) {
		// trung ip
		echo 0;
		if (strlen($mobile_token) > 5 ){
			try {
				$p = new PushBullet($mobile_token);
				 // set NULL là gửi tới all devices
				$p->pushNote(NULL, 'New Order', 'Có đơn hàng mới sếp ơi');
			}
			catch (PushBulletException $e) {
				// Exception handling
				die($e->getMessage());
			}
		}
	}else{
		//chua co ip trong he thong
		echo 1;
		//send sms
		$addresses = $mobile; 
		$sms = 'Đặt thẻ thành công, VnCard.info sẽ sớm liên hệ lại để xác nhận';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.pushbullet.com/v2/texts');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

		$headers = [];
		$headers[] = 'Access-Token: '.$mobile_token;
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}

		//send notification
		// kiểm tra điều kiện độ dài của token
		if (strlen($mobile_token) > 5 ){
			try {
			  $p = new PushBullet($mobile_token);
			  // set NULL là gửi tới all devices
			  $p->pushNote(NULL, 'New Order', 'Có đơn hàng mới sếp ơi');
			}
			catch (PushBulletException $e) {
				 // Exception handling
				 die($e->getMessage());
			}
		}
		
	}
}
?>