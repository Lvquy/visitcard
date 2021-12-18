<?php
	if(!isset($_SESSION["id"])){
        $username = '';
	    echo "<style>
	     #profile, #logout {display:none;}
	    </style>";
	    echo "<link rel='icon' href='static/images/logo-off.png' type='image/x-icon'>";
	}
	else{
	    echo "
            <style>
                .float-right,#username,#input-username ,#login{display:none;} 
            </style>";
	    echo "<link rel='icon' href='static/images/logo.png' type='image/x-icon'>";
        $id = $_SESSION["id"];
        $username = $_SESSION["username"];
        $sql_query = "SELECT * FROM `users` WHERE id = $id";
        $result = mysqli_query($con,$sql_query) ;
        $data = mysqli_fetch_array($result);
        $fullname = $data["fullname"];
        $id = $data["id"];
        $active = $data["active"];
        $mobile = $data["mobile"];
        $intro = $data["intro"];
        $email = $data["email"];
        $status_email = $data["status_email"];
        $address = $data["address"];
        $avata = $data["avata"];
        $slug = $data["slug"];
        $visit = $data["visit"];
        
        $bank_name = $data["bank_name"];
        $bank_num = $data["bank_num"];
        $bank_sub = $data["bank_sub"];
        $bank_user = $data["bank_user"];
        $top_bg_img = $data["top_bg_img"];
        // lấy tất cả dữ liệu trong bảng social
        $query ="SELECT * FROM social WHERE of_user = $id";
        $result = mysqli_query($con, $query);
        $data = array();
        while ($row = mysqli_fetch_array($result,1)){
            $data[] = $row;}
	}

?>