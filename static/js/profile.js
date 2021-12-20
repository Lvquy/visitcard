

//change theme
function change_theme(id_theme){
    var id_user = $("#id_user").val();
    var active = $("#active").val()
    $.post("ajax_process/edit.php",{id_theme:id_theme,id_user:id_user,active:active},function(data){
        if (data ==1) {
            //thanh cong
            
            $("#alert-theme").html("Thành công").fadeIn(1)
            $("#alert-theme").html("Thành công").fadeOut(5000)
        }else{
            //can kich hoat
            $("#alert-theme").html("Cần kích hoạt").css({"color":"red"}).fadeIn(1)
            $("#alert-theme").html("Cần kích hoạt").css({"color":"red"}).fadeOut(5000)
        }
    });
}
 // cuộn icon custom-menu
function i_up() {
    hide_id("ul_cus_menu");
    show_id("i-down");
}
function i_down() {
    show_id("ul_cus_menu");
    hide_id("i-down");
}
// cuộn icon custom-menu end
//show pass

function show_pass() {
  var old_pass = document.getElementById("old_pass");
  var new_pass = document.getElementById("new_pass");

  if (old_pass.type === "password") {
    old_pass.type = "text";
  } else {
    old_pass.type = "password";
  }

  if (new_pass.type === "password") {
    new_pass.type = "text";
  } else {
    new_pass.type = "password";
  }

};
// show pass end
//change pass
function change_pass() {
    var id_user = $("#id_user").val();
    var old_pass = $("#old_pass").val();
    var new_pass = $("#new_pass").val();
    console.log(id_user,old_pass,new_pass);
    $.post("ajax_process/edit.php",{id_user:id_user,old_pass:old_pass,new_pass:new_pass},function(data){
            //return alert
            if (data ==1) {
                location.reload();
                alert('Đổi mật khẩu thành công!');
                
            }
            else{
                
                location.reload();
                alert('Error!');
            }
    });
    
};
//change pass end
//show icon share
function show_icon(){
    show_id("qr-none-li");
    show_id("cp-none-li");
}
function show_btn_submit() {

    show_id("ul_cus_menu");
    hide_id("i-down");
    show_id("btn-smt-li");
    show_id("alert_help_submit");

}
function generate_qrcode(){
    var sample = $('#slug').val();
    sample = 'localhost/code/2/'+sample;
    $.post("qr_code.php",{sample:sample},function(data){
        $("#qr_code").html(data);
        
    })
}
//coppy
function coppy() {
    var range = document.createRange();
    range.selectNode(document.getElementById("qr_code_link"));
    window.getSelection().removeAllRanges(); // clear current selection
    window.getSelection().addRange(range); // to select text
    document.execCommand("copy");
    window.getSelection().removeAllRanges();// to deselect
    alert("coppied");
}
function hide_id(id_hidden){
    document.getElementById(id_hidden).style.display = "none";
};
function show_id(id_show){
    document.getElementById(id_show).style.display = "inline-block";
};
function readonly_true(id_readonly){
    document.getElementById(id_readonly).readOnly = true;
};
function readonly_false(id_readonly){
    document.getElementById(id_readonly).readOnly = false;
};
// check_unique_slug
function check_unique_slug(slug) {
    var id = $("#id_user").val();
    $.post("check_unique_slug.php",{slug:slug,id:id},function(data) {
        
        if (data ==1){
            //trung
            document.getElementById("slug").style.color = "red";
            show_id('unique_slug_alert');
            setTimeout(function() {
                hide_id('unique_slug_alert');
            }, 10000)
        }
        else{
            // hop le
            document.getElementById("slug").style.color = "white";
            hide_id('unique_slug_alert');
        }    
    });
}
// check_unique_slug end
function done_bank(id_bank_name,id_bank_sub,id_bank_num,id_bank_user){
    if(id_bank_name){
        console.log('dang sua id bank name');
        var bank_name = $("#"+id_bank_name).val();
        var id_user = $("#id_user").val();
        $.post("ajax_process/edit.php",{id_user:id_user,bank_name:bank_name},function(data){
            //
            
        });
    };
    if(id_bank_sub){
        
        var bank_sub =$("#"+id_bank_sub).val();
        var id_user = $("#id_user").val();
        $.post("ajax_process/edit.php",{id_user:id_user,bank_sub:bank_sub},function(data){
            //
            
        });


    };
    if(id_bank_num){
        console.log('dang sua bank num');
        var bank_num =$("#"+id_bank_num).val();
        var id_user = $("#id_user").val();
        $.post("ajax_process/edit.php",{id_user:id_user,bank_num:bank_num},function(data){
            //
           
        });
    }
    if(id_bank_user){
        console.log('dang sua id bank user');
        var bank_user =$("#"+id_bank_user).val();
        var id_user = $("#id_user").val();
        $.post("ajax_process/edit.php",{id_user:id_user,bank_user:bank_user},function(data){
            //
            
        });
    };
    
}
//send mail
function send_mail() {
    // alert('hi'); -> ok
    var id_user = $("#id_user").val();
    var fullname = $("#fullname").val();
    var email_value = $("#email").val();
    hide_id("warning-email");
    hide_id("f_email_alert");
    // console.log(id_user, email_value); -> ok
    $.post("action_sendmail.php",{fullname:fullname,id_user:id_user,email_value:email_value},function(data){
            if (data ==1) {
                //true
                $("#f_email_alert").html("Đã gửi mã!, kiểm tra email lấy code để <a onclick='show_box_confirm_email()' href='#'>xác nhận!</a> <br>chưa nhận được mã? <a href='#' onclick='send_mail()'> Gửi lại</a>").fadeIn(1000);
            }
            else{
                //false
                alert(data);
            }

    });

}
//send mail
//show box confirm email

function show_box_confirm_email(){
    show_id("box_confirm_email");
    show_id("confirm_email");
    show_id("icon-confirm-box-left");
    show_id("icon-confirm-box-right");

}
//show box confirm email end
// confirm email
function confirm_email() {
    var id_user = $("#id_user").val();
    var active_code = $("#box_confirm_email").val();
    var status_email = $("#status_email").val();
    console.log(id_user,active_code,status_email);
    $.post("ajax_process/edit.php",{id_user:id_user,active_code:active_code,status_email:status_email},function(data){
        //
        if (data==1) {
            //true
            console.log('true');
            show_id("icon-confirmed");
            hide_id("box_confirm_email");
            hide_id("confirm_email");
            hide_id("icon-confirm-box-left");
            hide_id("icon-confirm-box-right");
            $("#f_email_alert").html("Thành công!").fadeIn(1000);
            $("#f_email_alert").html("Thành công!").fadeOut(4000);
        }
        else{
            //false
            console.log('false');
            $("#f_email_alert").html("Lỗi, vui lòng thử lại!").fadeIn(1000);
            $("#f_email_alert").html("Lỗi, vui lòng thử lại!").fadeOut(4000);
            }
    })     
}
// confirm email end
//switch active
function switch_active(id_social){
    var id_val_active = id_social+"-active";
    val_active = document.getElementById(id_val_active).value;
    var id_social_checbox = id_social;
    if (val_active == 0){
        val_active = 1;
    }
    else{val_active=0};
    $.post("ajax_process/edit.php",{id_social_checbox:id_social_checbox,val_active:val_active},function(data){
        //
        get_social();
    });
};
//switch active
//add social function
function add_social(id_social){
    var id_user = $("#id_user").val();
    var active_user = $("#active").val();
    $.post("add_social.php",{id_user:id_user,id_social:id_social,active_user:active_user},function(data){
        if (data == 1){
            get_social();
            $("#tr_alert").html("Đã thêm: "+id_social).fadeIn(1000);
            $("#tr_alert").html("Đã thêm: "+id_social).fadeOut(4000);
        }
        else if (data == 0) {
            $("#tr_alert").html("<p style='color:red'>Cần kích hoạt để sử dụng...!</p>").fadeIn(1000);
            $("#tr_alert").html("<p style='color:red'>Cần kích hoạt để sử dụng...!</p>").fadeOut(4000);
        }
        else{
            $("#tr_alert").html("<p style='color:red'>Lỗi không thêm được</p>").fadeIn(1000);
            $("#tr_alert").html("<p style='color:red'>Lỗi không thêm được</p>").fadeOut(4000);
        }

    });
}; 

//undo del
function undo_del(id_social) {
    var id_icon_del = id_social+"-del"
    var id_confirm_del = id_social+"-confirm-del"
    var id_icon_undo = id_social+"-undo"
    show_id(id_icon_del)
    hide_id(id_confirm_del)
    hide_id(id_icon_undo)
}
//del 
function del_social_1(id_social){
    var id_confirm_del = id_social+"-confirm-del"
    var id_icon_del = id_social+"-del"
    var id_icon_undo = id_social+"-undo"
    show_id(id_confirm_del)
    show_id(id_icon_undo)
    hide_id(id_icon_del)
}
//del social function
function del_social(id_social){
    $.post("action_del.php",{id_social:id_social},function(data){
    get_social()
    })
};
//end del social

//edit coin
function edit_coin(id_coin) {
    var id_name_coin = id_coin+"-name_coin"
    var id_wallet = id_coin+"-wallet";
    var id_edit_icon = id_coin+"-edit";
    var id_done_icon = id_coin+"-done";
    readonly_false(id_name_coin);
    readonly_false(id_wallet);
    hide_id(id_edit_icon);
    show_id(id_done_icon);
}
//done coin
function done_coin(id_coin) {

    var id_name_coin = id_coin+"-name_coin"
    var id_wallet = id_coin+"-wallet";
    var id_edit_icon = id_coin+"-edit";
    var id_done_icon = id_coin+"-done";
    readonly_true(id_name_coin)
    readonly_true(id_wallet)
    hide_id(id_done_icon)
    show_id(id_edit_icon)
    var name_coin = $("#"+id_name_coin).val()
    var wallet_coin = $("#"+id_wallet).val()
    $.post("ajax_process/edit.php",{id_coin:id_coin,name_coin:name_coin,wallet_coin:wallet_coin},function(data){
        //
    })
}
function undo_del_coin(id_coin) {
    var id_confirm_del = id_coin+"-confirm"
    var id_icon_del = id_coin+"-del"
    var id_icon_undo = id_coin+"-undo"
    show_id(id_icon_del)
    hide_id(id_confirm_del)
    hide_id(id_icon_undo)
}
function del_coin_1(id_coin) {
    var id_confirm_del = id_coin+"-confirm"
    var id_icon_del = id_coin+"-del"
    var id_icon_undo = id_coin+"-undo"
    show_id(id_confirm_del)
    show_id(id_icon_undo)
    hide_id(id_icon_del)
    
}
//del coin delete coin
function del_coin(id_coin){
    $.post("action_del.php",{id_coin:id_coin},function(data){
        get_coin()
    })
}
//function edit social
function edit_social(id_social) {
    var id_btn_edit = id_social+"-edit";
    var id_btn_done = id_social+"-done";
    var id_name_social = id_social+"-name_social";
    
    readonly_false(id_social);
    readonly_false(id_name_social);
    hide_id(id_btn_edit);
    show_id(id_btn_done);

};
//function edit social end
//function done social
function done_social(id_social) {
    var social_link = document.getElementById(id_social).value;
    var id_btn_edit = id_social+"-edit"
    var id_btn_done = id_social+"-done"
    var id_name_social = id_social+"-name_social";
    var social_name = $("#"+id_name_social).val();
    console.log(social_name)
    $.post("ajax_process/edit.php",{id_social:id_social,social_link:social_link,social_name:social_name},function(data){
        if (data==1){
            //ok xxx
            var id_s_alert = "alert."+id_social;
            show_id(id_s_alert);
            hide_id(id_btn_done);
            show_id(id_btn_edit);
            setTimeout(function() {
                hide_id(id_s_alert);
            }, 5000)
            readonly_true(id_social);
            readonly_true(id_name_social);
        };
        if (data == 0){
            //loi
        }
        else{
            //loi khong xacs dinh
        }
    });
}
//function done social end
//del skill
function del_skill_1(id_skill){
    var id_icon_del = id_skill+"-del"
    var id_icon_undo = id_skill+"-undo"
    var id_icon_confirm = id_skill+"-confirm"
    show_id(id_icon_undo)
    show_id(id_icon_confirm)
    hide_id(id_icon_del)
} 
//undo del skill
function undo_del_skill(id_skill) {
    var id_icon_del = id_skill+"-del"
    var id_icon_undo = id_skill+"-undo"
    var id_icon_confirm = id_skill+"-confirm"
    hide_id(id_icon_undo)
    hide_id(id_icon_confirm)
    show_id(id_icon_del)
}
//del skill
function del_skill(id_skill) {
    $.post("action_del.php",{id_skill:id_skill},function(data){
    get_skill();
    });
   }
//del skill end
//update skill
function update_skill(id_skill,skill_value) {
    var a = document.getElementById(id_skill);

    if (skill_value <20){
        var color = "#E5BFBF";
    };
    if (skill_value > 20 && skill_value <= 40){
        var color = "#F56ED7";
    };
    if (skill_value > 40 && skill_value <= 60){
        var color = "#C906A2";
    };
    if (skill_value > 60 && skill_value <= 80){
        var color = "#F16E16";
    };
    if (skill_value > 80 && skill_value <= 100){
        var color = "#2AE112";
    };

    a.style.background = color;
    
    $.post("update_skill.php",{id_skill:id_skill,skill_value:skill_value,color:color},function(data){
        if (data == 1){
            //update thanh cong
        }
        else{
            //update that bai
        }

    });
}
//update skill end
//add skill
function add_skill(){
    var id_user = $("#id_user").val();
    var active_user = $("#active").val();
    var skill_name = $("#skill_name").val();
    var skill_value = $("#skill_value").val();

    if (skill_value <20){
        var color = "#E5BFBF";
    };
    if (skill_value > 20 && skill_value <= 40){
        var color = "#F56ED7";
    };
    if (skill_value > 40 && skill_value <= 60){
        var color = "#C906A2";
    };
    if (skill_value > 60 && skill_value <= 80){
        var color = "#F16E16";
    };
    if (skill_value > 80 && skill_value <= 100){
        var color = "#2AE112";
    };
    
    $.post("add_skill.php",{color:color,id_user:id_user,active_user:active_user,skill_name:skill_name,skill_value:skill_value},function(data){
            var alert = $("#alert_skill_modal");
            if (data == 1){
                //thanhf cong
                get_skill();
                document.getElementById("form_skill").reset();
                alert.html("Đã thêm...!").fadeIn(1000);
                alert.html("Đã thêm...!").fadeOut(4000);

            }
            else if (data == 2){
                //can kich hoat
                alert.css("color","red");
                alert.html("Cần kích hoạt để dùng tính năng...!").fadeIn(1000);
                alert.html("Cần kích hoạt để dùng tính năng...!").fadeOut(4000);
            }
            else{
                alert.css("color","red");
                alert.html("Lỗi khi thêm...!").fadeIn(1000);
                alert.html("Lỗi khi thêm...!").fadeOut(4000);
            } 
    });
}; 
//check code
function check_code(){
    var code = $("#code").val();
    var id = $("#id_user").val();
    $.post("check_code.php",{code:code,id:id},function(code){
         if(code == 1){
            $("#alert-active").html("Kích hoạt thành công").fadeIn(10)
            $("#alert-active").html("Kích hoạt thành công").fadeOut(6000)
            get_social();
            console.log(code)
            location.reload();

         }
         else{
            $("#alert-active").html("Lỗi, không thể kích hoạt được!").fadeIn(10)
            $("#alert-active").html("Lỗi, không thể kích hoạt được!").fadeOut(6000)
            get_social();
            console.log(code)
         };
    });
};
//try
function tryfree(){
    var id = $("#id_user").val();
    $.post("action_try.php",{id:id},function(data){
        if (data == 1){
            
            location.reload();
            alert("Đã kích hoạt dùng thử");
        }
        else{
            alert("Bạn đang dùng thử rồi");
        }
    });
}
function add_coin(coin_name) {
    var id_user = $("#id_user").val();
    var active_user = $("#active").val();
    $.post("add_coin.php",{id_user:id_user,active_user:active_user,coin_name:coin_name},function(data){
        //
        if (data == 1) {
            //thanh cong
            var alert = $("#alert_coin_modal")
            alert.html("Đã thêm: "+coin_name).fadeIn(1000)
            alert.html("Đã thêm: "+coin_name).fadeOut(3000)
        };
        if (data == 2) {
            //can kich hoat
            var alert = $("#alert_coin_modal")
            alert.html("Cần kích hoạt").css({"color":"red"}).fadeIn(1000)
            alert.html("Cần kích hoạt").css({"color":"red"}).fadeOut(5000)
            
        };
        if (data == 0) {
            //loi khi them
            console.log('loi khi them')
        }
        get_coin()
        
        
    });
}
//ajax  run function when reload end page auto
$( document ).ready(function() {

    get_social();
    get_skill();
    get_coin();
    var status_email = $("#status_email").val();
    if (status_email == 'send') {
        hide_id("warning-email");
        $("#f_email_alert").html("Đã gửi mã!, kiểm tra email lấy code để <a onclick='show_box_confirm_email()' href='#'>xác nhận!</a> <br>chưa nhận được mã? <a href='#' onclick='send_mail()'> Gửi lại</a>");
        show_id("f_email_alert");
    }
    if ( status_email == 'confirmed'){
        hide_id("warning-email");
        show_id("icon-confirmed");
        console.log('confirmed...');
    }

    var active = $("#active").val();
    if (active == 2){
        document.getElementById("j_fullname").style.fontWeight  = "bold";
        hide_id("try_btn");
        hide_id("active_btn");
        show_id("tichxanh");
        hide_id('edit_slug');
        hide_id('btn_order');
        $("#alert-header").html("Hi, Cảm ơn bạn đã tin dùng SmartCard!");

    }else if (active == 1){
        hide_id("try_btn");
        $("#alert-header").html("Hi, Sau khi kích hoạt, bạn sẽ được gỡ bỏ hạn chế tài khoản.");
    }
    else{
        $("#alert-header").html("Hi, Bạn có thể kích hoạt dùng thử bằng nút dưới để trải nghiệm miễn phí, tuy nhiên một số tính năng sẽ bị hạn chế.");
        hide_id("tichxanh");
    }
    //load id theme
    var theme = $("#id_theme").val();
    if (theme == ''){
        $("#theme_1").prop('checked', true);
        console.log('theme 1');
    };
    if (theme == 'cover-2.jpg'){
        $("#theme_2").prop('checked', true);
        console.log('theme 2');
    };
    if (theme == 'cover-3.jpg'){
        $("#theme_3").prop('checked', true);
        console.log('theme 3');
    };
    if (theme == 'cover-4.jpg'){
        $("#theme_4").attr( 'checked', true );
    };
    if (theme == 'cover-5.jpg'){
        $("#theme_5").attr( 'checked', true );
    };
    if (theme == 'cover-6.jpg'){
        $("#theme_6").attr( 'checked', true );
    };
    if (theme == 'cover-7.jpg'){
        $("#theme_7").attr( 'checked', true );
    };
    if (theme == 'cover-8.jpg'){
        $("#theme_8").attr( 'checked', true );
    };

});
//end auto load when reloaded page

//get coin
function get_coin() {
    var id = $("#id_user").val();
    $.post("action_coin.php",{id:id},function(data){
        $("#load_coin").html(data);
    });
}
function get_social(){
    var id = $("#id_user").val();
    $.post("action_social.php",{id:id},function(data){
        $("#load_social").html(data);
    });
};
// get skill
function get_skill(){
    var id = $("#id_user").val();
    $.post("action_skill.php",{id:id},function(data){
        $("#load_skill").html(data);
    });
};
// end get skill

//ajax get social
// ajax fullname
function edit_fullname(){
    show_id('done_fullname');
    hide_id('edit_fullname');
    readonly_false('fullname');
}

function done_fullname(){
    show_id('edit_fullname');
    hide_id('done_fullname');
    readonly_true('fullname');
    var id_user = $("#id_user").val();
    var fullname = $("#fullname").val();
    $.post("ajax_process/edit.php",{id_user:id_user,fullname:fullname},function(data){
        document.getElementById('f_name_alert').style.display = "inline-block";
        show_id('f_name_alert');
        setTimeout(function() {
            hide_id('f_name_alert');
        }, 2000)

        $("#j_fullname").html(data);
    });
}
// ajax fullname end
// ajax email
function edit_email(){
    show_id('done_email');
    hide_id('edit_email');
    readonly_false('email');
}

function done_email(){
    show_id('edit_email');
    hide_id('done_email');
    readonly_true('email');
    hide_id("icon-confirmed");
    var id_user = $("#id_user").val();
    var email = $("#email").val();
    $.post("ajax_process/edit.php",{id_user:id_user,email:email},function(data){
        show_id('f_email_alert');
        setTimeout(function() {
            hide_id('f_email_alert');
        }, 2000);
        show_id("warning-email");
    });
}
// ajax email end
// ajax mobile
//check unique mobile and alert to ui
function check_unique_mobile(){
    var id_user = $("#id_user").val();
    var mobile = $("#mobile").val();
    
    $.post("check_unique_mobile.php",{id_user:id_user,mobile:mobile},function (data) {
        if (data == 0){
            // khong bi trung
            document.getElementById('mobile').style.color = 'white';
            hide_id('unique_mobile_alert');
        }
        else{
        // bi trung
            document.getElementById('mobile').style.color = 'red';
            show_id('unique_mobile_alert');
            setTimeout(function() {
                hide_id('unique_mobile_alert');
            }, 10000)

        } 
    });
}

//check unique mobile and alert to ui end
function edit_mobile(){
    show_id('done_mobile');
    hide_id('edit_mobile');
    readonly_false('mobile');
}

function done_mobile(){
    hide_id('done_mobile');
    show_id('edit_mobile');
    readonly_true('mobile');
    var id_user = $("#id_user").val();
    var mobile = $("#mobile").val();
    $.post("ajax_process/edit.php",{id_user:id_user,mobile:mobile},function(data){

        if (data == '0'){
            //loi
            alert("Trùng sđt!");
            location.reload();
        }
        else{
            show_id('f_mobile_alert');
            setTimeout(function() {
                hide_id('f_mobile_alert');
            }, 2000)
        }
    });
}
// ajax mobile end
// ajax address
function edit_address(){
    hide_id('edit_address');
    show_id('done_address');
    readonly_false('address'); 
}

function done_address(){
    hide_id('done_address');
    show_id('edit_address');
    readonly_true('address');
    var id_user = $("#id_user").val();
    var address = $("#address").val();
    $.post("ajax_process/edit.php",{id_user:id_user,address:address},function(data){
        show_id('f_address_alert');
        setTimeout(function() {
            hide_id('f_address_alert');
        }, 2000)
    });
}
// ajax address end
// ajax slug
function edit_slug(){
show_id('done_slug');
hide_id('edit_slug');
readonly_false('slug');
}
                        
function done_slug(){
    var id_user = $("#id_user").val();
    var slug = $("#slug").val();
    $.post("ajax_process/edit.php",{id_user:id_user,slug:slug},function(data){
        
        if (data == 0){
            //da trung
            
            $("#f_slug_alert").html("<p style='color:red;font-size:12px'>Lỗi trùng đường dẫn, vui lòng chọn đường dẫn khác!</p>").fadeIn(1000);

            $("#f_slug_alert").fadeOut(8000);
            
            // alert("Lỗi trùng đường dẫn, vui lòng chọn đường dẫn khác!")
        };
        if (data ==2){
            //sai cú pháp
            
            $("#f_slug_alert").html("<p style='color:red; font-size:12px;'>Không được có kí tự đặc biệt. độ dài từ 3 - 30 kí tự</p>").fadeIn(1000);  
        };
        
        if (data == 1){
            //đúng đc chạy tiếp
            show_id('f_slug_alert');
            setTimeout(function() {
                hide_id('f_slug_alert');
            }, 8000);
          
            $("#j_slug").load(location.href + " #j_slug");
            show_id('edit_slug');
            hide_id('done_slug');
            readonly_true('slug');
            $("#f_slug_alert").html("<p style='color:white; font-size:12px;'>Success!</p>").fadeIn(1000);
            $("#f_slug_alert").fadeOut(4000);
        };
        
    });
}
// ajax slug end
// ajax intro
function edit_intro(){
    hide_id('edit_icon_intro');
    readonly_false('intro');
};
function ajax_submit_intro(){
    var id_user = $("#id_user").val();
    var intro = $("#intro").val();
    $.post("ajax_process/edit.php",{id_user:id_user,intro:intro},function(data){
        
        show_id('edit_icon_intro');
        show_id('intro_alert');
            setTimeout(function() {
                hide_id('intro_alert');
            }, 2000);
    });
};
// ajax intro end
//avata
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
 reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
    });
});

$("#avatar").click(function () {
    $("#input_avatar").trigger('click');
});
