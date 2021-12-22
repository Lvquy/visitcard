<?php
require('includes/db.php');
session_start();
   include("includes/php.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include('includes/head.html');?>
<title>VnCard | Login</title>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
<?php include('includes/preloader.html');?>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php include('includes/menu.html');?>
  <!-- ***** Header Area End ***** -->

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row text-center">
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h1 id='login1'>LOGIN</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <form method="POST" action="action_login.php" id="form_login">
                    <div class="form-group col-xs-6">
                        <div class="inner-addon icon-addon">
                            <i class="fa left fa-user"></i>
                            <input type="text" name="username" class="form-control" placeholder="ID đăng nhập..." />
                        </div>
                        <div class="mt-2 inner-addon icon-addon">
                             <i class="fa left fa-key"></i>
                            <input type="password" name="password"  class="form-control" placeholder="Password" />
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Đăng nhập</button>
                    </div>
                    <div class="form-group col-xs-12">
                        <a href="#" class="badge badge-success mt-4" id="lost_pass" onclick="show_form_reset_pass()">
                            Quên mật khẩu
                        </a>
                        <a class="badge badge-success mt-4" href="./register.php">Đăng ký</a>
                    </div>
                </form>
            

                <div class="inner-addon icon-addon reset" id="div_reset_pass">
                    <i class="fa fa-envelope-o left" aria-hidden="true"></i>
                    <input type="email" name="email" id="reset_password" class="form-control" placeholder="Nhập email..." />
                    <p id='send_pass_ok'></p>
                </div>
                
                <a href="#" class="btn btn-primary mt-4" id="reset_password_submit" onclick="reset_password()">
                    Lấy lại mật khẩu
                </a>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function show_form_reset_pass(){
        document.getElementById("reset_password_submit").style.display = "block";
        document.getElementById("div_reset_pass").style.display = "block";
        document.getElementById("form_login").style.display = "none";

    };
    //lost pass
    function reset_password() {
        console.log('reset_password');
        var email_user = $("#reset_password").val();
        console.log(email_user);
        $.post("action_sendmail.php",{email_user:email_user},function(data){
            if (data == 0) {
                //false
                console.log('email nay chua dc xac nhan');
                $("#send_pass_ok").html("Email chưa được xác nhận trong hệ thống!");
            }
            else{
                //true > lấy email đc trả về từ biến data -> gửi email new pass
                console.log(data);
                $("#send_pass_ok").html("Đã gửi mật khẩu mới tới email!");
                document.getElementById("reset_password_submit").style.display = "none";

            }
        });
    }
    //lost pass

    
</script>

<!--   footer start -->
<!-- <?php include('includes/footer.html'); ?> -->
<!--   footer end -->


<!-- Scripts -->
<?php include('includes/script.html');?>

</body>
</html>