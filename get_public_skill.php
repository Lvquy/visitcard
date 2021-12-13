<?php
    require('includes/db.php');
    if (isset($_POST["id"])){
        $id_user = $_POST["id"];
        $query_get_skill = "SELECT * FROM skill WHERE of_user = $id_user" ;
        $result_get_skill = mysqli_query($con,$query_get_skill);
        $output = "";
        if (mysqli_num_rows($result_get_skill)>0){
            $output = "";
            while($row = mysqli_fetch_array($result_get_skill)){
                $skill_name = $row["skill_name"];
                $skill_value = $row["skill_value"];
                $bg_color_skill = $row["bg_color_skill"];
                $style = "--bg_color_skill:$bg_color_skill";
                $output .= "
                <tr>
                    <td class='tb-text-right'>$skill_name </td>
                    <td><input disabled type='range' style='$style' value='$skill_value' class='slider'> $skill_value % </td>    
                </tr>
                ";
            }
        }
        echo $output;
    }
    
?>