
<?php
require_once("../includes/db.php");


if (isset($_POST["curent_page"])) {
    $curent_page = $_POST["curent_page"];
    $NUMBER_FOR_PAGE = 5;
    $FROM = ($curent_page - 1) * $NUMBER_FOR_PAGE;
    $query ="SELECT * FROM sale_order ORDER BY so DESC LIMIT $FROM,$NUMBER_FOR_PAGE";
    $result = mysqli_query($con,$query);
    //
    $output = '';
        if (mysqli_num_rows($result)>0){
            $output = "";
            while($row = mysqli_fetch_array($result)){
                $so = $row["so"];
                $cus_name = $row["cus_name"];
                $order_date = $row["order_date"];
                $mobile = $row["cus_mobile"];
                $saler = $row["saler"];
                $state = $row["state"];

                $output.="
                <tr>
                    <td>$so</td>
                    <td>$cus_name</td>
                    <td>$order_date</td>
                    <td>$mobile</td>
                    <td>$saler</td>
                    <td>$state</td>
                    <td>
                        <i 
                            onclick='open_so($so)'
                            data-bs-toggle='modal'
                            data-bs-target='#so_modal'
                            class='fa fa-eye right '></i>&#160; &#160;

                            <i class='fa fa-trash-o trash-right' id='$so-del'
                            onclick='del_so_1($so)' title='Xóa'></i>
                            &#160; &#160;
                        <i class='fa fa-undo undo-del' id='$so-undo' title='Hủy xóa' aria-hidden='true'
                            onclick='undo_del($so)'
                         ></i>
                         &nbsp;&nbsp;
                         <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_so($so)' id='$so-confirm-del' aria-hidden='true'></i>


                    </td>
                </tr>
                ";
            }
        
        }
        echo $output;
    //
}



if (isset($_POST["so_del"])) {
    $so_del = $_POST["so_del"];
    $query = "DELETE FROM sale_order WHERE so ='$so_del'";
    $result = mysqli_query($con,$query);

}

if (isset($_POST["customer"])) {
    $so = $_POST["so"];
    $customer = $_POST["customer"];
    $date_order = $_POST["date_order"];
    $mobile = $_POST["mobile"];
    $add = $_POST["add"];
    $saler = $_POST["saler"];
    $so_qty = $_POST["so_qty"];
    $so_price = $_POST["so_price"];
    $note = $_POST["note"];
    $card_type = $_POST["card_type"];
    $state = $_POST["state"];

    $query = "UPDATE sale_order SET 
    cus_name='$customer',order_date='$date_order', cus_add='$add',cus_mobile='$mobile',
    card_type='$card_type',price='$so_price',qty='$so_qty',note='$note',saler='$saler',
    state='$state' WHERE so='$so'";
    $result = mysqli_query($con,$query);
    echo 1;


}


if (isset($_POST["id_so"])) {
    $id_so = $_POST["id_so"];
    $query ="SELECT * FROM sale_order WHERE so = '$id_so'";
    $result = mysqli_query($con,$query);
    $output = '';
        if (mysqli_num_rows($result)>0){
            $output = "";
            while($row = mysqli_fetch_array($result)){
                $so = $row["so"];
                $cus_name = $row["cus_name"];
                $cus_add = $row["cus_add"];
                $cus_mobile = $row["cus_mobile"];
                $card_type = $row["card_type"];
                $price = $row["price"];
                $qty = $row["qty"];
                $note = $row["note"];
                $order_date = $row["order_date"];
                $saler = $row["saler"];
                $state = $row["state"];
                $text_color = $row["text_color"];
                $total = $row["total"];
                $username = $row["username"];
                $ip = $row["ip"];


            }
        }
    if ($state == 0){
        $states="
            <div id='state_header'>
                <input disabled='true' type='radio' style='display:none' id='0' name='state' checked value='0'>
                <label class='state_active 0'  for='0' onclick='onchange_state(0)'>Darft</label>
                <input disabled='true' type='radio' style='display:none' id='1' name='state' value='1'>
                <label for='1' class='1' onclick='onchange_state(1)'>Confirm</label>
                <input disabled='true' type='radio' style='display:none' id='2' name='state' value='2'>
                <label for='2' class='2' onclick='onchange_state(2)'>Success</label>
            </div>
            
        ";
    };
    if ($state == 1){
        $states="
        <div id='state_header'>
            <input disabled='true' type='radio' style='display:none' id='0' name='state' value='0'>
            <label class='0' for='0' onclick='onchange_state(0)'>Darft</label>
            <input disabled='true' type='radio' style='display:none'  id='1' name='state' checked value='1'>
            <label onclick='onchange_state(1)' class='state_active 1' for='1'>Confirm</label>
            <input disabled='true' type='radio' style='display:none'  id='2' name='state' value='2'>
            <label class='2' onclick='onchange_state(2)' for='2'>Success</label>
        </div>
        ";
    };
    if ($state == 2){
        $states="
        <div id='state_header'>
            <input disabled='true' type='radio' style='display:none' id='0' name='state' value='0'>
            <label class='0' onclick='onchange_state(0)' for='0'>Darft</label>
            <input disabled='true' type='radio' style='display:none' id='1' name='state' value='1'>
            <label class='1' onclick='onchange_state(1)' for='1'>Confirm</label>
            <input  disabled='true' type='radio' style='display:none' id='2' name='state' checked value='2'>
            <label onclick='onchange_state(2)' class='state_active 2' for='2'>Success</label>
        </div>
        ";
    }
    if ($card_type=='1'){
        $select ="
            <select class='form-control' onchange='onchange_type()' disabled='true' id='card_type'>
              <option value='1' selected>Loại 1</option>
              <option value='2'  >Loại 2</option>
              <option value='3'>Loại 3</option>
              <option value='4'>Custom</option>
            </select>
        ";
    };
    if ($card_type=='2'){
        $select ="
            <select class='form-control' onchange='onchange_type()' disabled='true' id='card_type'>
              <option value='1'>Loại 1</option>
              <option value='2' selected >Loại 2</option>
              <option value='3'>Loại 3</option>
              <option value='4'>Custom</option>
            </select>
        ";
    };
    if ($card_type=='3'){
        $select ="
            <select class='form-control' onchange='onchange_type()' disabled='true'  id='card_type'>
              <option value='1' >Loại 1</option>
              <option value='2' >Loại 2</option>
              <option value='3' selected>Loại 3</option>
              <option value='4'>Custom</option>
            </select>
        ";
    };
    if ($card_type=='4'){
        $select ="
            <select class='form-control' onchange='onchange_type()'  disabled='true' id='card_type'>
              <option value='1'>Loại 1</option>
              <option value='2'>Loại 2</option>
              <option value='3'>Loại 3</option>
              <option value='4' selected>Custom</option>
            </select>
        ";
    };

    
    $output .="

        <div class='col-12' id='header-so'>
            <button class='btn btn-cus left' id='edit_btn' onclick='edit_btn()'>Edit</button>
            <button class='btn btn-cus left' id='done_btn' onclick='done_btn()'>Done</button>
            $states
        </div>
       
        
        
        <table class='table '>
            <tr>
                
                <td colspan='4'>
                    <h2 id='id_so'>$so</h2>
                </td>
            </tr>
            <tr>
                <td>Customer</td>
                <td><input readonly id='customer' class='form-control'  type='text' value='$cus_name'></td>
                <td>Date order</td>
                <td><input readonly id='date_order' class='form-control' type='date' value='$order_date'></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input readonly id='mobile' class='form-control' type='text' value='$cus_mobile'></td>
                <td>Saler</td>
                <td>
                    <input readonly id='saler' type='text' class='form-control' value='$saler'>
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td colspan='3'><input readonly id='add' class='form-control' type='text' value='$cus_add'></td>
            </tr>
        </table>
        <table class='table-hover table table-orderline'>
            <thead>
                <td>Product</td>
                <td>Qty</td>
                <td>Price</td>
                <td>Total</td>
                
            </thead>
            <tr>
                <td>
                    $select
                </td>
                <td><input readonly  class='form-control' type='number' min='1' max='100' onchange='onchange_total()' id='so_qty' value='$qty'></td>
                <td><input readonly class='form-control' type='number' min='0' id='so_price' onchange='onchange_total()' value='$price'></td>
                <td>
                    <span id='so_total'>$total</span>
                </td>
            </tr>
            <tr>
                <td colspan='4'><hr></td>
            </tr>
            <tr>
                <td>Color</td>
                <td>$text_color</td>
                <td>Username</td>
                <td>$username</td>
                
            </tr>
            <tr>
                <td>IP Customer</td>
                <td>$ip</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Note</td>
                <td colspan='3'>
                    <textarea readonly class='form-control mt-2' 
                    id='note' cols='2' rows='4'>$note</textarea>
                <td
            </tr>
        </table>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        </div>
    ";
    echo $output;
}

if (isset($_POST["admin_get_so"])) {
    $admin_get_so = $_POST["admin_get_so"];
    $NUMBER_FOR_PAGE = 5;

    if ($admin_get_so == 1) {
        $query ="SELECT * FROM sale_order ORDER BY so DESC LIMIT 0,$NUMBER_FOR_PAGE";
        $result = mysqli_query($con,$query);
        $output = '';
        if (mysqli_num_rows($result)>0){
            $output = "";
            while($row = mysqli_fetch_array($result)){
                $so = $row["so"];
                $cus_name = $row["cus_name"];
                $order_date = $row["order_date"];
                $mobile = $row["cus_mobile"];
                $saler = $row["saler"];
                $state = $row["state"];

                $output.="
                <tr>
                    <td>$so</td>
                    <td>$cus_name</td>
                    <td>$order_date</td>
                    <td>$mobile</td>
                    <td>$saler</td>
                    <td>$state</td>
                    <td>
                        <i 
                            onclick='open_so($so)'
                            data-bs-toggle='modal'
                            data-bs-target='#so_modal'
                            class='fa fa-eye right '></i>&#160; &#160;

                            <i class='fa fa-trash-o trash-right' id='$so-del'
                            onclick='del_so_1($so)' title='Xóa'></i>
                            &#160; &#160;
                        <i class='fa fa-undo undo-del' id='$so-undo' title='Hủy xóa' aria-hidden='true'
                            onclick='undo_del($so)'
                         ></i>
                         &nbsp;&nbsp;
                         <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_so($so)' id='$so-confirm-del' aria-hidden='true'></i>


                    </td>
                </tr>
                ";
            }
        
        }
        echo $output;

    }
}

if (isset($_POST["c_name"])) {
    $c_name = $_POST["c_name"];
    $c_mobile = $_POST["c_mobile"];
    $c_type = $_POST["c_type"];
    $c_qty = $_POST["c_qty"];
    $c_price = $_POST["c_price"];
    $c_saler = $_POST["c_saler"];
    $c_state = $_POST["c_state"];
    $c_add = $_POST["c_add"];
    $c_note = $_POST["c_note"];
    $c_date_order = date("Y-m-d");


    $query = "INSERT into  `sale_order` 
        (cus_name,cus_add,cus_mobile,card_type,price,qty,note,order_date,saler,state) VALUES
        ('$c_name','$c_add','$c_mobile','$c_type','$c_price','$c_qty','$c_note','$c_date_order','$c_saler','$c_state')";
    $result = mysqli_query($con,$query);
    echo 1;
};
// search by slug
if (isset($_POST["text"])){
    $text = $_POST["text"];
    $query = "SELECT * FROM users WHERE slug like '%$text%' ";
    $result = mysqli_query($con,$query);
    $row = mysqli_num_rows($result);
    $output = "";
    if ($row >0) {
        while($data_row = mysqli_fetch_array($result)){
            $id = $data_row["id"];
            $fullname = $data_row["fullname"];
            $mobile = $data_row["mobile"];
            $email = $data_row["email"];
            $reg_date = $data_row["reg_date"];
            $slug = $data_row["slug"];
            $active = $data_row["active"];
            $status_email = $data_row["status_email"];
            $output.="
                <tr>
                    <td >$id</td>
                    <td >$fullname</td>
                    <td >$mobile</td>
                    <td >$email</td>
                    <td >$reg_date</td>
                    <td >$slug</td>
                    <td >$active</td>
                    <td >$status_email</td>
                    <td >
                        <i 
                        data-id='$id' 
                        data-fullname='$fullname'
                        data-mobile ='$mobile'
                        data-email='$email'
                        data-slug='$slug'
                        data-active='$active'
                        data-status-email='$status_email'
                        data-bs-toggle='modal'
                        data-bs-target='#modify_modal'
                        class='fa right fa-pencil'></i>&#160; &#160;
                        
                        <i class='fa fa-trash-o trash-right' id='$id-del'
                            onclick='del_user_1($id)' title='Xóa'></i>
                        <i class='fa fa-undo undo-del' id='$id-undo' title='Hủy xóa' aria-hidden='true'
                            onclick='undo_del($id)'
                         ></i>
                         &nbsp;&nbsp;
                         <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_user($id)' id='$id-confirm-del' aria-hidden='true'></i>
                    </td>
                </tr>
            ";
        }
    }
    echo $output;
}
// search by mobile
if (isset($_POST["text_mobile"])){
    $text_mobile = $_POST["text_mobile"];
    $query = "SELECT * FROM users WHERE mobile like '%$text_mobile%' ";
    $result = mysqli_query($con,$query);
    $row = mysqli_num_rows($result);
    $output = "";
    if ($row >0) {
        while($data_row = mysqli_fetch_array($result)){
            $id = $data_row["id"];
            $fullname = $data_row["fullname"];
            $mobile = $data_row["mobile"];
            $email = $data_row["email"];
            $reg_date = $data_row["reg_date"];
            $slug = $data_row["slug"];
            $active = $data_row["active"];
            $status_email = $data_row["status_email"];
            $output.="
                <tr>
                    <td >$id</td>
                    <td >$fullname</td>
                    <td >$mobile</td>
                    <td >$email</td>
                    <td >$reg_date</td>
                    <td >$slug</td>
                    <td >$active</td>
                    <td >$status_email</td>
                    <td >
                        <i 
                        data-id='$id' 
                        data-fullname='$fullname'
                        data-mobile ='$mobile'
                        data-email='$email'
                        data-slug='$slug'
                        data-active='$active'
                        data-status-email='$status_email'
                        data-bs-toggle='modal'
                        data-bs-target='#modify_modal'
                        class='fa right fa-pencil'></i>&#160; &#160;
                        
                        <i class='fa fa-trash-o trash-right' id='$id-del'
                            onclick='del_user_1($id)' title='Xóa'></i>
                        <i class='fa fa-undo undo-del' id='$id-undo' title='Hủy xóa' aria-hidden='true'
                            onclick='undo_del($id)'
                         ></i>
                         &nbsp;&nbsp;
                         <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_user($id)' id='$id-confirm-del' aria-hidden='true'></i>
                    </td>
                </tr>
            ";
        }
    }
    echo $output;

}
// create new user
if (isset($_POST["username"])){
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $active = $_POST["active"];
        $password = $_POST["password"];
        $password_admin = $_POST["password_admin"];
        $reg_date = date("Y-m-d");

        $query_check_pass = "SELECT password FROM users WHERE admin='1' and password='".md5($password_admin)."' ";
        $result_check_pass= mysqli_query($con,$query_check_pass);
        $row_check_pass = mysqli_num_rows($result_check_pass);
        if ($row_check_pass!=1){
            echo 2;
            exit;
            //sai pass admin
        }
        // check unique slug
        $query_check="SELECT slug FROM users WHERE slug = '$username'";
        $result_check = mysqli_query($con,$query_check);
        $row_check = mysqli_num_rows($result_check);
        if ($row_check >0){
            //trung slug
            echo 0;
        }else{

            $query = "INSERT into `users` 
                (slug, fullname,active, password,reg_date,top_bg_color,intro,avata,top_text_color) VALUES
                ('$username','$fullname','$active','".md5($password)."','$reg_date','white','Giới thiệu một chút về bạn đi...','none-avata.png','black') ";
            $result = mysqli_query($con, $query);
            echo 1;
        }
}
//update code
if (isset($_POST["edit_c_id"])){
    $edit_c_id = $_POST["edit_c_id"];
    $edit_c_code = $_POST["edit_c_code"];
    $edit_c_status = $_POST["edit_c_status"];

    

    $query ="UPDATE active_codes SET
     code = '$edit_c_code',status ='$edit_c_status' WHERE id = '$edit_c_id'
    ";
    $result = mysqli_query($con,$query);
}

//updata users
if (isset($_POST["e_id"])){
        $e_id = $_POST["e_id"];
        $e_fullname = $_POST["e_fullname"];
        $e_mobile = $_POST["e_mobile"];
        $e_email = $_POST["e_email"];
        $e_slug = $_POST["e_slug"];
        $e_active = $_POST["e_active"];
        
        $e_status_email = $_POST["e_status_email"];

        $query="UPDATE users SET
            
            fullname='$e_fullname',mobile='$e_mobile',email='$e_email',
            slug='$e_slug',active='$e_active',status_email='$e_status_email'
            WHERE id ='$e_id' ";
        $result = mysqli_query($con,$query);
        
}
//check user unique
if (isset($_POST["new_username"])){
        $new_username = $_POST["new_username"];

        $query="SELECT slug FROM users WHERE slug='$new_username'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if ($count >0) {
            echo 0;
        }
        else{
            echo 1;
        }
}
//del code
if (isset($_POST["id_del_code"])){
    $id_del_code = $_POST["id_del_code"];

    $query = "DELETE FROM active_codes WHERE id = '$id_del_code'";
    $result = mysqli_query($con,$query);
}

//del user
if (isset($_POST["id_del"])){
        $id_del = $_POST["id_del"];
        
        $query="DELETE FROM users WHERE id='$id_del' ";
        $result = mysqli_query($con,$query);
        
}
// tao code
if (isset($_POST["count"])){
    $count = $_POST["count"];
    function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    };
    for ($i=0;$i<$count;$i++){
        $code = generateRandomString(9);
        $query = "INSERT into active_codes (code,status) VALUES ('$code','new')";
        $result = mysqli_query($con,$query);
    }
}
if (isset($_POST["admin_get_code"])){
    $admin = $_POST["admin_get_code"];
    if ($admin == 1) {
        $query = "SELECT * FROM active_codes ORDER BY status,active_date ASC";
        $result = mysqli_query($con, $query);
        $output = '';
        if (mysqli_num_rows($result)>0){
            $output = "";
            while($row = mysqli_fetch_array($result)){
                $id = $row["id"];
                $code = $row["code"];
                $status = $row["status"];
                $for_user = $row["for_user"];
                $active_date = $row["active_date"];
                $output.="
                    <tr>
                        <td>$id</td>
                        <td>$code</td>
                        <td>$status</td>
                        <td>$for_user</td>
                        <td>$active_date</td>
                        <td>
                            <i 
                            data-id='$id' 
                            data-code='$code'
                            data-status ='$status'
                            
                            
                            data-bs-toggle='modal'
                            data-bs-target='#edit_code_modal'
                            class='fa right fa-pencil'></i>&#160; &#160;


                            <i class='fa fa-trash-o trash-right' id='$id-del'
                            onclick='del_code_1($id)' title='Xóa'></i>

                            <i class='fa fa-undo undo-del' id='$id-undo' title='Hủy xóa' aria-hidden='true'
                                onclick='undo_del($id)'
                             ></i>
                             &nbsp;&nbsp;
                             <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_code($id)' id='$id-confirm-del' aria-hidden='true'></i>
                        </td>
                    </tr>
                ";
            }
            echo $output;
        }
    }           
}

if (isset($_POST["edit_token"])){
    $id_token = $_POST["id_token"];
    $edit_token = $_POST["edit_token"];
    $mobile_iden = $_POST["mobile_iden"];
    $active_token = $_POST["active_token"];
    $email_token = $_POST["email_token"];

    $query ="UPDATE push SET
        token = '$edit_token',
        mobile_iden = '$mobile_iden',
        active ='$active_token',
        email_token='$email_token'
        WHERE id = '$id_token'";
    $result= mysqli_query($con,$query);
}
if (isset($_POST["id_token_del"])){
    $id_token = $_POST["id_token_del"];
    $query = "DELETE FROM push WHERE id = '$id_token' ";
    $result= mysqli_query($con,$query);
}
if (isset($_POST["token"])){
    $token = $_POST["token"];
    $mobile_iden = $_POST["mobile_iden"];
    $active_token = $_POST["active_token"];
    $email_token = $_POST["email_token"];
    $today = date("Y-m-d");

    $query ="INSERT into `push` 
    (token,mobile_iden,active,email_token,create_token_date) VALUES 
    ('$token','$mobile_iden','$active_token','$email_token','$today')";
    $result = mysqli_query($con,$query);
}
if (isset($_POST["admin_token"])){
    $admin_token = $_POST["admin_token"];
    if ($admin_token ==1){
        $query = "SELECT * FROM push order by id, active desc";
        $result = mysqli_query($con,$query);
        $output = "";
        if (mysqli_num_rows($result)>0){
            $output = "";
            while($row = mysqli_fetch_array($result)){
                $id = $row["id"];
                $token = $row["token"];
                $mobile_iden = $row["mobile_iden"];
                $active = $row["active"];
                $email_token = $row["email_token"];
                $create_token_date = $row["create_token_date"];
                $output .="
                    <tr>
                        <td>$id</td>
                        <td>$token</td>
                        <td>$mobile_iden</td>
                        <td>$active</td>
                        <td>$email_token</td>
                        <td>$create_token_date </td>
                        <td>
                            <i 
                            data-id='$id' 
                            data-token='$token'
                            data-mobile_iden ='$mobile_iden'
                            data-active ='$active'
                            data-email_token ='$email_token'
                            data-create_token_date ='$create_token_date'
                            
                            
                            data-bs-toggle='modal'
                            data-bs-target='#edit_token_modal'
                            class='fa right fa-pencil'></i>&#160; &#160;


                            <i class='fa fa-trash-o trash-right' id='$id-del'
                            onclick='del_token_1($id)' title='Xóa'></i>

                            <i class='fa fa-undo undo-del' id='$id-undo' title='Hủy xóa' aria-hidden='true'
                                onclick='undo_del($id)'
                             ></i>
                             &nbsp;&nbsp;
                             <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_token($id)' id='$id-confirm-del' aria-hidden='true'></i>
                        </td>
                    </tr>
                ";
            }
        }
    echo $output;
    }
}

if (isset($_POST["admin"])){
    $admin = $_POST["admin"];
    if ($admin == 1) {
        $query = "SELECT * FROM users ORDER BY id DESC";
        $result = mysqli_query($con, $query);
        $output = '';
        
        if (mysqli_num_rows($result)>0){
            $output = "";
            while($row = mysqli_fetch_array($result)){
                $id = $row["id"];
                $fullname = $row["fullname"];
                $mobile = $row["mobile"];
                $email = $row["email"];
                $reg_date = $row["reg_date"];
                $slug = $row["slug"];
                $active = $row["active"];
                $status_email = $row["status_email"];
                $ip = $row["ip"];
                $output.="
                    <tr>
                        <td >$id</td>
                        <td >$fullname</td>
                        <td >$mobile</td>
                        <td >$email</td>
                        <td >$reg_date</td>
                        <td >$slug</td>
                        <td >$active</td>
                        <td >$status_email</td>
                        <td >$ip</td>
                        
                        <td >
                            <i 
                            data-id='$id' 
                            data-fullname='$fullname'
                            data-mobile ='$mobile'
                            data-email='$email'
                            data-slug='$slug'
                            data-active='$active'
                            data-status-email='$status_email'
                            
                            data-bs-toggle='modal'
                            data-bs-target='#modify_modal'
                            class='fa right fa-pencil'></i>&#160; &#160;
                            
                            <i class='fa fa-trash-o trash-right' id='$id-del'
                                onclick='del_user_1($id)' title='Xóa'></i>
                            <i class='fa fa-undo undo-del' id='$id-undo' title='Hủy xóa' aria-hidden='true'
                                onclick='undo_del($id)'
                             ></i>
                             &nbsp;&nbsp;
                             <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_user($id)' id='$id-confirm-del' aria-hidden='true'></i>
                        </td>
                    </tr>
                ";
            }
            echo $output;
        }
    } 
}