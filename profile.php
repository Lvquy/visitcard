<?php
    require('includes/db.php');
    include("includes/auth.php");
    include("includes/php.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.html');?>
<title>VisitCard | Profile</title>

<script src="vendor/jquery/jquery.min.js"></script>

</head>
<body >
    <!-- ***** Preloader Start ***** -->
<?php include('includes/preloader.html');?>
  <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
  <?php include('includes/menu.html');?>
  <!-- ***** Header Area End ***** -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <div class="main-banner" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="container">
            <div class="alert-header">
                <marquee scrollamount="10">
                    <p id="alert-header"></p>
                </marquee> 
            </div>
            <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            
            <!----custom menu start--->
                    <div class="custom-menu">
                        <ul >
                            <div id="ul_cus_menu">
                            <li>
                                  <i  class="bi bi-palette cha"
                                   data-bs-toggle="modal" data-bs-target="#change_theme_modal">
                                      <div class="con">Chọn theme</div>
                                  </i>
                            </li>
                            
                            <li >
                                <i class="bi bi-key-fill cha" data-bs-toggle="modal" data-bs-target="#change_pass_modal">
                                    <span class="con">Đổi mật khẩu</span>
                                </i>
                            </li>
                            <li>
                                <i class="bi bi-share cha" onmouseover="show_icon()">
                                    <span class="con">Share</span>
                                </i>
                            </li>
                            
                            <li id="cp-none-li">
                                
                                <i class="bi bi-clipboard cha " onclick="coppy()">
                                    <span class="con">Coppy link</span>
                                </i>
                            </li>
                            <li id="qr-none-li" >

                                <i class="fa fa-qrcode cha " onclick="generate_qrcode()">
                                    <span class="con">Qr code</span>
                                </i>
                            </li>
                            <li id="btn-smt-li">
                                <form method="post" action="action_update.php" enctype="multipart/form-data">
                                  <input onchange="show_btn_submit()" type="file" id="input_avatar" name="input_avatar" style="display:none" class="text-center center-block file-upload">
                                  <input type="hidden" name="id" id ="id_user" value="<?php echo $id;?>"/>
                                  <input type="hidden" name="active" id ="active" value="<?php echo $active;?>"/>
                                  <button type="submit"  name="submit" class=" btn-submit">
                                    <i class="bi bi-cloud-upload nhapnhay cha">
                                        <span class="con">Submit avata</span>
                                    </i>
                                </button>
                                </form>

                            </li>
                            <li><hr></li>
                    
                            <i class="bi bi-caret-up cha" id="i-up" onclick="i_up()">
                                <span class="con">Thu gọn</span>
                            </i>
                            </div>
                            <i class="bi bi-caret-down cha" id="i-down" style="display:none" onclick="i_down()">
                                <span class="con">Xổ ra</span>
                            </i>
                        </ul>
            </div>
            <!-- Modal change theme  -->
            <div class="modal fade" id="change_theme_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="titletop" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="titletop">Chọn chủ đề</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body theme">
                    <div class="container">
                        <div class="row">
                            <input type="hidden" 
                            id="id_theme"  value="<?php echo $top_bg_img ;?>">
                            <table  >
                                <tr >
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-1.png" onclick="change_theme(1)">
                                                <input type="radio" id="theme_1" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-2.png" onclick="change_theme(2)">
                                                <input type="radio" checked id="theme_2" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-3.png" onclick="change_theme(3)">
                                                <input type="radio" id="theme_3" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-4.png" onclick="change_theme(4)">
                                                <input type="radio" id="theme_4" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-5.png" onclick="change_theme(5)">
                                                <input type="radio" id="theme_5" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-6.png" onclick="change_theme(6)">
                                                <input type="radio" id="theme_6" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-7.png" onclick="change_theme(7)">
                                                <input type="radio" id="theme_7" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-6 mt-5">
                                            <label>
                                                <img src="static/images/theme/screen-8.png" onclick="change_theme(8)">
                                                <input type="radio"  id="theme_8" name = "theme">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <p id="alert-theme" style="color: white;"></p>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!--- end modal change theme-->
            <!----end custom menu-->
            


            <!-- modal change password content -->
            <div class="modal" id="change_pass_modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <i class="bi bi-x-circle"></i>
                        </button>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <input class="form-control mt-3" type="password" id="old_pass" name="old_pass" placeholder="Old Password">
                        <input class="form-control mt-2" type="password" id="new_pass" name="new_pass" placeholder="New Password">
                        <input type="checkbox" class="mt-2" name="show_password" id="show_password" onclick="show_pass()" value="1"> Show password 
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button class="btn btn-success" onclick="change_pass()" data-bs-dismiss="modal">Submit</button>
                        
                      </div>
                    </div>
                </div>
            </div>
            <!-- modal change password content end-->
            
            <div class="card h-100 card-left">
                <div class="card-body">
                    
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar text-center">
                                <img src="static/images/avata/<?php echo $avata;?>?<?php echo rand()?>"
                                 class=" img-circle avatar  img-thumbnail" alt="img">
                                <div class="middle text-center">
                                    <div id="avatar" style="cursor:pointer" class="text">
                                        <i class="bi bi-camera"></i>
                                        <i class="i-size">Chọn ảnh</i>
                                        <i class="i-size">160x160px</i>
                                    </div>
                                </div>
                                <span id="alert_help_submit">Nhấn nút submit kế bên để xác nhận</span>
                            </div>
                            
                            <h5 class="user-name text-center" id="j_fullname">

                                <?php echo "$fullname";?> <i id="tichxanh" class="bi bi-check-circle nhapnhay_nhe"></i>
                                
                            </h5>
                            
                            <!---Qr Code-->
                            <h3 id="qr_code" class="mt-2"></h3>
                            <h6 class="" id="qr_code_link" >smartcard.com/<span id="j_slug" style="color:blue"><?php echo $slug;?></span>
                            </h6>
                            
                        </div>
                        <div class="setting">
                            <div class="inner-addon icon-addon mb-2">
                                <i class="fa left fa-user"></i>
                                <a id="done_slug" onclick="done_slug()"  ><i class="fa fa-check right "></i></a>
                                <a id="edit_slug" onclick="edit_slug()" ><i class="fa right fa-pencil"></i></a>
                                <span id="ajax_slug"><input readonly onblur="check_unique_slug(this.value)" name="slug" id="slug"  type="text"
                                    class="form-control" value='<?php echo "$slug";?>' placeholder="Username">
                                </span>
                                <p class="f_alert" id="f_slug_alert" ></p>
                                <p class="unique_slug_alert" id="unique_slug_alert" >Đã có người sử dụng đường dẫn này, vui lòng chọn đường dẫn khác.!</p>
                            </div>
                        </div>
                        
                        <div class="about col-12 mt-2 icon-addon text-center">
                            <h5 class="text-left text-primary">Intro <i onclick="edit_intro()" id="edit_icon_intro" class="fa right fa-pencil"></i></h5>
                            <textarea onblur="ajax_submit_intro()" readonly class="text-left" name="intro" id="intro"  rows="4" ><?php echo $intro;?>
                            </textarea>
                            <p class="f_alert" id="intro_alert" >Success!</p>
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100 card-right">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 class="mb-2">Personal Details <i class="badge badge-primary">Total visitor count: <?php echo $visit; ?></i></h4>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa left fa-user"></i>
                                        <a id="done_fullname" onclick="done_fullname()"  ><i class="fa fa-check right "></i></a>
                                        <a id="edit_fullname" onclick="edit_fullname()" ><i class="fa right fa-pencil"></i></a>
                                        <span id="ajax_fullname"><input readonly name="fullname" value="<?php echo $fullname;?>"
                                         type="text" class="form-control" id="fullname" placeholder="Enter full name"></span>
                                        <p class="f_alert" id="f_name_alert" >Success!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-envelope-o left "></i>
                                        <i class="fa fa-check right right-email" id="icon-confirmed" aria-hidden="true" title="Email đã xác nhận!"></i> 
                                        <i class="fa fa-exclamation-triangle right-email cha" id="warning-email" onclick="send_mail()">
                                            <span class="con1">Email chưa kích hoạt sẽ không thể reset mật khẩu khi quên.</span>
                                        </i>
                                        <a id="done_email" onclick="done_email()"  ><i class="fa fa-check right "></i></a>
                                        <a id="edit_email" onclick="edit_email()" ><i class="fa right fa-pencil"></i></a>
                                        
                                            <input readonly name="email" type="email" value="<?php echo $email;?>"
                                            class="form-control" id="email" placeholder="Enter email">
                                            <input type="hidden" name="status_email" id="status_email" 
                                            value="<?php echo $status_email;?>">  

                                                <i class="fa fa-circle-o left mt-2" aria-hidden="true" id="icon-confirm-box-left">
                                                </i>
                                                <a id="confirm_email" onclick="confirm_email()">
                                                    <i class="fa fa-paper-plane right mt-2" id="icon-confirm-box-right"></i>
                                                </a>
                                                <input style="display: none;" type="text" name="box_comfirm_email" class="form-control mt-2" id="box_confirm_email" placeholder="Nhập mã xác nhận ở email:">
                                        
                                        <p class="f_alert" id="f_email_alert" >Success!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-mobile left "></i>
                                        <a id="done_mobile" onclick="done_mobile()"  ><i class="fa fa-check right "></i></a>
                                        <a id="edit_mobile" onclick="edit_mobile()" ><i class="fa right fa-pencil"></i></a>
                                        <span id="ajax_mobile"><input onblur="check_unique_mobile()" readonly name="mobile" type="phone" class="form-control"
                                        id="mobile" value="<?php echo $mobile;?>" placeholder="Enter phone number"></span>
                                        <p class="f_alert" id="f_mobile_alert" >Success!</p>
                                        <p class="unique_mobile_alert" id="unique_mobile_alert" >
                                            Số điện thoại này đã có người dùng, vui lòng kiểm tra lại!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-map-marker left "></i>

                                        <a id="done_address" onclick="done_address()">
                                            <i class="fa fa-check right "></i>
                                        </a>
                                        <a id="edit_address" onclick="edit_address()" ><i class="fa right fa-pencil"></i></a>
                                        <span id="ajax_address"><input name="address" readonly type="text" value="<?php echo $address;?>"
                                        class="form-control" id="address" placeholder="Enter Address"></span>
                                        <p class="f_alert" id="f_address_alert" >Success!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters mt-3">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 class="mb-2 ">Tài khoản ngân hàng</h4>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-university left" aria-hidden="true"></i>
                                        <a style='display: none;' id="done_bank" 
                                        onclick="
                                        done_bank('bank_name',null,null,null);
                                        readonly_true('bank_name');
                                        show_id('edit_bank');
                                        hide_id('done_bank');
                                        
                                        $('#f_bank_alert').fadeIn(1000);
                                        $('#f_bank_alert').fadeOut(3000);
                                        ">
                                            <i class="fa fa-check right "></i>
                                        </a>
                                        <a id="edit_bank"
                                         onclick="
                                         readonly_false('bank_name');
                                         hide_id('edit_bank');
                                         show_id('done_bank');">
                                            <i class="fa right fa-pencil"></i>
                                        </a>
                                        <span id="ajax_bank"><input readonly name="bank_name" type="text" class="form-control"
                                        id="bank_name" value="<?php echo $bank_name?>" placeholder="Tên ngân hàng"></span>
                                        <p class="f_alert" id="f_bank_alert" >Success!</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-code-fork left" aria-hidden="true"></i>
                                        <a style='display: none;' id="done_bank_sub" 
                                        onclick="
                                        done_bank(null,'bank_name_sub',null,null);
                                        hide_id('done_bank_sub');
                                        show_id('edit_bank_sub');
                                        readonly_true('bank_name_sub');
                                        $('#f_bank_sub_alert').fadeIn(1000);
                                        $('#f_bank_sub_alert').fadeOut(3000);">
                                        <i class="fa fa-check right "></i></a>
                                        <a id="edit_bank_sub" 
                                        onclick="
                                        hide_id('edit_bank_sub');
                                        show_id('done_bank_sub');
                                        readonly_false('bank_name_sub');
                                        ">
                                        <i class="fa right fa-pencil"></i></a>
                                        <span id="ajax_bank_sub"><input readonly name="bank_name_sub" type="text" class="form-control"
                                        id="bank_name_sub" value="<?php echo $bank_sub?>" placeholder="Chi nhánh"></span>
                                        <p class="f_alert" id="f_bank_sub_alert" >Success!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-credit-card left" aria-hidden="true"></i>
                                        <a style="display: none;" id="done_bank_num" 
                                        onclick="
                                        done_bank(null,null,'bank_num',null);
                                        show_id('edit_bank_num');
                                        hide_id('done_bank_num');
                                        readonly_true('bank_num');
                                        $('#f_bank_num_alert').fadeIn(1000);
                                        $('#f_bank_num_alert').fadeOut(3000);">
                                        <i class="fa fa-check right "></i></a>
                                        <a id="edit_bank_num" 
                                        onclick="
                                        hide_id('edit_bank_num');
                                        show_id('done_bank_num');
                                        readonly_false('bank_num');
                                        ">
                                        <i class="fa right fa-pencil"></i></a>
                                        <span id="ajax_bank_num"><input readonly name="bank_num" type="text" class="form-control"
                                        id="bank_num" value="<?php echo $bank_num?>" placeholder="Số tài khoản"></span>
                                        <p class="f_alert" id="f_bank_num_alert" >Success!</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group mt-3">
                                    <div class="inner-addon icon-addon">
                                        <i class="fa fa-user left" aria-hidden="true"></i>
                                        <a style="display: none;" id="done_bank_user" 
                                        onclick="
                                        done_bank(null,null,null,'bank_user');
                                        show_id('edit_bank_user');
                                        hide_id('done_bank_user');
                                        readonly_true('bank_user');
                                        $('#f_bank_user_alert').fadeIn(1000);
                                        $('#f_bank_user_alert').fadeOut(3000);">
                                        
                                        <i class="fa fa-check right "></i></a>
                                        <a id="edit_bank_user" 
                                        onclick="
                                        hide_id('edit_bank_user');
                                        show_id('done_bank_user');
                                        readonly_false('bank_user');
                                        ">
                                        <i class="fa right fa-pencil"></i></a>
                                        <span id="ajax_bank_user"><input readonly name="bank_user" type="text" class="form-control"
                                        id="bank_user" value="<?php echo $bank_user?>" placeholder="Chủ tài khoản"></span>
                                        <p class="f_alert" id="f_bank_user_alert" >Success!</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row gutters mt-2">
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 class="mb-2 title-cus">Social Link</h4>
                            </div>
                            <div style="overflow-x:auto;">
                                <table class="table  table-responsive">
                                    
                                    <tbody id="load_social">
                                    </tbody>
                                </table>
                            </div>
                            <!------- modal social------>
                            <div class="col-12">
                            <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#social_modal">
                                  Add Social
                                </button>
                            </div>
                                <!-- The Modal -->
                                <div class="modal" id="social_modal">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <table class="table table-hover table-responsive" id="modal">
                                        <tr>
                                            <td >
                                                <img id="facebook" onclick = "add_social('Facebook')" 
                                                src="static/images/social_icon/Facebook.svg" width="100" height="100" title="Facebook">
                                            </td>
                                            <td>
                                                <img id="zalo" onclick = "add_social('Zalo')" 
                                                src="static/images/social_icon/Zalo.svg" width="100" height="100" title="Zalo">
                                            </td>
                                            <td>
                                                <img id="youtube" onclick = "add_social('Youtube')" src="static/images/social_icon/Youtube.svg" width="100" height="100" title="Youtube">
                                            </td>
                                            <td>
                                                <img id="tiktok" onclick = "add_social('Tiktok')" src="static/images/social_icon/Tiktok.svg" width="100" height="100" title="Tiktok">
                                            </td>
                                            <td>
                                                <img id="momo" onclick = "add_social('Momo')" src="static/images/social_icon/Momo.svg" width="100" height="100" title="Momo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img id="linkedin" onclick = "add_social('Linkedin')" src="static/images/social_icon/Linkedin.svg" width="100" height="100" title="Linkedin">
                                            </td>
                                            <td>
                                                <img id="instagram" onclick = "add_social('Instagram')" src="static/images/social_icon/Instagram.svg" width="100" height="100"title="Instagram">
                                            </td>
                                            <td>
                                                <img id="github" onclick = "add_social('Github')" src="static/images/social_icon/Github.svg" width="100" height="100" title="Github">
                                            </td>
                                            <td>
                                                <img id="website" onclick = "add_social('Website')" src="static/images/social_icon/Website.svg" width="100" height="100" title="Website">
                                            </td>
                                            <td>
                                                <img id="lazada" onclick = "add_social('Lazada')" src="static/images/social_icon/Lazada.svg" width="100" height="100" title="Lazada">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img id="skype" onclick = "add_social('Skype')" src="static/images/social_icon/Skype.svg" width="100" height="100"title="Skype">
                                            </td>
                                            <td>
                                                <img id="twitter" onclick = "add_social('Twitter')" src="static/images/social_icon/Twitter.svg" width="100" height="100"title="Twitter">
                                            </td>
                                            <td>
                                                <img id="google-plus" onclick = "add_social('Google plus')" src="static/images/social_icon/Google plus.svg" width="100" height="100"title="G+">
                                            </td>
                                            <td>
                                                <img id="whatsapp" onclick = "add_social('Whatsapp')" src="static/images/social_icon/Whatsapp.svg" width="100" height="100"title="Whatsapp">
                                            </td>
                                            <td>
                                                <img id="shopee" onclick = "add_social('Shopee')" src="static/images/social_icon/Shopee.svg" width="100" height="100"title="Shopee">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img id="wechat" onclick = "add_social('Wechat')" src="static/images/social_icon/Wechat.svg" width="100" height="100"title="Wechat">
                                            </td>
                                            <td>
                                                <img id="viber" onclick = "add_social('Viber')" src="static/images/social_icon/Viber.svg" width="100" height="100"title="Viber">
                                            </td>
                                            <td>
                                                <img id="line" onclick = "add_social('Line')" src="static/images/social_icon/Line.svg" width="100" height="100"title="Line">
                                            </td>
                                            <td>
                                                <img id="telegram" onclick = "add_social('Telegram')" src="static/images/social_icon/Telegram.svg" width="100" height="100"title="Telegram">
                                            </td>
                                            <td>
                                                <img id="sendo" onclick = "add_social('Sendo')" src="static/images/social_icon/Sendo.svg" width="100" height="100"title="Sendo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img id="tiki" onclick = "add_social('Tiki')" src="static/images/social_icon/Tiki.svg" width="100" height="100"title="Tiki">
                                            </td>
                                            <td>
                                                <img id="mobile" onclick = "add_social('Mobile')" src="static/images/social_icon/Mobile.svg" width="100" height="100"title="Mobile">
                                            </td>
                                            <td>
                                                <img id="phone" onclick = "add_social('Phone')" src="static/images/social_icon/Phone.svg" width="100" height="100"title="Phone">
                                            </td>
                                            <td>
                                                <img id="link" onclick = "add_social('Link')" src="static/images/social_icon/Link.svg" width="100px" height="100px"title="Link">
                                            </td>
                                            <td>
                                                <img id="pinterest" onclick = "add_social('Pinterest')" src="static/images/social_icon/Pinterest.svg" width="100px" height="100px"title="Pinterest">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                             
                                            </td>
                                            <td>
                                               
                                            </td>
                                        </tr>
                                    
                                        </table>
                                      </div>
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <p id="tr_alert" style="color:white;"></p>
                                        <a href="#">Add more ....</a> |
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                            <!-------modal end------>
                        </div>
                        <div class="row gutters">
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 class="mb-2 ">My Skill</h4>
                            </div>
                            <div class="container" id="load_skill">
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#skill_modal">
                                  Add Skill
                                </button>
                            </div>
                            <!-- The Modal -->
                                <div class="modal" id="skill_modal">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <form  id="form_skill">
                                            <div class="col-12 mt-2">
                                                <input class="form-control" id="skill_name" type="text" placeholder="Skill Name">
                                            </div>
                                            <div class="col-12 text-center">
                                                Level: <input class="mt-4" id="skill_value" value="50" type="range" max="100" min="0" oninput='this.nextElementSibling.value = this.value' placeholder="Skill Level">
                                                <output>50</output>%
                                                
                                            </div>
                                        </form>
                                      </div>

                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <p id="alert_skill_modal" style="color:white;"></p>
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" onclick="add_skill()" class="btn btn-success">Add</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                            <!-- coins -->
                        <div class="row gutters">
                            <div class="mt-2 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 class="mb-2 ">Coins</h4>
                            </div>
                            <div style="overflow-x:auto;">
                                <table class="table  table-responsive">
                                    <tbody id="load_coin">
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="col-12">
                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#coin_modal">
                                  Add Coin
                                </button>
                            </div>
                                
                           
                            <!-- The Modal -->
                                <div class="modal" id="coin_modal">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <table class="table table-hover table-responsive" >
                                            <tr>
                                                <td>
                                                    <img id="bitcoin" onclick = "add_coin('Bitcoin')" 
                                                src="static/images/coins/Bitcoin.svg" width="100" height="100" title="Bitcoin">
                                                </td>
                                                <td>
                                                    <img id="dogecoin" onclick = "add_coin('Dogecoin')" 
                                                src="static/images/coins/Dogecoin.svg" width="100" height="100" title="Dogecoin">
                                                </td>
                                                <td>
                                                    <img id="xrp" onclick = "add_coin('Xrp')" 
                                                src="static/images/coins/Xrp.svg" width="100" 
                                                height="100" title="Xrp">
                                                </td>
                                                <td>
                                                    <img id="cardano" onclick = "add_coin('Cardano')" 
                                                src="static/images/coins/Cardano.svg" width="100" height="100" title="Cardano">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img id="ethereum" onclick = "add_coin('Ethereum')" 
                                                src="static/images/coins/Ethereum.svg" width="100" height="100" title="Ethereum">
                                                </td>
                                                <td>
                                                    <img id="pinetwork" 
                                                    onclick = "add_coin('PiNetwork')"
                                                src="static/images/coins/PiNetwork.svg" width="100" height="100" title="PiNetwork">
                                                </td>
                                                <td>.</td>
                                                <td>.</td>
                                            </tr>
                                            <tr>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                                <td>.</td>
                                            </tr>
                                        
                                        </table>
                                      </div>

                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <p id="alert_coin_modal" style="color:white;"></p>
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                        </div>
                            <!-- coins -->
                            <!------button------->
                        </div>
                        <!-- test -->
                        <div class="row align-items-center" id="active_btn">
                          <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                            <input type="text" name="code" class="form-control" id="code" aria-describedby="help" placeholder="Nhập mã kích hoạt">
                            <span id="alert-active"></span>
                          </div>

                          <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                            <span id="help" class="form-text">
                              <button  onclick="check_code()" class="btn btn-success ">Kích hoạt ngay</button>
                            </span>
                            
                          </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-sm-12 mt-2" id="try_btn">
                            <a href="#" onclick="tryfree()" class="btn btn-success mt-2">Dùng thử miễn phí</a>
                        </div>
                
                        <!-- test -->
                    </div>
                </div>
            </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!--   footer start -->
<!-- <?php include('includes/footer.html'); ?> -->
<!--   footer end -->

  <!-- Scripts -->
  <script src="static/js/profile.js"></script>
<?php include('includes/script.html');?>
</html>