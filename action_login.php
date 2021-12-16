<?php
	require('includes/db.php');

    if (isset($_POST['username'])){
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);



        $query = "SELECT * FROM `users` WHERE slug='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
            session_start();
            $query_id = "SELECT id, admin, slug FROM `users` WHERE slug='$username'";
            $result = mysqli_query($con,$query_id);
            $data_id = mysqli_fetch_array($result);
            $id = $data_id['id'];
            $admin = $data_id['admin'];
            $username = $data_id['slug'];
			$_SESSION['id'] = $id;
            $_SESSION['admin'] = $admin;
            $_SESSION['username'] = $username;
			header("Location: profile.php");
			exit();
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Sai tên hoặc mật khẩu!")';
            echo '</script>';
            include("login.php");
            exit();
		}
    }
?>
