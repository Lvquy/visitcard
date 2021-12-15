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
    	$content_mail ="<h1>Xin chào bạn: $fullname </h1>";
    	$content_mail .= "<h2>Mã kích hoạt của bạn là: <span style='color:blue'>$active_code </span></h2>";
    	$content_mail .= "<p>Coppy mã trên dán vào form tại website để xác nhận</p>";
    	$content_mail .= "<p><strong>Lưu ý: Chỉ email đã xác nhận mới có thể dùng để khôi phục tài khoản khi quên mật khẩu.</strong></p>";
    	$content_mail .= "<p>Email được gửi từ website: https://vncard.com</p>";
    	$content_mail .= "<h3 style='color:red'>VnCard | Chia sẻ thông tin chỉ 1 chạm </h3>";

    	$mail = new PHPMailer(true);

    	try {
				//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			    $mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = 'in24h.com.vn';                     //SMTP username
			    $mail->Password   = 'Talathulinh@91';                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			    $mail->Port       = 465;  //465 587
			    $mail->isHTML(true);
			    $mail->setFrom('vncard@gmail.com', 'VnCard');
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

    //reset pass
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
            $content_mail = "<h2>RESET PASSWORD</h2>";
            $content_mail .= "<h3>Mật khẩu mới của bạn là: $new_pass </h3>";
            $content_mail .= "<p>Chúng tôi không thể biết mật khẩu cũ của bạn, mật khẩu đã được mã hóa, dùng mật khẩu trên để đăng nhập, sau khi đăng nhập hãy đổi mật khẩu mới.</p>";
            // có email này trong hệ thống & status là đã confirm
            $mail = new PHPMailer(true);
            try {
            	$mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = 'in24h.com.vn';                     //SMTP username
			    $mail->Password   = 'Talathulinh@91';                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			    $mail->Port       = 465;  //465 587
			    $mail->isHTML(true);
			    $mail->setFrom('smartcard@gmail.com', 'VnCard');
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
?>