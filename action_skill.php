<?php
    require('includes/db.php');
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $query_get_skill = "SELECT * FROM skill WHERE of_user = $id";
        $result_get_skill = mysqli_query($con,$query_get_skill);
        $output ="";
        if (mysqli_num_rows($result_get_skill)>0){
            
            while($row = mysqli_fetch_array($result_get_skill)){
                $id_skill = $row["id"];
                $skill_name = $row["skill_name"];
                $skill_value = $row["skill_value"];
                $is_active = $row["is_active"];
                $query_get_bg_color_skill = "SELECT bg_color_skill FROM skill WHERE id = $id_skill";
                $result_get_bg_color_skill = mysqli_query($con,$query_get_bg_color_skill);
                $row_skill = mysqli_fetch_array($result_get_bg_color_skill);

                $bg_color_skill = $row_skill["bg_color_skill"];
                $style = "style='--bg_color_skill:$bg_color_skill'";
                $output = "
                    <div class='row'>
                        <div class='col-4 '>
                            <label for='customRange1' class='form-label'>$skill_name</label>
                        </div>
                        <div class='col-6'>
                            <div class='slidecontainer'>
                                Level: <input type='range' onchange='update_skill($id_skill,this.value,)' 
                                 "; $output .=$style."value='$skill_value' min='1' max='100' class='slider' id='$id_skill' oninput='this.nextElementSibling.value = this.value'>
                                <output>$skill_value</output>%
                            </div>
                        </div>

                        <div class='col-2' id='del_skill'>
                            <i  onclick='del_skill_1($id_skill)' id='$id_skill-del' class='fa fa-trash-o' title='Xóa'>
                            </i>
                        </div>

                        <input type='hidden' name='id_skill' value='$id_skill' id='$id_skill'>
                    </div>
                ";
                echo "$output";

            }
        }
    }

?>
                             
                                        