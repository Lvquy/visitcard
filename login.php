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
                <div id="form_login">
                    <div class="form-group">
                        <div class="inner-addon icon-addon">
                            <i class="fa left fa-user"></i>
                            <input type="text" id="username" class="form-control" placeholder="ID đăng nhập..." />
                        </div>
                        <div class="mt-2 inner-addon icon-addon">
                             <i class="fa left fa-key"></i>
                            <input type="password" id="password"  class="form-control" placeholder="Password" />
                        </div>
                        <button onclick="login()" class="btn btn-primary mt-4">Đăng nhập</button>
                    </div>
                    <div class="form-group">
                        <a href="#" class="badge badge-success mt-4" id="lost_pass" onclick="show_form_reset_pass()">
                            Quên mật khẩu
                        </a>
                        <a class="badge badge-success mt-4" href="./register.php">Đăng ký</a>
                    </div>
                </div>
                <script>
                    function login() {
                        var username = $("#username").val()
                        var password = $("#password").val()
                        $.post("action_login.php",{username:username,password:password},function(data){
                            if (data == 1) {
                                //
                                Toastify({
                                  text: "Đăng nhập thành công!",
                                  duration: 2000,
                                  //destination: "#",
                                  newWindow: true,
                                  close: true,
                                  gravity: "top", // `top` or `bottom`
                                  position: "center", // `left`, `center` or `right`
                                  stopOnFocus: true, // Prevents dismissing of toast on hover
                                  style: {
                                    background: "linear-gradient(to right, #0CF722, #3DB0C9)",
                                  },
                                  //onClick: function(){} // Callback after click
                                }).showToast();
                                //
                                setTimeout(function() {
                                    window.location.replace("profile.php");
                                }, 2000);
                            }
                            else{
                                //
                                Toastify({
                                  text: "Sai tên đăng nhập hoặc mật khẩu",
                                  duration: 2000,
                                  //destination: "#",
                                  newWindow: true,
                                  close: true,
                                  gravity: "top", // `top` or `bottom`
                                  position: "center", // `left`, `center` or `right`
                                  stopOnFocus: true, // Prevents dismissing of toast on hover
                                  style: {
                                    background: "linear-gradient(to right, #F70C17, #3DB0C9)",
                                  },
                                  //onClick: function(){} // Callback after click
                                }).showToast();
                                //
                            }
                           
                        })
                    }
                </script>
            
                <div class="inner-addon icon-addon reset" id="div_reset_pass">
                    <i class="fa fa-envelope-o left" aria-hidden="true"></i>
                    <input type="email" name="email" id="reset_password" class="form-control" placeholder="Nhập email..." />
                    <p id='send_pass_ok'></p>
                </div>
                
                <a href="#" class="btn btn-primary mt-4" id="reset_password_submit" onclick="reset_password()">
                    Lấy lại mật khẩu
                </a>
                <div id="backto_login"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function show_form_reset_pass(){
        document.getElementById("reset_password_submit").style.display = "block";
        document.getElementById("div_reset_pass").style.display = "block";
        document.getElementById("form_login").style.display = "none";
        document.getElementById("backto_login").innerHTML = "<a href='#' class='badge badge-success mt-4' id='backto_login' onclick='backto_login()'>Quay lại đăng nhập</a>";
    };
    //lost pass
    function reset_password() {
        
        var email_user = $("#reset_password").val();
        
        $.post("action_sendmail.php",{email_user:email_user},function(data){
            if (data == 0) {
                //false
                
                $("#send_pass_ok").html("Email chưa được xác nhận trong hệ thống!");
            }
            else{
                //true > lấy email đc trả về từ biến data -> gửi email new pass
                
                $("#send_pass_ok").html("Đã gửi mật khẩu mới tới email!");
                document.getElementById("reset_password_submit").style.display = "none";

            }
        });
    }
    //lost pass
     // back to login
      function backto_login() {
        document.getElementById("reset_password_submit").style.display = "none";
        document.getElementById("div_reset_pass").style.display = "none";
        document.getElementById("form_login").style.display = "inline-block";
        document.getElementById("backto_login").innerHTML ="";
      }
     // back to login
    
</script>

<!--   footer start -->
<!-- <?php include('includes/footer.html'); ?> -->
<!--   footer end -->


<!-- Scripts -->
<?php include('includes/script.html');?>

</body>
</html>