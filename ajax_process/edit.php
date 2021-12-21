<?php
require_once("../includes/db.php");
    if (isset($_POST["fullname"])){
        $fullname = $_POST["fullname"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET fullname='$fullname' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);

        echo "$fullname";

    }
    if (isset($_POST["email"])){
        $email = $_POST["email"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET email='$email', status_email = 'None', active_code = NULL WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);


        echo "$email";

    }
    if (isset($_POST["mobile"])){
        $mobile = $_POST["mobile"];
        $id_user = $_POST["id_user"];

        $query_check_unique_mobile = "SELECT mobile FROM users WHERE (mobile != '' AND mobile = '$mobile' AND id != '$id_user') ";
        $result_check_unique_mobile = mysqli_query($con,$query_check_unique_mobile);
        $row = mysqli_num_rows($result_check_unique_mobile);
        if ($row >0){
            //trung
            echo "0";
        }
        elseif ($row == 0){
            //cho phep doi
            $query = "UPDATE users SET mobile='$mobile' WHERE id = '$id_user'";
            $result = mysqli_query($con, $query);

            echo "$mobile";
        }
        else{
            //loi
            echo "0";
        }    
    }
    if (isset($_POST["address"])){
        $address = $_POST["address"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET address='$address' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);

        echo "$address";
    }
    if (isset($_POST["email_user"])){
        $email_user = $_POST["email_user"];
        

        $query_email_user = "SELECT email FROM users
         WHERE email = '$email_user' AND status_email = 'confirmed' " ;
        $result = mysqli_query($con, $query_email_user);
        $row_email = mysqli_num_rows($result);
        if ($row_email >0){
            $data_email = mysqli_fetch_array($result);
            $email = $data_email["email"];
            echo $email;
            // có email này trong hệ thống & status là đã confirm
        }
        else{
            // không tìm thấy email này trong hệ thống
            echo 0;
        }

    }
    //edit social
    if (isset($_POST["id_social"])){
        $id_social = $_POST["id_social"];
        $social_link = $_POST["social_link"];
        $social_name = $_POST["social_name"];
        $query_update_social = "UPDATE social SET social_name='$social_name', social_link='$social_link' WHERE id = '$id_social'";
        $result_update_social = mysqli_query($con, $query_update_social);
        echo 1;
        //thanh cong
    }
    //edit social end
    if (isset($_POST["slug"])){
        $slug = $_POST["slug"];
        $slug = strtolower($slug);
        // check syntax slug
        // Chỉ cho phép chứa các ký tự [0-9] [a-z] [. -] và length [3-30]
        if (!preg_match("/^[a-zA-Z0-9]{3,30}$/",$slug)) {
            echo 2;
            exit();
            //Lỗi, không đc chứa kí tự đặc biệt
        }
        else{
            //đúng cho phép chạy tiếp
            if (isset($_POST["id_user"])) {
                $id_user = $_POST["id_user"];
                $query_check_unique_slug = "SELECT slug FROM users WHERE slug= '$slug'AND id != '$id_user' ";
                $result_check_unique_slug = mysqli_query($con,$query_check_unique_slug);
                $row = mysqli_num_rows($result_check_unique_slug);
                if ($row >0){
                    //trung
                    echo 0;
                }
                else{
                    $query = "UPDATE users SET slug='$slug' WHERE id = '$id_user'";
                    $result = mysqli_query($con, $query);
                    echo 1;
                    //ok
                }  
            }
            else{
                $query_check_unique_slug = "SELECT slug FROM users WHERE slug= '$slug' ";
                $result_check_unique_slug = mysqli_query($con,$query_check_unique_slug);
                $row = mysqli_num_rows($result_check_unique_slug);
                if ($row >0){
                    //trung
                    echo 0;
                }
                else{
                
                    echo 1;
                    //ok
                };     
            }
        }
        // check syntax slug end

    }
    if (isset($_POST["bg_color"])){
        $bg_color = $_POST["bg_color"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET bg_color='$bg_color' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);

        echo "$bg_color";

    }
    if (isset($_POST["intro_e"])){
        $intro_e = $_POST["intro_e"];
        $id_u = $_POST["id_u"];

        $query = "UPDATE users SET intro='$intro_e' WHERE id = '$id_u'";
        $result = mysqli_query($con, $query);

        echo "$result";

    }
    if (isset($_POST["id_social_checbox"])){
        $id_social_checbox = $_POST["id_social_checbox"];
        $val_active = $_POST["val_active"];

        $query_active_checkbox = "UPDATE social SET is_active='$val_active' WHERE id = '$id_social_checbox'";
        $result_checkbox = mysqli_query($con, $query_active_checkbox);

        echo $result_checkbox;
        //ok

    }
    //confirm email
    if (isset($_POST["active_code"])){
        $active_code = $_POST["active_code"];
        $id_user = $_POST["id_user"];
        $status_email = $_POST["status_email"];

        $query_get_code = "SELECT active_code FROM users WHERE
         id = '$id_user' and status_email = 'send' ";
        $result_get_code = mysqli_query($con,$query_get_code);

        if ($result_get_code) {
            $row = mysqli_fetch_array($result_get_code);
            if ($row["active_code"] == $active_code){
                //trùng mã kích hoạt ok
                $query_update_status_email = "UPDATE users SET status_email = 'confirmed'
                 WHERE id = '$id_user' ";
                $result_update_status_email = mysqli_query($con,$query_update_status_email);
                echo 1;

            }else{
                // sai mã
                echo 0;
            }
        }

        //ok

    }
    //confirm email end
    if (isset($_POST["old_pass"])){
        $old_pass = $_POST["old_pass"];
        $new_pass = $_POST["new_pass"];
        $id_user = $_POST["id_user"];

        $query_old_pass = "SELECT * FROM `users` WHERE id='$id_user' and password='".md5($old_pass)."'";
        $result_old_pass = mysqli_query($con,$query_old_pass) or die(mysql_error());
        $rows_old_pass = mysqli_num_rows($result_old_pass);
        if($rows_old_pass==1){
            // match pass
            $query_new_pass = "UPDATE `users` set password='".md5($new_pass)."' WHERE id='$id_user' ";
            $result_new_pass = mysqli_query($con,$query_new_pass);
            echo 1;
        }
        else{
            echo 0;
            //fail old pass
        } 
    }
    if (isset($_POST["bank_name"])){
        $bank_name = $_POST["bank_name"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET bank_name='$bank_name' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);

        echo 1;
    }
    if (isset($_POST["bank_sub"])){
        $bank_sub = $_POST["bank_sub"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET bank_sub ='$bank_sub ' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);
        echo 1;
    }
    if (isset($_POST["bank_num"])){
        $bank_num = $_POST["bank_num"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET bank_num ='$bank_num ' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);
        echo 1;
    }
    if (isset($_POST["bank_user"])){
        $bank_user = $_POST["bank_user"];
        $id_user = $_POST["id_user"];

        $query = "UPDATE users SET bank_user ='$bank_user ' WHERE id = '$id_user'";
        $result = mysqli_query($con, $query);
        echo 1;
    }
    if (isset($_POST["id_coin"])){
        $id_coin = $_POST["id_coin"];
        $name_coin = $_POST["name_coin"];
        $wallet_coin = $_POST["wallet_coin"];


        $query = "UPDATE coins SET coin_name ='$name_coin', wallet='$wallet_coin' WHERE id = '$id_coin'";
        $result = mysqli_query($con, $query);
        echo 1;
    }
    // change theme
    if (isset($_POST["id_theme"])){
        $id_theme = $_POST["id_theme"];
        $id_user = $_POST["id_user"];
        $active = $_POST["active"];
        if ($active == 2) {
           switch ($id_theme) {
            case 1:
                $top_bg_img = '';
                $top_bg_color = 'white';
                $top_text_color = 'black';
                break;
            case 2:
                // $top_bg_img = 'linear-gradient(green, yellow)';
                $top_bg_img = 'cover-2.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'white';
                break;
            case 3:
                $top_bg_img = 'cover-3.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'white';
                break;
            case 4:
                $top_bg_img = 'cover-4.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'white';
                break;
            case 5:
                $top_bg_img = 'cover-5.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'white';
                break;
            case 6:
                $top_bg_img = 'cover-6.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'white';
                break;
            case 7:
                $top_bg_img = 'cover-7.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'red';
                break;
            case 8:
                $top_bg_img = 'cover-8.jpg';
                $top_bg_color = 'white';
                $top_text_color = 'red';
                break;
              default:
                $top_bg_img = '';
                $top_bg_color = 'white';
                $top_text_color = 'black';
            }
        
            $query = "UPDATE users SET 
                top_bg_img ='$top_bg_img',
                top_bg_color = '$top_bg_color',
                top_text_color = '$top_text_color'  WHERE id = '$id_user'";
            $result = mysqli_query($con, $query);
            echo 1; 
        }
        else{
            echo 0;
            //can kich hoat
        }   
    }
mysqli_close($con);
?>