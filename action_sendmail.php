<?php
	require('includes/db.php');
	//emailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    //emailer end
    $user_gmail = "vncard.notify";
    $pass_gmail = "vkkdajafissqnmlh";

    function generateRandomString($length = 10) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	    };

    if (isset($_POST["email_value"])){
    	$email_value = $_POST["email_value"];
    	$id_user = $_POST["id_user"];
    	$fullname = $_POST["fullname"];
    	$subject = "Active Code From VnCard";
    	// fun random code
	    
	    
    	// fun random code end
    	$active_code_tml =  generateRandomString(9);
    	$active_code = $active_code_tml;
    	$sql_ins_code = "UPDATE users set active_code ='$active_code' WHERE id = '$id_user'";
    	$result_ins_code = mysqli_query($con,$sql_ins_code);
    	$content_mail ="<h1>Xin chào anh/chị: $fullname </h1>
    					<h2>Mã kích hoạt của anh/chị là: <span style='color:blue'>$active_code </span></h2>
    					<p>Coppy mã trên dán vào form tại website để xác nhận</p>
    					<p><strong>Lưu ý: Chỉ email đã xác nhận mới có thể dùng để khôi phục tài khoản khi quên mật khẩu.</strong></p>
    					<p>Email được gửi từ website: https://vncard.info</p>
    					<h3 style='color:red'>VnCard | Chia sẻ thông tin chỉ 1 chạm </h3>
    					";

    	$mail = new PHPMailer(true);

    	// send code confirm mail
    	try {
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    			$mail->charSet = "UTF-8"; 
			    $mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = $user_gmail;                     //SMTP username
			    $mail->Password   = $pass_gmail;                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			    $mail->Port       = 465;  //465 587
			    $mail->isHTML(true);
			    $mail->setFrom('vncard.notify@gmail.com', 'VnCard');
		        $mail->addAddress($_POST["email_value"], $fullname);     //Add a recipient
			    $mail->Subject = $subject;
		        $mail->Body    = $content_mail; 

		        $mail->send();
		        $sql_status_email = "UPDATE users set status_email = 'send' ";
		        $result_status_email = mysqli_query($con, $sql_status_email);
		        echo 1;
	    	}
	    	catch (Exception $e) {
    			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
    }

    //reset password
    if (isset($_POST["email_user"])){
        $email_user = $_POST["email_user"];
        

        $query_email_user = "SELECT email, fullname FROM users
         WHERE email = '$email_user' AND status_email = 'confirmed' " ;
        $result = mysqli_query($con, $query_email_user);
        $row_email = mysqli_num_rows($result);
        if ($row_email >0){
            $data_email = mysqli_fetch_array($result);
            $email = $data_email["email"];
            $fullname = $data_email["fullname"];
            $new_pass = generateRandomString(5);
            $content_mail = "
            	<h2>RESET PASSWORD</h2>
   				<h3>Mật khẩu mới của bạn là: $new_pass </h3>
            	<p>Chúng tôi không thể biết mật khẩu cũ của bạn, mật khẩu đã được mã hóa, dùng mật khẩu trên để đăng nhập, sau khi đăng nhập hãy đổi mật khẩu mới.</p>
            	<p>Link đăng nhập tại: <a href='https://vncard.info/login.php' title='login'>Đây</a> </p>
            	";

            // có email này trong hệ thống & status là đã confirm
            $mail = new PHPMailer(true);
            try {
            	$mail->charSet = "UTF-8"; 
            	$mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   =  $user_gmail;                     //SMTP username
			    $mail->Password   = $pass_gmail;                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			    $mail->Port       = 465;  //465 587
			    $mail->isHTML(true);
			    $mail->setFrom('vncard.notify@gmail.com', 'VnCard');
		        $mail->addAddress($email, $fullname);     //Add a recipient
			    $mail->Subject = "Reset Password";
		        $mail->Body    = $content_mail; 

		        $mail->send();
		        $sql_update_pass = "UPDATE users
		         set password='".md5($new_pass)."' WHERE email = '$email' ";
		        $result_update_pass = mysqli_query($con, $sql_update_pass);
		        echo 1;
            }catch (Exception $e) {
    			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}

        }
        else{
            // không tìm thấy email này trong hệ thống
            echo 0;
        }

    }
    //reset pass

    // notify new order
    if (isset($_POST["sent_mail_confirm"])){
    	$sent_mail_confirm = $_POST["sent_mail_confirm"];
    	$mobile = $_POST["mobile"];
    	$add = $_POST["add"];
    	$note = $_POST["note"];
    	$cus_name = $_POST["cus_name"];
    	$card_type = $_POST["card_type"];
    	$textcolor = $_POST["textcolor"];
    	$qty = $_POST["qty"];
    	$total = $_POST["total"];
    	$username = $_POST["username"];

    	if ($sent_mail_confirm == true){
    		$data_email = mysqli_fetch_array($result);
            $email = "vncard.notify@gmail.com";
            $fullname = "Web Online";
            $content_mail = "
            	<h2>New Order</h2>
	            <h3>Bạn có 1 đơn hàng mới từ website</h3>
	            <p>Cus name: $cus_name</p>
	            <p>Username: $username</p>
	            <p>Add: $add</p>
	            <p>Mobile: $mobile</p>
	            <p>Note: $note</p>
	            <p>Card type: $card_type</p>
	            <p>Qty: $qty</p>
	            <p>Text color: $textcolor</p>
	            <p>Total: $total</p>
	            <p><hr></p>
	            <p>Kiểm tra ngay: <a href='https://vncard.info/admin.php'>https://vncard.info/admin.php</a></p>
	        ";
            $mail = new PHPMailer(true);
    		try {
    			$mail->charSet = "UTF-8"; 
            	$mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = $user_gmail;                     //SMTP username
			    $mail->Password   = $pass_gmail;                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			    $mail->Port       = 465;  //465 587
			    $mail->isHTML(true);
			    $mail->setFrom('vncard.notify@gmail.com', 'VnCard');
		        $mail->addAddress($email, $fullname);     //Add a recipient
			    $mail->Subject = "New Order";
		        $mail->Body    = $content_mail; 

		        $mail->send();
		        echo 1;
            }catch (Exception $e) {
            	echo 0;
    			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
    	}
    }
    // sent mail confirm end
?>