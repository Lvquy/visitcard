<?php
    require('includes/db.php');
    if(isset($_POST["id_s"])){
        $id_s = $_POST["id_s"];
        $query_clicked = "UPDATE social SET clicked = clicked+1 WHERE id='$id_s'";
        $result = mysqli_query($con,$query_clicked);
    }
    if(isset($_POST["id"])){
        $id = $_POST["id"];

        $query_get_social = "SELECT * FROM social WHERE of_user = $id";
        $result_get_social = mysqli_query($con,$query_get_social);
        $output ="";
        if (mysqli_num_rows($result_get_social)>0){
            $output = "";
            while($row = mysqli_fetch_array($result_get_social)){
            $id_social = $row["id"];
            $icon = $row["icon_url"];
            $img_icon = "<img src='$icon' />";
            $name = $row["social_name"];
            $link = $row["social_link"];
            $active = $row["is_active"];
            $clicked = $row["clicked"];
            $style= "display:none";
            $style1= "display:none;font-size:12;color:white";
            if ($active == 1){
                $btn_check ="<label class='switch-1'>
                        <input type='checkbox' checked id='$id_social-checkbox' onchange='switch_active($id_social)'>
                          <span class='slider-1 round-1'></span>
                        </label>";
            }else{
                $btn_check ="<label class='switch-1'>
                        <input type='checkbox' id='$id_social-checkbox' onchange='switch_active($id_social)'>
                          <span class='slider-1 round-1'></span>
                        </label>";
            };

            $active_show_hide = "<input  type='hidden' name='$name-$id_social' id='$id_social-active' value='$active'>";
            $output.="

            <tr>
                <td rowspan='2'>$img_icon</td>
                <td>
                    <input type='text' readonly placeholder='Label name social' class='form-control' name='$id_social.$name' value='$name' id='$id_social-name_social'>
                </td>
                <td >$active_show_hide
        
                    $btn_check
                    </td>
            </tr>
            <tr>
                <td>
                    <div class='inner-addon icon-addon'>
                        <input placeholder='Link social' readonly class='form-control' type='text'
                         id='$id_social' name='$name' value='$link'>
                         <i  class='badge badge-primary'>Clicked: $clicked</i>
                         <p id='alert.$id_social' style=$style1>Success!</p>
                    </div>
                </td>
                <td>

                    <i class='fa pencil-right fa-pencil' title='Sửa' id='$id_social-edit'
                        onclick='edit_social($id_social)'>
                    </i> 
                    <i class='fa pencil-right fa-check' title='Lưu sửa đổi' id='$id_social-done'
                     onclick='done_social($id_social)' style=$style>
                     </i>
                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                     <i class='fa fa-trash-o trash-right' id='$id_social-del'
                      onclick='del_social_1($id_social)' title='Xóa'></i>
                      <i class='fa fa-undo undo-del' id='$id_social-undo' title='Hủy xóa' aria-hidden='true'
                        onclick='undo_del($id_social)'
                     ></i>
                     &nbsp;&nbsp;
                     <i class='fa fa-check confirm-del' title='Xác nhận xóa' onclick='del_social($id_social)' id='$id_social-confirm-del' aria-hidden='true'></i>
                </td>
            </tr>
            <tr>
                <td colspan='3'><hr></td>
            </tr>

            ";
            }
        }
        echo $output;
    }
    else{
        echo 0;
    };


?>