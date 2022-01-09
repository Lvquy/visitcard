<?php
    require('includes/db.php');
	include("includes/php.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.html');?>
<title>VnCard | Register</title>
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
                            <h1 id='login1'>ĐĂNG KÝ</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div id="register">
                    <div class="form-group col-xs-6">
                        <div class="inner-addon icon-addon">
                            <i class="fa fa-user left" aria-hidden="true"></i>
                            <input type="text" onchange="check_username(this.value)" 
                             pattern="[a-z0-9]{3,25}"
                             id="username" class="form-control" required
                             placeholder="ID đăng nhập..." />
                        </div>
                        <div class="inner-addon icon-addon mt-2">
                            <i class="fa fa-user left"></i>
                            <input  type="text"
                             class="form-control" id="fullname" required
                             placeholder="Họ tên...">
                        </div>
                        <div class="mt-2 inner-addon icon-addon">
                             <i class="fa fa-key left"></i>
                            <input onchange="check_pass(this.value)" type="password" class="form-control"
                                                       id="password" required placeholder="Mật khẩu...">
                            <input class="mt-2" type="checkbox" onclick="show_passwd()" id="showpass">
                            <label for="showpass">Hiện mật khẩu</label>
                            
                        </div>
                        <button onclick="submit_register()" class="btn btn-primary mt-2 text-center">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var REGISTER = false;
    function check_username(username) {
        
        if ((username.length < 3) || (username.length > 25) ) {
            REGISTER = false;
            //
            Toastify({
              text: "username độ dài từ 3-25 kí tự",
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
        else{
            var slug = username;
            $.post("check_unique_slug.php",{slug:slug},function(data){
                console.log(data)
                if (data == 0){
                    // ok
                    REGISTER = true;
                }
                if(data == 2){
                    //chua ki tu dac biet
                    //
                    Toastify({
                      text: "username không được chứa kí tự đặc biệt",
                      duration: 3000,
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
                if(data == 1){
                    // trung username
                    REGISTER = false;
                    
                    //
                    Toastify({
                      text: "username này đã có người sử dụng rồi",
                      duration: 3000,
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
    }
    function check_pass(password){
        if (password.length < 6) {
            REGISTER = false
            //
                Toastify({
                  text: "Mật khẩu có 6 kí tự trở lên",
                  duration: 3000,
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
        else{
            REGISTER = true
        }
    }
    function submit_register() {
        
        var username = $("#username").val()
        var fullname = $("#fullname").val()
        var password = $("#password").val()
        check_pass(password)
        check_username(username)

        if (REGISTER == true){

            $.post("action_reg.php",{username:username,fullname:fullname,password:password},function(data){
                
                if (data ==0){
                    //
                    Toastify({
                      text: "ID đã có người sử dụng",
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
                if (data ==1){

                    //
                    Toastify({
                      text: "Đăng kí thành công!",
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
                    setTimeout(function() {window.location.replace("login.php");}, 2000);
                }
            })
        }
        
    }
</script>

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