<?php
    require('includes/db.php');
	include("includes/php.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.html');?>
<title>SmartCard | Register</title>
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
            <div class="col-lg-6">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h1 id='login'>ĐĂNG KÍ</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <form method="POST" action="action_reg.php">
                    <div class="form-group col-xs-6">
                        <div class="inner-addon icon-addon">
                            <i class="fa fa-user left" aria-hidden="true"></i>
                            <input type="text" name="username"
                             pattern="[a-z0-9]{3,25}"
                             id="username" class="form-control" required
                             placeholder="ID đăng nhập..." />
                        </div>
                        <div class="inner-addon icon-addon mt-2">
                            <i class="fa fa-user left"></i>
                            <input name="fullname" type="text"
                             class="form-control" id="fullname" required
                             placeholder="Họ tên...">
                        </div>
                        <div class="mt-2 inner-addon icon-addon">
                             <i class="fa fa-key left"></i>
                            <input name="password" type="password" class="form-control"
                                                       id="password" required placeholder="Mật khẩu...">
                            <input type="checkbox" onclick="show_passwd()">Hiện mật khẩu
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--   footer start -->
<!-- <?php include('includes/footer.html'); ?> -->
<!--   footer end -->

<!-- Scripts -->
<?php include('includes/script.html');?>

<script>
function show_passwd() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>